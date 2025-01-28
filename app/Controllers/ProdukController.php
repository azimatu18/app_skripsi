<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProdukController extends BaseController
{
    function __construct()
    {
        // return redirect()->to(base_url('/login'));
        $sudah_login = session()->get('sudah_login');
        if (!$sudah_login) {
            header('Location: ' . base_url('/login'));
            exit();
        }
    }

    public function produk()
    {
        $produk = new ProdukModel();
        $data['data_produk'] = $produk->findAll();
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

        $produk = new ProdukModel();
        $produk->insert([
            'judul' => $judul,
            'tipe' => $tipe,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'gambar' => $nama_gambar
        ]);

        return redirect()->to(base_url('/admin/produk'));
    }
}
