<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam extends Model
{
    use HasFactory;
       protected $table= "rekam";
    public $timestamps = false;
        protected $fillable =[
       'id_poli',
       'id_pasien',
    ];

}
