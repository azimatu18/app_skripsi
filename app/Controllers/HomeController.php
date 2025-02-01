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
        $data['data_produk'] = ProdukModel::orderBy('judul', 'ASC')->get();
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
        $data['produk'] = ProdukModel::find($id);
        $data['produk_lain'] = ProdukModel::limit(4)->get();
        return view('detail_produk', $data);
    }
}
