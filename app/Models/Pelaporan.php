<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    public function siswa(){
      return $this->belongsTo(Siswa::class);
    }

    public function kategori(){
      return $this->belongsTo(Kategori::class);
    }

    public function aspirasi(){
      return $this->hasOne(Aspirasi::class);
    }

    protected $guarded = [];
}
