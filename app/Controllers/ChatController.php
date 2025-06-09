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
        date_default_timezone_set('Asia/Jakarta');

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

        // session()->setFlashdata('open_chat', true);
        // return redirect()->back();
        return response()->setJSON(['status' => 'oke', 'last_id' => $chat->id]);
    }

    function admin()
    {
        $konsumen = UserModel::where('level', 'konsumen')->orderBy('nama', 'asc')->get();
        $data = [
            'konsumen' => $konsumen,
        ];

        return view('admin/chat', $data);
    }

    function load()
    {
        $last_id = request()->getGet('last_id');

        $user = UserModel::data();
        if ($user['level'] == 'konsumen') {
            $chat = ChatModel::where('konsumen_id', $user['id'])
                ->where('id', '>', $last_id)
                ->orderBy('id', 'ASC')
                ->get();
        } else {
            $konsumen = request()->getGet('konsumen');

            $chat = ChatModel::where('konsumen_id', $konsumen)
                ->where('id', '>', $last_id)
                ->orderBy('id', 'ASC')
                ->get();
        }
        return response()->setJSON(['chat' => $chat]);
    }
}
