<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpeminjaman extends Model
{
    use HasFactory;
    protected $table = 'detail_peminjaman';
    protected $primaryKey = "id_detail";
    public $timestamps = null;

    protected $fillable = ['id_siswa','id_kelas','id_buku','tgl_pinjam','tgl_kembali','status'];
}
