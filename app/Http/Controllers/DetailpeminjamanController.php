<?php

namespace App\Http\Controllers;
use App\Models\Detailpeminjaman;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DetailpeminjamanController extends Controller
{
   public function getdetailpeminjaman(){
    $dt_detailpeminjaman=Detailpeminjaman::
    join('siswa','siswa.id_siswa','=','detailpeminjaman.id_siswa')->
    join('kelas','kelas.id_kelas','=','detailpeminjaman.id_kelas')->
    join('buku','buku.id_buku','=','detailpeminjaman.id_buku')->
    select('nama_siswa','nama_kelas','judul_buku','tgl_pinjam','tgl_kembali')->get();
    return response()->json($dt_detailpeminjaman);
   }
}