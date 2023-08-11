<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index() {
        return view('dosen.index');
    }
    
    public function get_data() {
        $data = Dosen::orderBy('id', 'desc')->get();
        return response()->json($data);
    }

    public function store_dosen() {
        $id_edit = request('id_edit');

        if($id_edit != "null") {
            $data = Dosen::find($id_edit);
            $data->nama = request('nama');
            $data->email = request('email');
            $data->save();
        } else {
            $data = new Dosen;
            $data->nama = request('nama');
            $data->email = request('email');
            $data->save();
        }
        
        return response()->json('sukses', 200);
    }

    public function get_detail($id) {
        $dt = Dosen::find($id);
        
        return response()->json($dt, 200);
    }

    public function hapus_dosen($id) {
        Dosen::where('id', $id)->delete();
        
        return response()->json('sukses', 200);
    }
}