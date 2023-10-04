<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat'; // Nama tabel di database

    protected $primaryKey = 'id_surat'; // Nama kolom primary key

    protected $fillable = [
        'id_jenis_surat',
        'id_user',
        'tanggal_surat',
        'ringkasan',
        'file'
        // Tambahkan atribut lain yang diperlukan
    ];

    // Jika Anda ingin menggunakan timestamp created_at dan updated_at
    public $timestamps = false;
}
