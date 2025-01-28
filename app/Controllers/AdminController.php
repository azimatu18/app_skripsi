<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
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

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function produk()
    {
        return view('admin/produk');
    }
}
