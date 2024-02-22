<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bkmodel;
use Illuminate\Support\Facades\Validator;

class bkcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //mendapatkan buku -> get
    public function getbuku()
    {
        $dt_buku = bkmodel::get();
        return response()->json($dt_buku);
    }

    // nambahin buku -> post
    public function addbuku(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'foto' => 'required|image',
            'nama_buku' => 'required',
            'pengarang' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }

        //proses foto
        if ($req->hasFile('foto')) {
            $file = $req->file('foto');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);

        //nyimpen foto
            $save = bkmodel::create([
                'foto' => $fileName,
                'nama_buku' => $req->get('nama_buku'),
                'pengarang' => $req->get('pengarang'),
                'deskripsi' => $req->get('deskripsi'),
            ]);

            return response()->json(['message' => 'Sukses mengunggah file foto']);
        } else {
            return response()->json(['message' => 'Gagal mengunggah file foto']);
        }

        //nyimpen data buku
        if ('$save') {
            return response()->json(['status' => true, 'message' => 'Sukses menambahkan buku']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambahkan buku']);
        }
    }

    // mengubah data buku -> put
    public function updatebuku(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'foto' => 'required',
            'nama_buku' => 'required',
            'pengarang' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }

        $ubah = bkmodel::where('id_buku', $id)->update([
            'foto' => $req->get('foto'),
            'nama_buku' => $req->get('nama_buku'),
            'pengarang' => $req->get('pengarang'),
            'deskripsi' => $req->get('deskripsi'),
        ]);

        if ($ubah) {
            return response()->json(['status' => true, 'message' => 'Sukses mengubah buku']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mengubah buku']);
        }
    }

    //hapus buku -> delete
    public function deletebuku($id)
    {
        $hapus = bkmodel::where('id_buku', $id)->delete();
        if ($hapus) {
            return response()->json(['status' => true, 'message' => 'Sukses menghapus buku']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus buku']);
        }
    }

    //pencarian berdasarkan id -> get
    public function getbukuid($id)
    {
        $buku = bkmodel::where('id_buku', $id)->first();
        return Response()->json($buku);
    }
}