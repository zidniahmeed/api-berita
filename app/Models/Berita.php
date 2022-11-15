<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    public function Penulis(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Tipe(){
        return $this->belongsTo(Tipe::class, 'id_tipe');
    }
}
