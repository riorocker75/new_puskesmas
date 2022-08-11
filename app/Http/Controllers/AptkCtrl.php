<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Models\Pasien;
use App\Models\Rekam;
use App\Models\Rujukan;
use App\Models\RekamMedis;

use App\Models\Diagnosa;
use App\Models\Poli;
use App\Models\User;
use App\Models\Admin;
use App\Models\Dokter;

class AptkCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-ap')){
                return redirect('/login')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
        
    }


     function index(){
        return view('apoteker.apoteker');
    }

    function resep_update(Request $request){
         $request->validate([
            'id' => 'required',
        ]);

        $id=$request->id;

        Diagnosa::where('id',$id)->update([
            'terapi'=> $request->terapi
        ]);


    }


    function cetak_resep($id){
          $data= Diagnosa::where('id',$id)->get();
            return view('cetak.cetak_resep',[
                'data' =>$data
            ]);
    }






}
