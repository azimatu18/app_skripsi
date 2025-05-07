<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    function konsumen()
    {
        $data['konsumen'] = UserModel::all(); 
        return view('admin/konsumen', $data);
    }
}
