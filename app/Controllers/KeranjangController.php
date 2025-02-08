<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class KeranjangController extends BaseController
{
    public function index()
    {
        $user = UserModel::data();
        $data['keranjang_produk'] = KeranjangModel::with('produk')->where('user_id', $user['id'])->get();
        // return json_encode($data);
        return view('keranjang', $data);
    }

    function tambah($id_produk)
    {
        $jumlah = request()->getPost('jumlah');
        $user = UserModel::data();
        $keranjang = KeranjangModel::where('user_id', $user['id'])->where('produk_id', $id_produk)->first();
        if (!$keranjang) {
            $keranjang = KeranjangModel::create([
                'user_id' => $user['id'],
                'produk_id' => $id_produk,
                'jumlah' => $jumlah ? $jumlah : 1,
            ]);
        } else {
            $keranjang->jumlah = $keranjang['jumlah'] + ($jumlah ? $jumlah : 1);
            $keranjang->update();
        }
        return redirect()->back();
    }
    function ubah($id_keranjang)
    {
        $tombolqty = request()->getPost('tombol_qty');

        $user = UserModel::data();
        $keranjang = KeranjangModel::where('user_id', $user['id'])->where('id', $id_keranjang)->first();

        if ($tombolqty == 'tambah') {
            $keranjang->jumlah = $keranjang->jumlah + 1;
        } else {
            $keranjang->jumlah = $keranjang->jumlah - 1;
        }
        $keranjang->update();


        // return json_encode($keranjang);
        if ($keranjang->jumlah < 1) {
            $keranjang->delete();
        }

        return redirect()->back();
    }
}
