<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\PemesananModel;
use App\Models\PemesananProdukModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class PemesananController extends BaseController
{
    public function index()
    {
        $user = UserModel::data();
        $data['keranjang_produk'] = KeranjangModel::with('produk')->where('user_id', $user['id'])->get();
        return view('pemesanan', $data);
    }
    function submit()
    {
        $konsumen = request()->getPost('konsumen');
        $alamat = request()->getPost('alamat');
        $no_hp = request()->getPost('no_hp');
        $catatan = request()->getPost('catatan');
        $email = request()->getPost('email');

        $user = UserModel::data();

        $pemesanan = new PemesananModel();
        $pemesanan->user_id = $user['id'];
        $pemesanan->konsumen = $konsumen;
        $pemesanan->alamat = $alamat;
        $pemesanan->no_hp = $no_hp;
        $pemesanan->catatan = $catatan;
        $pemesanan->email = $email;
        $pemesanan->no_faktur = 'F' . date('my') . PemesananModel::count() + 1;
        $pemesanan->no_po = 'PO-' . $user['id'] . '-' . date('dmy') . rand(100, 999);
        $pemesanan->save();

        $user = UserModel::data();
        $keranjang_produk = KeranjangModel::with('produk')->where('user_id', $user['id'])->get();
        foreach ($keranjang_produk as $produk) {
            $pemesanan_produk = new PemesananProdukModel();
            $pemesanan_produk->pemesanan_id = $pemesanan->id;
            $pemesanan_produk->produk_id = $produk['produk']['id'];
            $pemesanan_produk->judul = $produk['produk']['judul'];
            $pemesanan_produk->tipe = $produk['produk']['tipe'];
            $pemesanan_produk->jumlah = $produk['jumlah'];
            $pemesanan_produk->harga = $produk['produk']['harga'];
            $pemesanan_produk->deskripsi = $produk['produk']['deskripsi'];
            $pemesanan_produk->gambar = $produk['produk']['gambar'];
            $pemesanan_produk->save();

            $produk->delete();
        }

        return redirect()->to(base_url('/pemesanan/detail/' . $pemesanan->id));
    }

    function detail($id)
    {
        $pemesanan = PemesananModel::find($id);
        if (!$pemesanan) {
            return redirect()->to(base_url('/pemesanan'))->with('error', 'Pesanan tidak ditemukan.');
        }

        $detail_pesanan = PemesananProdukModel::where('pemesanan_id', $id)->get();

        $data = [
            'pemesanan' => $pemesanan,
            'detail_pesanan' => $detail_pesanan
        ];

        return view('detail_pesanan', $data);
    }

}
