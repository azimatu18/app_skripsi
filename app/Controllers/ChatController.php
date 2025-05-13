<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChatModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ChatController extends BaseController
{
    public function tambah()
    {
        $user = UserModel::data();

        $pesan = request()->getPost('pesan');
        $waktu = date('Y-m-d H:i:s');

        $chat = new ChatModel();
        $chat->pesan = $pesan;
        $chat->waktu = $waktu;

        if ($user['level'] == 'konsumen') {
            $chat->konsumen_id = $user['id'];
        } else {
            $konsumen = request()->getPost('konsumen');
            $chat->user_id = $user['id'];
            $chat->konsumen_id = $konsumen;
        }
        $chat->save();

        session()->setFlashdata('open_chat', true);
        return redirect()->back();
    }

    function admin() {
        $konsumen = UserModel::where('level', 'konsumen')->orderBy('nama', 'asc')->get();
        $data = [
            'konsumen'=>$konsumen,
        ];

        return view('admin/chat', $data);
    }
}
