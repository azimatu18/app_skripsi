<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class StafController extends BaseController
{
    public function staf()
    {
        $data['data_staf'] = UserModel::where('level', '!=', 'konsumen')->get();
        return view('admin/staf', $data);
    }

    function stafTambah()
    {
        return view('admin/staf_tambah');
    }

    function stafSubmit()
    {
        $nama = request()->getPost('nama');
        $email = request()->getPost('email');
        $password = request()->getPost('password');
        $level = request()->getPost('level');

        $staf = UserModel::create([
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'level' => $level,
        ]);

        return redirect()->to(base_url('/admin/staf'));
    }

    public function stafEdit($id)
    {
        $staf = UserModel::find($id);

        return view('admin/staf_edit', ['staf' => $staf]);
    }

    public function stafUpdate($id)
    {

        $nama = request()->getPost('nama');
        $email = request()->getPost('email');
        $password = request()->getPost('password');
        $level = request()->getPost('level');

        $dataUpdate = [
            'nama' => $nama,
            'email' => $email,
            'level' => $level,
        ];

        if (!empty($password)) {
            $dataUpdate['password']=password_hash($password, PASSWORD_DEFAULT);
        }


        UserModel::where('id', $id)->update($dataUpdate);

        return redirect()->to(base_url('/admin/staf'))->with('success', 'Produk berhasil diperbaharui');
    }

    public function stafHapus($id)
    {
        $staf = UserModel::find($id);
        if ($staf) {

            UserModel::where('id', $id)->delete();
        }

        return redirect()->to(base_url('/admin/staf'))->with('success', 'Akun staf berhasil dihapus');
    }
}
