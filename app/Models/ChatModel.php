<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatModel extends Model
{
    protected $table = 'chat';  // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = false;    // Gunakan timestamps jika ada

    protected $guarded = ['id']; // Kolom yang boleh diisi

    function konsumen()
    {
        return $this->belongsTo(UserModel::class, 'konsumen_id');
    }

    function pemasaran()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
