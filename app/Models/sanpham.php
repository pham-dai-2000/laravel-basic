<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $table = "sanpham";
    public $timestamps = false;

    public function loaisanpham(){
        return $this->belongsTo('App\Models\loaisanpham', 'id_loaisanpham', 'id');
    }
}
