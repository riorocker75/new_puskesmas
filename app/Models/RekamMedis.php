<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table= "rekam_medis";
 public $timestamps = false;
     protected $fillable =[
    'kode_rm',
 ];
}
