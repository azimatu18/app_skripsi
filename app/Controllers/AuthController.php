<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

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

        $user = new UserModel();
        $data = $user->where('email', $email)->first();
        if ($data) {
            $cek_password = password_verify($password, $data['password']);
            if ($cek_password) {
                $this->session->set('sudah_login', true);
                $this->session->set('user_id', $data['id']);
                session()->setFlashData('pesan', 'Anda berhasil login');
                return redirect()->to(base_url('/admin/dashboard'));
            }
            session()->setFlashData('pesan', 'Email atau password salah');
        } else {
            session()->setFlashData('pesan', 'Akun tidak ditemukan');
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

        $user = new UserModel();
        $user->insert([
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'level' => 'konsumen'
        ]);

        return redirect()->to(base_url('/login'));
    }

    function logout()
    {
        $this->session->remove('sudah_login');
        $this->session->remove('user_id');
        return redirect()->to(base_url('/login'));
    }
}
