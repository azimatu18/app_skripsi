<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class KeranjangController extends BaseController
{
    // Menampilkan halaman keranjang dengan produk yang dimiliki pengguna
    public function index()
    {
        if (UserModel::data()['level'] != 'konsumen') {
            return redirect()->back();
        }

        $user = UserModel::data();
        $data['keranjang_produk'] = KeranjangModel::with('produk')->where('user_id', $user['id'])->get();
        // return json_encode($data);
        return view('keranjang', $data);
    }

    // Menambahkan atau memperbarui produk di keranjang
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

    // Mengubah jumlah produk dalam keranjang
    function ubah($id_keranjang)
    {
        $tombolqty = request()->getPost('tombol_qty');

        $user = UserModel::data();
        $keranjang = KeranjangModel::where('user_id', $user['id'])->where('id', $id_keranjang)->first();

        // Menambah atau mengurangi jumlah produk
        if ($tombolqty == 'tambah') {
            $keranjang->jumlah = $keranjang->jumlah + 1;
        } else {
            $keranjang->jumlah = $keranjang->jumlah - 1;
        }
        $keranjang->update();


        // Menghapus produk jika jumlahnya kurang dari 1
        if ($keranjang->jumlah < 1) {
            $keranjang->delete();
        }

        return redirect()->back();
    }

    function hapus($id_keranjang)
    {
        $user = UserModel::data();
        $keranjang = KeranjangModel::where('user_id', $user['id'])->where('id', $id_keranjang)->first();

        if ($keranjang) {
            $keranjang->delete();
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang');
    }
}
