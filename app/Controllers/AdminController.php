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

        $data = [
            'jumlah_konsumen' => $jumlah_konsumen,
            'jumlah_produk' => $jumlah_produk,
            'jumlah_pemesanan' => $jumlah_pemesanan,
        ];

        return view('admin/dashboard', $data);
    }

    function konsumen()
    {
        $data['konsumen'] = UserModel::all(); 
        return view('admin/konsumen', $data);
    }
}
