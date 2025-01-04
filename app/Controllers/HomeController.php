<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('home');
    }
    public function shop(): string
    {
        return view('shop');
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
