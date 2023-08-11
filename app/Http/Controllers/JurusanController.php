<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index() {
        return view('jurusan.index'); 
    }
    
    public function get_data() {
        $data = Jurusan::orderBy('id', 'desc')->get();
        return response ()->json($data);
    }

    public function store_jurusan() {
        $id_edit = request('id_edit'); 

        if($id_edit != "null") {
            $data = Jurusan::find($id_edit);
            $data->fakultas = request('fakultas');
            $data->jurusan = request('jurusan');
            $data->save();
        } else {
            $data = new Jurusan;
            $data->fakultas = request('fakultas');
            $data->jurusan = request('jurusan');
            $data->save();
        }
        
        return response ()->json('sukses', 200);
    }

    public function get_detail($id) {
        $dt = Jurusan::find($id);
        
        return response ()->json($dt, 200);
    }

    public function hapus_jurusan($id) {
        Jurusan::where('id', $id)->delete();
        
        return response ()->json('sukses', 200);
    }
}