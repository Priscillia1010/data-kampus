<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        return view('mahasiswa.index');
    }

    public function get_data() {
        $data = Mahasiswa::orderBy('id', 'desc')->get();
        return response()->json($data);
    }

    public function store_mahasiswa() {
        $id_edit = request('id_edit');
        
        if($id_edit != "null") {
            $data = Mahasiswa::find($id_edit);
            $data->nama = request('nama');
            $data->email = request('email');
            $data->save();
        } else {
            $data = new Mahasiswa;
            $data->nama = request('nama');
            $data->email = request('email');
            $data->save();
        }

        return response ()->json('sukses', 200);
    }

    public function get_detail($id) {
        $dt = Mahasiswa::find($id);

        return response ()->json($dt, 200);
    }

    public function hapus_mahasiswa($id) {
        Mahasiswa::where('id', $id)->delete();

        return response ()->json('sukses', 200);
    }
    public function get_mahasiswa_paging() {
        $paging = request('paging');
        $search = request('search');
        $data = Mahasiswa::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%$search%")->orWhere('email', 'like', "%$search%");;
        })
        ->select(['id', 'nama', 'email', 'created_at', 'updated_at'])->orderBy('nama')->paginate($paging);
        return response()->json($data);
    }
    public function get_mahasiswa_jurusan() {
        $mahasiswas =  Mahasiswa::find(1);
        $jurusan = $mahasiswas->jurusan;
        return $jurusan;
    }
}