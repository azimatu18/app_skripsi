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
}
