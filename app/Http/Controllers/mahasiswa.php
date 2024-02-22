<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use illuminate\support\Facades\Hash;

class mahasiswa extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //mendapatkan mhs -> view di postman
    public function getmhs()
    {
        $dt_mhsw = model::get();
        return response()->json($dt_mhsw);
    }

    //menambahkan mhs -> create
    public function addmhs(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_mhsw' => 'required',
            'nim' => 'required',
            'program studi' => 'required',
            'tanggal_pelaksanaan' => 'required',
            'tujuan_pelaksanaan' => 'required',
            'nomor_wa' => 'required|numeric',
            'email' => 'required|email',
            'file_pengantar' => 'required|mimes:pdf', // Only allow .pdf file types.
        ]);

        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }

        // Handle file upload
        if ($req->hasFile('file_pengantar')) {
            $file = $req->file('file_pengantar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
        }

        $save = model::create([
            'nama_mhs' => $req->get('nama_mhs'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender' => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            // save the filename to the database
            'file_pengantar' => $filename ?? null,
        ]);

        if ($save) {
            return Response()->json(['status' => true, 'message' => 'Sukses Menambah mhs']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Menambah mhs']);
        }
    }

    // mengubah data mhs -> update
    public function updatemhs(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'nama_mhs' => 'required',
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

        $ubah = model::where('id_mhs', $id)->update([
            'nama_mhs' => $req->get('nama_mhs'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender' => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'username' => $req->get('username'),
            'password' => $req->get('password'),
            'id_kelas' => $req->get('id_kelas'),
        ]);

        if ($ubah) {
            return Response()->json(['status' => true, 'message' => 'Sukses Mengubah mhs']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Mengubah mhs']);
        }
    }

    //hapus mhs -> delete
    public function deletemhs($id)
    {
        $hapus = model::where('id_mhs', $id)->delete();
        if ($hapus) {
            return Response()->json(['status' => true, 'message' => 'Sukses Hapus Data mhs']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Hapus Data mhs']);
        }
    }

    //pencarian berdasarkan id 
    public function getmhsid($id)
    {
        $mhs = model::where('id_mhs', $id)->first();
        return Response()->json($mhs);
    }

}
