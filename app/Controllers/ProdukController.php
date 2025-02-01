<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
        $harga = request()->getPost('harga');
        $deskripsi = request()->getPost('deskripsi');
        $gambar = request()->getFile('gambar');

        $nama_gambar = 'produk_' . time() . '.' . $gambar->getClientExtension();
        $gambar->move('uploads/gambar', $nama_gambar);

        $produk = ProdukModel::create([
            'judul' => $judul,
            'tipe' => $tipe,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'gambar' => $nama_gambar
        ]);

        return redirect()->to(base_url('/admin/produk'));
    }
}
