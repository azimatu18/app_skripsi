<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PermintaanPerubahanModel;
use App\Models\ProdukModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProdukController extends BaseController
{
    public function produk()
    {
        $data['data_produk'] = ProdukModel::get();
        return view('admin/produk', $data);
    }

    function produkTambah()
    {
        return view('admin/produk_tambah');
    }

    function produkSubmit()
    {
        $judul = request()->getPost('judul');
        $tipe = request()->getPost('tipe');
        $merek = request()->getPost('merek');
        $harga = request()->getPost('harga');
        $diskon = request()->getPost('diskon');
        $deskripsi = request()->getPost('deskripsi');
        $gambar = request()->getFile('gambar');

        $nama_gambar = 'produk_' . time() . '.' . $gambar->getClientExtension();
        $gambar->move('uploads/gambar', $nama_gambar);

        $produk = ProdukModel::create([
            'judul' => $judul,
            'tipe' => $tipe,
            'merek' => $merek,
            'harga' => $harga,
            'diskon' => $diskon,
            'deskripsi' => $deskripsi,
            'gambar' => $nama_gambar
        ]);

        return redirect()->to(base_url('/admin/produk'))->with('success', 'Produk berhasil ditambahkan');
    }

    public function produkEdit($id)
    {
        $produk = ProdukModel::find($id);

        return view('admin/produk_edit', ['produk' => $produk]);
    }

    public function produkUpdate($id)
    {
        $produk = ProdukModel::find($id);

        $judul = request()->getPost('judul');
        $tipe = request()->getPost('tipe');
        $merek = request()->getPost('merek');
        $harga = request()->getPost('harga');
        $diskon = request()->getPost('diskon');
        $deskripsi = request()->getPost('deskripsi');
        $gambar = request()->getFile('gambar');

        $dataUpdate = [
            'judul' => $judul,
            'tipe' => $tipe,
            'merek' => $merek,
            'harga' => $harga,
            'diskon' => $diskon,
            'deskripsi' => $deskripsi,
        ];

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $nama_gambar = 'produk_' . time() . '.' . $gambar->getClientExtension();
            $gambar->move('uploads/gambar', $nama_gambar);

            // Optional: hapus gambar lama
            if (file_exists('uploads/gambar/' . $produk['gambar'])) {
                unlink('uploads/gambar/' . $produk['gambar']);
            }

            $dataUpdate['gambar'] = $nama_gambar;
        }

        ProdukModel::where('id', $id)->update($dataUpdate);

        return redirect()->to(base_url('/admin/produk'))->with('success', 'Produk berhasil diperbarui');
    }

    public function produkHapus($id)
    {
        $produk = ProdukModel::find($id);
        if ($produk) {
            if (file_exists('uploads/gambar/' . $produk['gambar'])) {
                unlink('uploads/gambar/' . $produk['gambar']);
            }

            ProdukModel::where('id', $id)->delete();
        }

        return redirect()->to(base_url('/admin/produk'))->with('success', 'Produk berhasil dihapus');
    }

    // function validasiProduk()
    // {
    //     $data['produk_menunggu'] = ProdukModel::where('status_validasi_produk', 1)->get();

    //     return view('admin/validasi_produk', $data);
    // }

    function pengajuanEdit($id)
    {
        $produk = ProdukModel::find($id);

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        // 'tanggal_pengajuan' => date('Y-m-d H:i:s'),

        $judul = request()->getPost('judul');
        $tipe = request()->getPost('tipe');
        $merek = request()->getPost('merek');
        $harga = request()->getPost('harga');
        $diskon = request()->getPost('diskon');
        $deskripsi = request()->getPost('deskripsi');
        $gambar = request()->getFile('gambar');

        $dataUpdate = [
            'judul' => $judul,
            'tipe' => $tipe,
            'merek' => $merek,
            'harga' => $harga,
            'diskon' => $diskon,
            'deskripsi' => $deskripsi,
        ];

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $nama_gambar = 'produk_' . time() . '.' . $gambar->getClientExtension();
            $gambar->move('uploads/gambar', $nama_gambar);

            // Optional: hapus gambar lama
            // if (file_exists('uploads/gambar/' . $produk['gambar'])) {
            //     unlink('uploads/gambar/' . $produk['gambar']);
            // }

            $dataUpdate['gambar'] = $nama_gambar;
        } else {
            $dataUpdate['gambar'] = $produk->gambar;
        }

        PermintaanPerubahanModel::create([
            'produk_id' => $id,
            'status' => 1,
            'data_baru' => json_encode($dataUpdate),
            'alasan_penolakan' => null,
            'waktu' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(base_url('/admin/produk'))->with('success', ' berhasil ');
    }

    function pengajuanEditProduk()
    {
        $data['data_produk'] = PermintaanPerubahanModel::get();
        return view('admin/pengajuan_edit_produk', $data);
    }

    function detailPengajuanEditProduk($id)
    {
        $data['permintaan_perubahan'] = PermintaanPerubahanModel::find($id);
        // dd(json_decode($data['permintaan_perubahan']->data_baru, true));
        $data['produk'] = json_decode($data['permintaan_perubahan']->data_baru, true);

        return view('admin/detail_pengajuan_edit', $data);
    }

    function pengajuanDisetujui($id)
    {
        $pengajuan = PermintaanPerubahanModel::find($id);

        if (!$pengajuan) {
            return redirect()->back()->with('error', 'Pengajuan tidak ditemukan');
        }

        $produk_id = $pengajuan['produk_id'];
        $dataBaru = json_decode($pengajuan['data_baru'], true);

        // Update data produk
        ProdukModel::where('id', $produk_id)->update($dataBaru);

        // Update status pengajuan menjadi disetujui (2)
        PermintaanPerubahanModel::where('id', $id)->update([
            'status' => 2,
            'alasan_penolakan' => null,
        ]);

        return redirect()->to(base_url('admin/produk/pengajuan_edit_produk'))->with('success', 'Pengajuan edit produk berhasil disetujui dan produk telah diperbarui');
    }

    function pengajuanDitolak($id)
    {
        $pengajuan = PermintaanPerubahanModel::find($id);

        if (!$pengajuan) {
            return redirect()->back()->with('error', 'Pengajuan tidak ditemukan');
        }

        // Ambil alasan penolakan dari form
        $alasan = $this->request->getPost('alasan_penolakan');

        // Update status pengajuan menjadi ditolak (3)
        PermintaanPerubahanModel::where('id', $id)->update([
            'status' => 3,
            'alasan_penolakan' => $alasan,
        ]);
        if (!$alasan) {
            return redirect()->back()->with('error', 'Alasan penolakan harus diisi');
        }

        return redirect()->to(base_url('admin/produk/pengajuan_edit_produk'))->with('success', 'Pengajuan edit produk ditolak');
    }
}
