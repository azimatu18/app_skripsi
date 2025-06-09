<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ResetPassword;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Ramsey\Uuid\Uuid;

class AuthController extends BaseController
{
    public function login()
    {
        $sudah_login = $this->session->get('sudah_login');
        if ($sudah_login) {
            return redirect()->to(base_url('admin/dashboard'));
        }
        return view('auth/login');
    }

    public function loginSubmit()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $data = UserModel::where('email', $email)->first();
        if ($data) {
            $cek_password = password_verify($password, $data['password']);
            if ($cek_password) {
                $this->session->set('sudah_login', true);
                $this->session->set('user_id', $data['id']);
                // session()->setFlashData('pesan', 'Anda berhasil login'); 

                if ($data['level'] == 'operasional' || $data['level'] == 'pemasaran') {
                    return redirect()->to(base_url('/admin/dashboard'));
                }

                return redirect()->to(base_url('/'));
            }
            session()->setFlashData('pesan', 'Login gagal, silahkan periksa kembali email dan password yang anda masukan');
        } else {
            session()->setFlashData('pesan', 'Login gagal, akun tidak ditemukan');
        }

        return redirect()->to(base_url('/login'));
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerSubmit()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = UserModel::create([
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'level' => 'konsumen'
        ]);

        return redirect()->to(base_url('/login'))->with('success', 'Registrasi berhasil, silahkan login.');
    }

    function logout()
    {
        $this->session->remove('sudah_login');
        $this->session->remove('user_id');
        return redirect()->to(base_url('/'));
    }

    function lupa_password()
    {
        return view('auth/lupa_password');
    }

    function lupa_password_submit()
    {
        $email = request()->getPost('email');
        $user = UserModel::where('email', $email)->first();
        if (!$user) {
            // return redirect()->back()->with('error', 'Email tidak terdaftar');
            session()->setFlashData('pesan', 'Email tidak terdaftar');
            return redirect()->back();
        }
        $token = Uuid::uuid4();
        $now = date('Y-m-d H:i:s');
        ResetPassword::updateOrInsert(
            ['email' => $email],
            ['token' => $token, 'waktu' => $now]
        );

        $reset_url = str_replace('index.php/', '', site_url("reset-password/" . $token));

        $pesan = '
            <div class="container">
                <h2>Reset Password</h2>
                <p>CV Gedrian Intimed Abadi, Anda melakukan permintaan untuk mereset password akun Anda.</p>
                <p>Silakan klik tombol di bawah ini untuk mengatur ulang password Anda:</p>
                <a href="' . $reset_url . '" class="btn">Reset Password</a>
                <p>Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini.</p>
            </div>';

        try {
            $email_service = \Config\Services::email();
            $email_service->setTo($email);
            $email_service->setFrom('noreply@demomailtrap.co', 'CV Gedrian Intimed Abadi');
            $email_service->setMessage($pesan);
            $email_service->setMailType('html');
            $email_service->setSubject('reset password');
            if ($email_service->send()) {
                session()->setFlashData('pesan_berhasil', 'Tautan reset password berhasil dikirim. Silahkan cek email anda dan klik tautan email password ');
                return redirect()->back();
                // return redirect()->back()->with('success', 'Reset password berhasil dikirim. Silahkan cek email anda dan klik tautan email password ');
            } else {
                return redirect()->back()->with('error', 'gagal mengirim email. silahkan cek koneksi anda dan coba kembal');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'error mengirim email. silahkan cek koneksi anda dan coba kembali');
        }
    }

    function reset_password($token)
    {
        $data = ['token' => $token];
        return view('/auth/reset_password', $data);
    }

    function reset_password_submit()
    {
        $token = request()->getPost('token');
        $reset_password = ResetPassword::where('token', $token)->first();
        if (!$reset_password) {
            return redirect()->back()->with('error', 'token reset password tidak ditemukan');
        }
        $user = UserModel::where('email', $reset_password->email)->first();
        $password = request()->getPost('password');
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->update();
        $reset_password->delete();

        return redirect()->to(base_url('/login'))->with('success', 'Password berhsil direset. Silahkan login menggunakan password yang baru.');
    }
}
