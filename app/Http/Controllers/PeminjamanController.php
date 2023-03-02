<?php
namespace App\Http\Controllers;
//kepala kontrol
use App\Models\Peminjaman;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PeminjamanController extends Controller
{
    public function getpeminjaman($id)
    {
        $dt_peminjaman=Peminjaman::select('nama_siswa', 'nama_kelas','judul_buku','tgl_peminjaman', 'tgl_kembali','status')
        ->join('siswa', "siswa.id_siswa", "=" , 'peminjaman.id_siswa')
        ->join('kelas', "kelas.id_kelas", "=" , 'peminjaman.id_kelas')
        ->join('buku', "buku.id_buku", "=" , 'peminjaman.id_buku')
        ->where('id_peminjaman', '=', $id)
        ->get();
        return response()->json($dt_peminjaman);
    }
    public function createpeminjaman(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_siswa' => 'required',
            'id_kelas' => 'required',
            'id_buku' => 'required',
            'tgl_kembali' => 'required',
            
        ]);
        if ($validator->fails()) {
            return Response()->json($validator->errors()->toJson());
        }
        $save = Peminjaman::create([
            'id_siswa' => $req->get('id_siswa'),
            'id_kelas' => $req->get('id_kelas'),
            'id_buku' => $req->get('id_buku'),
            'tgl_peminjaman' =>date('Y-m-d  H:i:s'),
            'tgl_kembali' => $req->get('tgl_kembali'),  
            'status' => 'Dipinjam',
        ]);
        if ($save) {
            return Response()->json(['status' => true, 'massage' => 'Sukses Menambah Peminjaman']);
        } else {
            return Response()->json(['status' => false, 'massage' => 'Gagal Menambah Peminjaman']);
        }
    }
    public function deletepeminjaman(Request $req, $id_peminjaman)
    {
        $hapus = Peminjaman::where('id_peminjaman', $id_peminjaman)->delete();
        if ($hapus) {
            return Response()->json(['status' => true, 'massage' => 'Sukses Menghapus Peminjaman']);
        } else {
            return Response()->json(['status' => false, 'massage' => 'Gagal Menghapus Peminjaman']);
        }
    }
    public function kembalipeminjaman($id){
        $hapus=Peminjaman::where('id_peminjaman', "=", $id)
        ->update([
            'status' => 'Kembali' 
        ]);
        if($hapus){
            return Response()->json(['status'=>true,'message' => 'Sukses Mengembalikan buku ']);
        } else {
            return Response()->json(['status'=>false,'message' => 'Gagal Mengembalikan buku ']);
        }
        
    }
}
