<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class KeranjangController extends BaseController
{
    public function index()
    {
        
    }

    function tambah($id_produk) {
        $jumlah = request()->getPost('jumlah');
        $user = UserModel::data();
        $keranjang = KeranjangModel::where('user_id', $user['id'])->where('produk_id', $id_produk)->first();
        if (!$keranjang) {
            $keranjang = KeranjangModel::create([
                'user_id'=>$user['id'],
                'produk_id'=>$id_produk,
                'jumlah'=> $jumlah ? $jumlah : 1,
            ]);
        }
        else{
            $keranjang->jumlah = $keranjang['jumlah'] + ($jumlah ? $jumlah : 1);
            $keranjang->update();
        }
        return redirect()->back();
    }
}
