<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\PemesananModel;
use App\Models\PemesananProdukModel;
use App\Models\PenerimaanModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class PemesananController extends BaseController
{
    public function index()
    {
        if (UserModel::data()['level'] != 'konsumen') {
            return redirect()->back();
        }

        $user = UserModel::data();
        $keranjang = KeranjangModel::with('produk')->where('user_id', $user['id'])->get();

        if (count($keranjang) <= 0) {
            return redirect()->back()->with('error', 'Belum ada produk yang dipesan');
        }

        $data['keranjang_produk'] = $keranjang;
        return view('pemesanan', $data);
    }

    function submit()
    {
        $konsumen = request()->getPost('konsumen');
        $alamat = request()->getPost('alamat');
        $no_hp = request()->getPost('no_hp');
        $no_po = request()->getPost('no_po');
        $catatan = request()->getPost('catatan');
        $email = request()->getPost('email');

        $user = UserModel::data();

        $pemesanan = new PemesananModel();
        $pemesanan->user_id = $user['id'];
        $pemesanan->konsumen = $konsumen;
        $pemesanan->alamat = $alamat;
        $pemesanan->no_hp = $no_hp;
        $pemesanan->no_po = $no_po;
        $pemesanan->catatan = $catatan;
        $pemesanan->email = $email;
        $pemesanan->no_faktur = 'F' . date('my') . PemesananModel::count() + 1;
        $pemesanan->no_surat_jalan = PemesananModel::count() + 1 . "SJ/" . date('y');
        // $pemesanan->no_po = 'PO-' . $user['id'] . '-' . date('dmy') . rand(100, 999);
        $pemesanan->save();

        $total_harga = 0;

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
            $pemesanan_produk->diskon = $produk['produk']['diskon'];
            $pemesanan_produk->deskripsi = $produk['produk']['deskripsi'];
            $pemesanan_produk->gambar = $produk['produk']['gambar'];
            $pemesanan_produk->save();

            $harga_diskon = $produk['produk']['harga'] - ($produk['produk']['harga'] * $produk['produk']['diskon'] / 100);

            $total_harga += $produk['jumlah'] * $harga_diskon;

            $produk->delete();
        }

        $pemesanan->total_harga = $total_harga;
        $pemesanan->update();

        return redirect()->to(base_url('/pemesanan/detail/' . $pemesanan->id));
    }

    function detail($id)
    {
        if (UserModel::data()['level'] != 'konsumen') {
            return redirect()->back();
        }

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

    function daftar()
    {
        if (UserModel::data()['level'] != 'konsumen') {
            return redirect()->back();
        }

        $user = UserModel::data();

        $pemesanan = $user->pemesanan()->orderBy('id', 'desc')->get();
        $data = ['pemesanan' => $pemesanan];

        return view('daftar_pemesanan', $data);
    }

    function dp_submit()
    {
        $id = request()->getPost('id');
        $bukti_dp = request()->getFile('bukti_dp');

        $nama_bukti_dp = 'dp_' . time() . '.' . $bukti_dp->getClientExtension();
        $bukti_dp->move('uploads/bukti_dp', $nama_bukti_dp);

        $user = UserModel::data();

        $pemesanan = $user->pemesanan()->where('id', $id)->first();
        $pemesanan->bukti_dp = $nama_bukti_dp;
        $pemesanan->status_tipe = 2;
        $pemesanan->save();

        return redirect()->to(base_url('/pemesanan/detail/' . $pemesanan->id));
    }

    function lunas_submit()
    {
        $id = request()->getPost('id');
        $bukti_lunas = request()->getFile('bukti_lunas');

        $nama_bukti_lunas = 'lunas_' . time() . '.' . $bukti_lunas->getClientExtension();
        $bukti_lunas->move('uploads/bukti_lunas', $nama_bukti_lunas);

        $user = UserModel::data();

        $pemesanan = $user->pemesanan()->where('id', $id)->first();
        $pemesanan->bukti_lunas = $nama_bukti_lunas;
        $pemesanan->status_tipe = 6;
        $pemesanan->save();

        return redirect()->to(base_url('/pemesanan/detail/' . $pemesanan->id));
    }


    function cetak_invoice($id)
    {
        $user = UserModel::data();

        if ($user->level == 'konsumen') {
            $pemesanan = $user->pemesanan()->where('id', $id)->first();
        } else {
            $pemesanan = PemesananModel::find($id);
        }

        $produk = $pemesanan->pemesanan_produk()->orderBy('judul', 'asc')->get();

        $data = [
            'pemesanan' => $pemesanan,
            'produk' => $produk
        ];

        return view('cetak_invoice', $data);
    }

    function konfirmasi($id)
    {
        $user = UserModel::data();
        $pemesanan = $user->pemesanan()->where('id', $id)->first();

        $penerimaan = new PenerimaanModel();
        $penerimaan->user_id = $user->id;
        $penerimaan->pemesanan_id = $pemesanan->id;
        $penerimaan->fungsi = request()->getPost('fungsi');
        $penerimaan->training = request()->getPost('training');
        $penerimaan->saran = request()->getPost('saran');
        $penerimaan->save();

        $pemesanan->status_tipe = 5;
        $pemesanan->update();
        return redirect()->to(base_url('/pemesanan/detail/' . $pemesanan->id));
    }

    function cetak_faktur_penjualan($id)
    {
        $user = UserModel::data();

        if ($user->level == 'konsumen') {
            $pemesanan = $user->pemesanan()->where('id', $id)->first();
        } else {
            $pemesanan = PemesananModel::find($id);
        }

        $produk = $pemesanan->pemesanan_produk()->orderBy('judul', 'asc')->get();

        $data = [
            'pemesanan' => $pemesanan,
            'produk' => $produk
        ];

        return view('admin/cetak_faktur_penjualan', $data);
    }
}
