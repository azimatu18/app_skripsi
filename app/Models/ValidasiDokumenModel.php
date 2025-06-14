<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidasiDokumenModel extends Model
{
    protected $table = 'validasi_dokumen';  // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = false;    // Gunakan timestamps jika ada

    protected $guarded = ['id']; // Kolom yang boleh diisi

    function pemesanan()
    {
        return $this->belongsTo(PemesananModel::class, 'pemesanan_id');
    }
}

