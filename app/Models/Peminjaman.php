<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = "id_peminjaman";
    public $timestamps = false;
    protected $fillable = ['id_siswa','id_kelas','id_buku','tgl_peminjaman','tgl_kembali','status'];

}

