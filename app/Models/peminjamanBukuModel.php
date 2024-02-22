<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjamanBukuModel extends Model
{
    // use HasFactory;
    protected $table ='peminjaman_buku';
    protected $primarykey='id_peminjaman_buku';
    public $timestamps= false;
    protected $fillable=[
        'id_siswa','tanggal_pinjam','tanggal_kembali'
    ];

}
