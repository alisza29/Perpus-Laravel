<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sswmodel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use illuminate\support\Facades\Hash;

class sswcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //mendapatkan siswa -> view di postman
    public function getsiswa()
    {
        $dt_siswa = sswmodel::get();
        return response()->json($dt_siswa);
    }

    //menambahkan siswa -> create
    public function addsiswa(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required|in:L,P',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_kelas' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }
        $save = sswmodel::create([
            'nama_siswa' => $req->get('nama_siswa'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender' => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'username' => $req->get('username'),
            'password' => $req->get('password'),
            'id_kelas' => $req->get('id_kelas'),
        ]);

        if ($save) {
            return Response()->json(['status' => true, 'message' => 'Sukses Menambah Siswa']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Menambah Siswa']);
        }
    }

    // mengubah data siswa -> update
    public function updatesiswa(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_kelas' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }

        $ubah = sswmodel::where('id_siswa', $id)->update([
            'nama_siswa' => $req->get('nama_siswa'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender' => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'username' => $req->get('username'),
            'password' => $req->get('password'),
            'id_kelas' => $req->get('id_kelas'),
        ]);

        if ($ubah) {
            return Response()->json(['status' => true, 'message' => 'Sukses Mengubah Siswa']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Mengubah Siswa']);
        }
    }

    //hapus siswa -> delete
    public function deletesiswa($id)
    {
        $hapus = sswmodel::where('id_siswa', $id)->delete();
        if ($hapus) {
            return Response()->json(['status' => true, 'message' => 'Sukses Hapus Data Siswa']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Hapus Data Siswa']);
        }
    }

    //pencarian berdasarkan id 
    public function getsiswaid($id)
    {
        $siswa = sswmodel::where('id_siswa', $id)->first();
        return Response()->json($siswa);
    }

}