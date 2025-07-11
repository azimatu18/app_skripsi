<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PemesananModel;
use App\Models\ProdukModel;
use App\Models\ChatModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $jumlah_konsumen = UserModel::where('level', 'konsumen')->count();
        $jumlah_produk = ProdukModel::count();
        $jumlah_pemesanan = PemesananModel::count();

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'jumlah_konsumen' => $jumlah_konsumen,
            'jumlah_produk' => $jumlah_produk,
            'jumlah_pemesanan' => $jumlah_pemesanan,
        ];

        return view('admin/dashboard', $data);
    }

    function konsumen()
    {
        // Mengambil semua user dengan level konsumen
        $data['konsumen'] = UserModel::where('level', 'konsumen')->get();

        return view('admin/konsumen', $data);
    }

    function konsumenResetPassword($id)
    {
        $password = request()->getPost('password');
        $konsumen = UserModel::find($id);
        $konsumen->password = password_hash($password, PASSWORD_DEFAULT); // Mengubah password dengan enkripsi
        $konsumen->update();

        return redirect()->to(base_url('/admin/konsumen'))->with('success', 'password berhasil direset');
    }
}
