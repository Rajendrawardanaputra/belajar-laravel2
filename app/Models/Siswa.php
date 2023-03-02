<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "siswa";
    protected $primaryKey = "id_siswa"; 
    protected $fillable = ['nama_siswa','tanggal_lahir','gender','alamat','id_kelas'] ;
}
