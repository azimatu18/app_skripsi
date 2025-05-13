<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';  // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = false;    // Gunakan timestamps jika ada

    protected $guarded = ['id']; // Kolom yang boleh diisi

    static function data()
    {
        $user_id = session()->get('user_id');
        $user = UserModel::where('id', $user_id)->first();
        return $user;
    }
    
    function pemesanan()
    {
        return $this->hasMany(PemesananModel::class, 'user_id');
    }

    function chat_konsumen()
    {
        return $this->hasMany(ChatModel::class, 'konsumen_id');
    }

    function chat_pemasaran()
    {
        return $this->hasMany(ChatModel::class, 'user_id');
    }
}
