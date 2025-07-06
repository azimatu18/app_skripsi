<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemesananModel;
use App\Models\PenerimaanModel;
use App\Models\UserModel;
use App\Models\ValidasiDokumenModel;
use CodeIgniter\HTTP\ResponseInterface;

class ValidasiDokumenController extends BaseController
{
    public function kirim()
    {
        $id = request()->getPost('id');
        $tipe_dokumen = request()->getPost('tipe_dokumen');

        # cek tipe dokumen, tipe dokemen == "faktur_dan_ba", bikin 2 dokumen, return "Pengajuan Validasi Dokumen Faktur dan Berita Acara"
        # else 

        if ($tipe_dokumen == 'faktur_dan_ba') {
            $validasiDokumen = ValidasiDokumenModel::updateOrCreate(
                ['pemesanan_id' => $id, 'tipe_dokumen' => 'Faktur Penjualan'],
                ['status' => 1, 'alasan' => null]
            );

            $validasiDokumen = ValidasiDokumenModel::updateOrCreate(
                ['pemesanan_id' => $id, 'tipe_dokumen' => 'Berita Acara'],
                ['status' => 1, 'alasan' => null]
            );
            return redirect()->back()->with('success', 'Bukti pelunasan telah dikonfirmasi dan ajukan validasi dokumen faktur penjualan dan berita acara');
        }

        $validasiDokumen = ValidasiDokumenModel::updateOrCreate(
            ['pemesanan_id' => $id, 'tipe_dokumen' => $tipe_dokumen],
            ['status' => 1, 'alasan' => null]
        );
        return redirect()->back()->with('success', 'Barang siap kirim dan ajukan validasi dokumen surat jalan');
    }

    public function daftar()
    {
        if (UserModel::data()['level'] != 'Manajer Operasional') {
            return redirect()->to('/admin/dashboard');
        }

        $data['data_dokumen'] = ValidasiDokumenModel::with('pemesanan')->orderBy('id', 'desc')->get();

        return view('admin/validasi_dokumen', $data);
    }

    public function detail($id)
    {
        if (UserModel::data()['level'] != 'Manajer Operasional') {
            return redirect()->to('/admin/dashboard');
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

        // Ambil data penerimaan berdasarkan pemesanan_id
        $penerimaan = PenerimaanModel::where('pemesanan_id', $pemesanan->id)->first();

        $data = [
            'dokumen' => $dokumen,
            'pemesanan' => $pemesanan,
            'produk' => $produk,
            'penerimaan' => $penerimaan,
        ];

        return view('admin/detail_validasi_dokumen', $data);
    }

    public function disetujui($id)
    {
        $dokumen = ValidasiDokumenModel::find($id);

        if (!$dokumen) {
            return redirect()->back()->with('error', 'Dokumen tidak ditemukan');
        }
        // Ambil data pemesanan berdasarkan relasi dari dokumen
        $pemesanan = PemesananModel::find($dokumen->pemesanan_id);

        // Setujui dokumen
        $dokumen->status_dokumen = 2; // Disetujui
        $dokumen->alasan = null;
        $dokumen->save();

        // Cek tipe dokumen
        if ($dokumen->tipe_dokumen == 'Surat Jalan') {
            if ($pemesanan) {
                $pemesanan->status_tipe = 4;
                $pemesanan->update();
            }

            return redirect()->to(base_url('admin/validasi_dokumen'))->with('success', 'Dokumen surat jalan disetujui');
        }

        if ($dokumen->tipe_dokumen == 'Faktur Penjualan') {
            // Cek apakah dokumen Berita Acara juga sudah disetujui
            $beritaAcara = ValidasiDokumenModel::where([
                'pemesanan_id' => $dokumen->pemesanan_id,
                'tipe_dokumen' => 'Berita Acara'
            ])->first();

            if ($beritaAcara && $beritaAcara->status_dokumen == 2 && $pemesanan) {
                $pemesanan->status_tipe = 7;
                $pemesanan->update();
            }

            return redirect()->to(base_url('admin/validasi_dokumen'))->with('success', 'Dokumen faktur penjualan disetujui');
        }

        if ($dokumen->tipe_dokumen == 'Berita Acara') {
            // Cek apakah dokumen Faktur Penjualan juga sudah disetujui
            $faktur = ValidasiDokumenModel::where([
                'pemesanan_id' => $dokumen->pemesanan_id,
                'tipe_dokumen' => 'Faktur Penjualan'
            ])->first();

            if ($faktur && $faktur->status_dokumen == 2 && $pemesanan) {
                $pemesanan->status_tipe = 7;
                $pemesanan->update();
            }

            return redirect()->to(base_url('admin/validasi_dokumen'))->with('success', 'Dokumen berita acara disetujui');
        }
        // Jika tipe dokumen tidak dikenali
        return redirect()->back()->with('error', 'Tipe dokumen tidak dikenali');
    }
}
