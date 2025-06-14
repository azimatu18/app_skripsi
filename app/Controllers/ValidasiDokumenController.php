<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemesananModel;
use App\Models\UserModel;
use App\Models\ValidasiDokumenModel;
use CodeIgniter\HTTP\ResponseInterface;

class ValidasiDokumenController extends BaseController
{
    public function kirim()
    {
        $id = request()->getPost('id');
        $tipe_dokumen = request()->getPost('tipe_dokumen');

        $validasiDokumen = ValidasiDokumenModel::updateOrCreate(
            ['pemesanan_id' => $id, 'tipe_dokumen' => $tipe_dokumen],
            ['status' => 1, 'alasan' => null]
        );
        return redirect()->back()->with('success', 'Pengajuan Validasi Dokumen Surat Jalan');
    }

    public function daftar()
    {
        
        if (UserModel::data()['level'] != 'Manajer Operasional') {
            return redirect()->to('/admin/dashboard');
        }
        $data['data_dokumen'] = \Config\Database::connect()
            ->table('validasi_dokumen')
            ->select('validasi_dokumen.*, pemesanan.konsumen, pemesanan.id as pemesanan_id')
            ->join('pemesanan', 'pemesanan.id = validasi_dokumen.pemesanan_id')
            ->get()
            ->getResultArray();

        return view('admin/validasi_dokumen', $data);
    }

    public function detail($id)
    {
        if (UserModel::data()['level'] != 'Manajer Operasional') {
            return redirect()->back();
        }
        // $dokumen = ValidasiDokumenModel::where('pemesanan_id', $pemesanan_id)->get();
        $dokumen = ValidasiDokumenModel::find($id);
        // $pemesanan = PemesananModel::find($pemesanan_id);
        $pemesanan = $dokumen->pemesanan;

        if (!$pemesanan) {
            return redirect()->back()->with('error', 'Pemesanan tidak ditemukan');
        }

        // Pastikan pemesanan_produk adalah relasi yang benar di PemesananModel
        $produk = $pemesanan->pemesanan_produk()->orderBy('judul', 'asc')->get();
        $data = [
            'dokumen' => $dokumen,
            'pemesanan' => $pemesanan,
            'produk' => $produk
        ];

        return view('admin/detail_validasi_dokumen', $data);
    }

    public function disetujui($id)
    {
        $dokumen = ValidasiDokumenModel::find($id);

        if (!$dokumen) {
            return redirect()->back()->with('error', 'Dokumen tidak ditemukan');
        }

        $dokumen->status_dokumen = 2; // Disetujui
        $dokumen->alasan = null;
        $dokumen->save();

        return redirect()->to(base_url('admin/validasi_dokumen'))->with('success', 'Dokumen berhasil disetujui');
    }

    public function ditolak($id)
    {
        $dokumen = ValidasiDokumenModel::find($id);

        if (!$dokumen) {
            return redirect()->back()->with('error', 'Dokumen tidak ditemukan');
        }

        $alasan = $this->request->getPost('alasan_penolakan');
        if (!$alasan) {
            return redirect()->back()->with('error', 'Alasan penolakan harus diisi');
        }

        $dokumen->status_dokumen = 3; // Ditolak
        $dokumen->alasan = $alasan;
        $dokumen->save();

        return redirect()->to(base_url('admin/validasi_dokumen'))->with('success', 'Dokumen berhasil ditolak');
    }
}
