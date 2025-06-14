<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemesananModel;
use App\Models\PemesananProdukModel;
use App\Models\UserModel;
use App\Models\ValidasiDokumenModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminPemesananController extends BaseController
{
    public function index()
    {
        $data['pemesanan'] = PemesananModel::orderBy('id', 'desc')->get();
        return view('admin/pemesanan', $data);
    }

    function detail($id)
    {
        $pemesanan = PemesananModel::find($id);
        if (!$pemesanan) {
            return redirect()->to(base_url('/pemesanan'))->with('error', 'Pesanan tidak ditemukan.');
        }

        $detail_pesanan = PemesananProdukModel::where('pemesanan_id', $id)->get();
        $surat_jalan = null;
        $surat_jalan = $pemesanan->validasi_dokumen()->where('tipe_dokumen', 'Surat Jalan')->first();

        $data = [
            'pemesanan' => $pemesanan,
            'detail_pesanan' => $detail_pesanan,
            'surat_jalan' => $surat_jalan
        ];

        return view('admin/pemesanan_detail', $data);
    }

    public function konfirmasi()
    {
        $id = $this->request->getPost('id');
        $pemesanan = \App\Models\PemesananModel::find($id);

        if (!$pemesanan) {
            return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
        }

        // Ubah status_tipe menjadi "3" (diproses)
        $pemesanan->status_tipe = '3';
        $pemesanan->save();

        return redirect()->back()->with('success', 'Status pemesanan telah dikonfirmasi dan diubah ke Diproses.');
    }

    public function konfirmasi_lunas()
    {
        $id = $this->request->getPost('id');
        $pemesanan = \App\Models\PemesananModel::find($id);

        if (!$pemesanan) {
            return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
        }

        // Ubah status_tipe menjadi "7" (selesai)
        $pemesanan->status_tipe = '7';
        $pemesanan->save();

        return redirect()->back()->with('success', 'Status pemesanan telah dikonfirmasi dan diubah ke Selesai.');
    }

    function kirim()
    {
        $id = request()->getPost('id');

        $tahun = date('Y');
        $total = PemesananModel::whereYear('tanggal_dikirim', $tahun)->count() + 1;
        $pemesanan = PemesananModel::find($id);
        $pemesanan->status_tipe = 4;
        $pemesanan->tanggal_dikirim = date('Y-m-d');
        $pemesanan->no_surat_jalan = $total . '/SJ/' . $tahun;
        $pemesanan->save();

        return redirect()->back()->with('success', 'Status pemesanan telah dikirim.');
    }

    function cetak_surat_jalan($id)
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

        return view('admin/cetak_surat_jalan', $data);
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

    function cetak_berita_acara($id)
    {
        $user = UserModel::data();

        if ($user->level == 'konsumen') {
            $pemesanan = $user->pemesanan()->where('id', $id)->first();
        } else {
            $pemesanan = PemesananModel::find($id);
        }

        $produk = $pemesanan->pemesanan_produk()->orderBy('judul', 'asc')->get();
        $penerimaan = $pemesanan->penerimaan;

        $data = [
            'pemesanan' => $pemesanan,
            'produk' => $produk,
            'penerimaan' => $penerimaan,
        ];

        return view('admin/cetak_berita_acara', $data);
    }
}
