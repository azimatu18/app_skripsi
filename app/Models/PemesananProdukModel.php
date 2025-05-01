<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananProdukModel extends Model
{
    protected $table = 'pemesanan_produk';  // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = false;    // Gunakan timestamps jika ada

    protected $guarded = ['id']; // Kolom yang boleh diisi
}
