<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemesananModel;
use App\Models\PemesananProdukModel;
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

        $data = [
            'pemesanan' => $pemesanan,
            'detail_pesanan' => $detail_pesanan
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

    function kirim() {
        $no_po = request()->getPost('no_po');
        $id = request()->getPost('id');

        $tahun = date('Y');
        $total = PemesananModel::whereYear('tanggal_dikirim', $tahun)->count() + 1;
        $pemesanan = PemesananModel::find($id);
        $pemesanan->no_po=$no_po;
        $pemesanan->status_tipe=4;
        $pemesanan->tanggal_dikirim=date('Y-m-d');
        $pemesanan->no_surat_jalan=$total.'/SJ/'.$tahun;
        $pemesanan->save();

        return redirect()->back()->with('success', 'Status pemesanan telah dikirim.');
    }
    
}
