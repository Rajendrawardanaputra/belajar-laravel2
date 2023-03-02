<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class BukuController extends Controller
{
   public function getbuku(){
    $dt_buku=Buku::get();
    return response()->json($dt_buku);
   }
   public function createbuku (Request $req){
    $validator = Validator::make($req->all(),[
     'judul_buku' => 'required',
     'pengarang' => 'required',
    ]);
    if($validator->fails()){
        return Response()->json($validator->errors()->toJson());
    }
    $save = Buku::create([
        'judul_buku' =>$req->get('judul_buku'),
        'pengarang' =>$req->get('pengarang'),
    ]);
    if($save){
        return Response()->json(['status'=>true,'massage'=>'Sukses Menambah Buku']);
    }else{
        return Response()->json(['status'=>false,'massage'=>'Gagal Menambah Buku']);
    }
   }
   public function updatebuku (Request $req, $id_buku)
   {
    $validator = Validator::make($req->all(),[  
        'judul_buku' => 'required',
        'pengarang' => 'required',
    ]);
    if($validator->fails()){
        return Response()->json($validator->errors()->toJson());
   }
   $ubah=Buku::where('id_buku',$id_buku)-> update([
        'judul_buku' =>$req->get('judul_buku'),
        'pengarang' =>$req->get('pengarang'),
   ]);
   if($ubah){
    return Response()->json(['status'=>true,'massage'=>'Sukses Mengupdate Buku']);
}else{
    return Response()->json(['status'=>false,'massage'=>'Gagal Mengupdate Buku']);
   }
   }
   public function deleteBuku (Request $req, $id_buku)
   {
   $hapus=Buku::where('id_buku',$id_buku)-> delete();
   if($hapus){
    return Response()->json(['status'=>true,'massage'=>'Sukses Menghapus Buku']);
}else{
    return Response()->json(['status'=>false,'massage'=>'Gagal Menghapus Buku']);
   }
   }
}
