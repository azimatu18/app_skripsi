<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';  // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = false;    // Gunakan timestamps jika ada

    protected $guarded = ['id']; // Kolom yang boleh diisi
    
    function pemesanan_produk()
    {
        return $this->hasMany(PemesananProdukModel::class, 'pemesanan_id');
    }
}
