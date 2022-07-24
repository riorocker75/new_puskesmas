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
use App\Models\Diagnosa;
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

    function rekam_act(Request $request){
           $request->validate([
            'no_rm' => 'required',
        ]);

       $kode_rekam=mt_rand(100000, 999999);

        RekamMedis::insert([
            'kode_rekam'=> $kode_rekam,
            'no_rm' => $request->no_rm,
            'dokter' => $request->dokter,
            'tanggal' => $request->tanggal,
            'tindakan' => $request->tindakan,
            'status' => 1
        ]);
        Diagnosa::insert([
            'kode_rekam'=> $kode_rekam,
            'keluhan' => $request->keluhan,
            'telaah' => $request->telaah,
            'rpt' => $request->rpt,
            'rpo' => $request->rpo,
            'alergi' => $request->alergi,

            'td' => $request->td,
            'pr' => $request->pr,
            'bb' => $request->bb,
            'lp' => $request->lp,
            'hr' => $request->hr,
            't' => $request->t,
            'tb' => $request->tb,

            'assement' => $request->assement,
            'planing' => $request->planning,
            'education' => $request->education,
            'terapi' => $request->terapi,
            'status' => 1,

        ]);
        return redirect('/dashboard/dokter')->with('alert-success','Data tersimpan');
    }


    function rekam_edit($id){
        $data=Diagnosa::where('id',$id)->get();
        return view('dokter.diagnosis_edit',[
            'data' => $data
        ]);
    }

    function rekam_update(Request $request){
        $request->validate([
            'no_rm' => 'required',
        ]);
        $id_diagnosis=$request->id_diagnosa;
        $id_rekam=$request->id_rekam;

       $kode_rekam=mt_rand(100000, 999999);

        RekamMedis::where('id',$id_rekam)->update([
            'kode_rekam'=> $kode_rekam,
            'no_rm' => $request->no_rm,
            'dokter' => $request->dokter,
            'tanggal' => $request->tanggal,
            'tindakan' => $request->tindakan,
        ]);
        Diagnosa::where('id',$id_diagnosis)->update([
            'kode_rekam'=> $kode_rekam,
            'keluhan' => $request->keluhan,
            'telaah' => $request->telaah,
            'rpt' => $request->rpt,
            'rpo' => $request->rpo,
            'alergi' => $request->alergi,

            'td' => $request->td,
            'pr' => $request->pr,
            'bb' => $request->bb,
            'lp' => $request->lp,
            'hr' => $request->hr,
            't' => $request->t,
            'tb' => $request->tb,

            'assement' => $request->assement,
            'planing' => $request->planning,
            'education' => $request->education,
            'terapi' => $request->terapi,

        ]);
        return redirect('/dashboard/dokter')->with('alert-success','Data tersimpan');


    }







}
