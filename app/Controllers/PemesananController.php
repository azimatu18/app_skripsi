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
        // $pemesanan->no_po = 'PO-' . $user['id'] . '-' . date('dmy') . rand(100, 999);
        $pemesanan->no_po = '';
        $pemesanan->save();

        $total_harga=0;

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

            $total_harga += $produk['jumlah'] * $produk['produk']['harga'];

            $produk->delete();
        }
        
        $pemesanan->total_harga = $total_harga;
        $pemesanan->update();

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

    function daftar() {
        $user = UserModel::data();

        $pemesanan = $user->pemesanan()->orderBy('id','desc')->get();
        $data = ['pemesanan'=>$pemesanan];

        return view('daftar_pemesanan', $data);
    }

    function dp_submit() {
        $id = request()->getPost('id');     
        $bukti_dp = request()->getFile('bukti_dp');

        $nama_bukti_dp = 'produk_' . time() . '.' . $bukti_dp->getClientExtension();
        $bukti_dp->move('uploads/bukti_dp', $nama_bukti_dp);

        $user = UserModel::data();

        $pemesanan = $user->pemesanan()->where('id', $id)->first();
        $pemesanan->bukti_dp=$nama_bukti_dp;
        $pemesanan->status_tipe=2;
        $pemesanan->save();

        return redirect()->to(base_url('/pemesanan/detail/' . $pemesanan->id));
    }

    function cetak_surat_jalan($id) {
        $user = UserModel::data();

        if ($user->level=='konsumen') {
            $pemesanan = $user->pemesanan()->where('id', $id)->first();
        } else{
            $pemesanan = PemesananModel::find($id);
        }

        $produk = $pemesanan->pemesanan_produk()->orderBy('judul', 'asc')->get();

        $data = [
            'pemesanan'=>$pemesanan, 
            'produk'=>$produk
        ];

        return view('cetak_surat_jalan', $data);   
    }

    function cetak_faktur_penjualan($id) {
        $user = UserModel::data();

        if ($user->level=='konsumen') {
            $pemesanan = $user->pemesanan()->where('id', $id)->first();
        } else{
            $pemesanan = PemesananModel::find($id);
        }

        $produk = $pemesanan->pemesanan_produk()->orderBy('judul', 'asc')->get();

        $data = [
            'pemesanan'=>$pemesanan, 
            'produk'=>$produk
        ];

        return view('cetak_faktur_penjualan', $data);   
    }
}
