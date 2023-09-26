<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class Jurusan extends Model
{
    use HasFactory;

    public function mahasiswas() {
        return $this->hasMany(Mahasiswa::class);
    }

    public function dosen() {
        return $this->hasOne(Dosen::class);
    }
}