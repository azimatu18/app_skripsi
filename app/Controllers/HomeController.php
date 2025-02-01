<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('home');
    }
    public function shop(): string
    {
        $produk = new ProdukModel();
        $data['data_produk'] = $produk->findAll();
        return view('shop', $data);
    }
    public function about(): string
    {
        return view('about');
    }
    public function contact(): string
    {
        return view('contact');
    }
    public function detail_produk($id)
    {
        $produk = new ProdukModel();
        $data['produk'] = $produk->find($id);

        $produk_lain = new ProdukModel();
        $data['produk_lain'] = $produk_lain->limit(4)->findAll();

        return view('detail_produk', $data);
    }
}
