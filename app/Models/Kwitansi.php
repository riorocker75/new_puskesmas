<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    use HasFactory;
    protected $table= "kwitansi";
    public $timestamps = false;
      protected $fillable =[
       'id_rekam',
       
    ];
}
