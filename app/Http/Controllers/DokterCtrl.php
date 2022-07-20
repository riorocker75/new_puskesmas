<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Models\Pasien;
use App\Models\Rekam;
use App\Models\RekamMedis;

use App\Models\Rujukan;
use App\Models\Kwitansi;
use App\Models\Pegawai;
use App\Models\Poli;
use App\Models\User;
use App\Models\Admin;
use App\Models\Dokter;
class DokterCtrl extends Controller
{
   
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-dk')){
                return redirect('/login')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    function index(){
        return view('dokter.dokter');
    }

    function rekam_add($id){
        $data=Pasien::where('id',$id)->get();
        return view('dokter.diagnosis_add',[
            'data' => $data
        ]);
    }


}
