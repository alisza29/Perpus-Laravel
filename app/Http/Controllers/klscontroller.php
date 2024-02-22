<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\klsmodel;
use Illuminate\Support\Facades\Validator;
use illuminate\support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class klscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //mendapatkan kelas -> get
    public function getkelas()
    {
        $dt_kelas = klsmodel::get();
        return response()->json($dt_kelas);
    }

    //menambahkan kelas -> post
    public function addkelas(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_kelas' => 'required',
            'kelompok' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }
        $save = klsmodel::create([
            'nama_kelas' => $req->get('nama_kelas'),
            'kelompok' => $req->get('kelompok'),
        ]);

        if ($save) {
            return Response()->json(['status' => true, 'message' => 'Sukses Menambah kelas']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Menambah kelas']);
        }
    }

    // mengubah data kelas -> put
    public function updatekelas(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'nama_kelas' => 'required',
            'kelompok' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }

        $ubah = klsmodel::where('id_kelas', $id)->update([
            'nama_kelas' => $req->get('nama_kelas'),
            'kelompok' => $req->get('kelompok'),
        ]);

        if ($ubah) {
            return Response()->json(['status' => true, 'message' => 'Sukses Mengubah kelas']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Mengubah kelas']);
        }
    }

    //hapus kelas -> delete
    public function deletekelas($id)
    {
        $hapus = klsmodel::where('id_kelas', $id)->delete();
        if ($hapus) {
            return Response()->json(['status' => true, 'message' => 'Sukses Hapus Data kelas']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Hapus Data kelas']);
        }
    }

    //pencarian berdasarkan id -> get
    public function getkelasid($id)
    {
        $kelas = klsmodel::where('id_kelas', $id)->first();
        return Response()->json($kelas);
    }
}