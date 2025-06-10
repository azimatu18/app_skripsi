<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanPerubahanModel extends Model
{
    protected $table = 'permintaan_perubahan';  // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = false;    // Gunakan timestamps jika ada

    protected $guarded = ['id']; // Kolom yang boleh diisi
}
