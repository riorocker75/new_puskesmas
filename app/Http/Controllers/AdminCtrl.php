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
use App\Models\Diagnosa;








class AdminCtrl extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-adm')){
                return redirect('/login')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    public function __invoke(Request $request)
    {
       

    }

    function index(){
          return view('admin.admin');
    }


    // pasien
    function pasien(){
        return view('pasien.pasien');
    }

    function pasien_act(Request $request){
         $request->validate([
            'nama' => 'required',
            'nik' => 'required'
        ]);

         $date=date('Y-m-d');

         DB::table('pasien')->insert([
            'nama' => $request->nama,
            'nik' =>$request->nik,
            'kartu_berobat'=> $request->kartu,
            'tanggal_lahir'=> $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'agama'=> $request->agama,
            'pekerjaan'=> $request->kerja,
            'alamat'=> $request->alamat,
            'nama_kepala'=> $request->kepala,
            'tgl_registrasi' => $date,
            'status' => 1
        ]);

        return redirect('/dashboard/pasien/data')->with('alert-success','Data diri anda sudah terkirim');

    }

    function pasien_simple_act(Request $request){
        $request->validate([
           'nama' => 'required',
       ]);

        $date=date('Y-m-d');

        DB::table('pasien')->insert([
           'nama' => $request->nama,
           'no_rm' => $request->no_rekam,
           'jenis_kelamin' => $request->kelamin,
          'alamat'=>$request->alamat,
          'gol_darah'=>$request->gol_darah,
           'tgl_registrasi' => $date,
           'status' => 1
       ]);

       return redirect('/')->with('alert-success','Data registrasi tersimpan');

   }

     function pasien_data(){
         $data = Pasien::orderBy('id','desc')->get();
        return view('admin.pasien_data',[
            'data' =>$data
        ]);
    }
    function pasien_edit($id){
          $data = Pasien::where('id',$id)->get();
        return view('admin.pasien_edit',[
            'data' =>$data
        ]);
    }

    function pasien_update(Request $request){
        $id=$request->id;

        Pasien::where('id',$id)->update([
            'nama' => $request->nama,
            'no_rm' => $request->no_rm,
            'jenis_kelamin' => $request->kelamin,
           'alamat'=>$request->alamat,
           'gol_darah'=>$request->gol_darah, 
           'agama'=>$request->agama,
           'pekerjaan'=>$request->kerja,
           'tempat_lahir'=>$request->tmp_lhr,
           'tanggal_lahir'=>$request->tgl_lhr,

           'status_nikah'=>$request->status_nikah,
           'no_hp'=>$request->no_hp,
           'gol_darah'=>$request->gol_darah,
           'nik'=>$request->nik,
           'jkn'=>$request->jkn,
           'alergi_obat'=>$request->alergi_obat,
           'alergi_makan'=>$request->alergi_makan,
           'alergi_udara'=>$request->alergi_udara,
           'alergi_lain'=>$request->alergi_lain,

        ]);
       return redirect('/')->with('alert-success','Data telah berubah');

        
    }
    function pasien_delete($id){
        $pasien=Pasien::where('id',$id)->first();
      
        
        $nr=RekamMedis::count();
                if($nr > 0){
                    $rekam=RekamMedis::where('no_rm',$pasien->no_rm)->first();
                    $r_count=RekamMedis::where('no_rm',$pasien->no_rm)->count();
                    if($r_count > 0){  
                       RekamMedis::where('no_rm',$rekam->no_rm)->delete();
                   }
                }
               
         $dr=Diagnosa::count();  
                if($dr > 0){
                    $diagnosa=Diagnosa::where('kode_rekam',$rekam->kode_rekam)->first();
                     $d_count=Diagnosa::where('kode_rekam',$rekam->kode_rekam)->count();
                    if($d_count > 0){
                           Diagnosa::where('kode_rekam',$diagnosa->kode_rekam)->delete();
                       }   
                }
              

               Pasien::where('id',$id)->delete();
        return redirect('/')->with('alert-success','Data Berhasil terhapus');  
    }


    // pegawai

    function pegawai(){
        $data=Pegawai::orderBy('id','desc')->get();
        return view('admin.pegawai_data',[
            'data' =>$data
        ]);

    }

    function pegawai_add(){
        return view('admin.pegawai_add');
    }

    function pegawai_act(Request $request){
            $request->validate([
                'nama' => 'required',
                'nip' => 'required'
            ]);

             $date=date('Y-m-d');

         DB::table('pegawai')->insert([
            'nama' => $request->nama,
            'nip' =>$request->nip,
            'jenis_kelamin' => $request->kelamin,
            'tanggal_lahir' => $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'alamat' => $request->alamat,
            'telepon' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'pendidikan_nama' => $request->pendidikan,
            'pendidikan_tahun_lulus' => $request->thn_lulus,
            'pendidikan_tk_ijazah' => $request->pt_ijazah,
            // 'pangkat' => $request->pangkat,
            'tmt_cpns' => $request->cpns,
            'tanggal' => date('Y-m-d'),

            'status' => 1
        ]);

        return redirect('/dashboard/pegawai/data')->with('alert-success','Data diri anda sudah terkirim');


    }

    function pegawai_edit($id){
        $data=Pegawai::where('id',$id)->get();
        return view('admin.pegawai_edit',[
            'data' => $data
        ]);
    }
    function pegawai_update(Request $request){
          $request->validate([
                'nama' => 'required',
                'nip' => 'required'
            ]);
            $id=$request->id;

             $date=date('Y-m-d');

         DB::table('pegawai')->where('id',$id)->update([
            'nama' => $request->nama,
            'nip' =>$request->nip,
            'jenis_kelamin' => $request->kelamin,
            'tanggal_lahir' => $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'alamat' => $request->alamat,
            'telepon' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'pendidikan_nama' => $request->pendidikan,
            'pendidikan_tahun_lulus' => $request->thn_lulus,
            'pendidikan_tk_ijazah' => $request->pt_ijazah,
            // 'pangkat' => $request->pangkat,
            'tmt_cpns' => $request->cpns,
            'status' => 1
        ]);

        return redirect('/dashboard/pegawai/data')->with('alert-success','Data diri anda sudah terkirim');

    }

    function pegawai_delete($id){
                 Pegawai::where('id',$id)->delete();
        return redirect('/dashboard/pegawai/data')->with('alert-success','Data Berhasil');
    }


    // data dokter
    function dokter(){
        $data=Dokter::orderBy('id','desc')->get();
        return view('admin.dokter_data',[
            'data' => $data
        ]);
    }
    function dokter_add(){
        return view('admin.dokter_add');
    }
    function dokter_act(Request $request){
            $request->validate([
                'nama' => 'required',
                'nip' => 'required'
            ]);

             $date=date('Y-m-d');

         DB::table('dokter')->insert([
            'nama' => $request->nama,
            'nip' =>$request->nip,
            'jenis_kelamin' => $request->kelamin,
            'tanggal_lahir' => $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'alamat' => $request->alamat,
            'telepon' => $request->no_hp,
            'poli' => $request->poli,
            'tanggal' =>$date,
            'status' => 1
        ]);
        return redirect('/dashboard/dokter/data')->with('alert-success','Data Berhasil disimpan');

    }
    function dokter_edit($id){
        $data=Dokter::where('id',$id)->get();
        return view('admin.dokter_edit',[
            'data' => $data
        ]);
    }
    function dokter_update(Request $request){
        $request->validate([
                'nama' => 'required',
                'nip' => 'required'
            ]);
            $id=$request->id;
             $date=date('Y-m-d');

         DB::table('dokter')->where('id',$id)->update([
            'nama' => $request->nama,
            'nip' =>$request->nip,
            'jenis_kelamin' => $request->kelamin,
            'tanggal_lahir' => $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'alamat' => $request->alamat,
            'telepon' => $request->no_hp,
            'poli' => $request->poli,
        ]);
        return redirect('/dashboard/dokter/data')->with('alert-success','Data Berhasil diubah');

    }
    function dokter_delete($id){
        Dokter::where('id',$id)->delete();
        return redirect('/dashboard/dokter/data')->with('alert-success','Data Berhasil terhapus');

    }





    // data poli

function poli(){
    $data=Poli::orderBy('id','desc')->get();
        return view('admin.poli_data',[
            'data' =>$data
        ]);
}
function  poli_act(Request $request){
       $request->validate([
            'nama' => 'required',
        ]);

         DB::table('poli')->insert([
            'prosedur' => $request->nama,
        ]);
        return redirect('/dashboard/poli/data')->with('alert-success','Data Berhasil');

}
function  poli_edit($id){
    $dpoli=Poli::where('id',$id)->get();
       $data=Poli::orderBy('id','desc')->get();
        return view('admin.poli_edit',[
            'data' =>$data,
            'poli' => $dpoli
        ]);
}
function  poli_update(Request $request){
        $request->validate([
            'nama' => 'required',
        ]);

        $id=$request->id;
         DB::table('poli')->where('id',$id)->update([
            'prosedur' => $request->nama,
        ]);
        return redirect('/dashboard/poli/data')->with('alert-success','Data Berhasil');


}
function  poli_delete($id){
         Poli::where('id',$id)->delete();
        return redirect('/dashboard/poli/data')->with('alert-success','Data Berhasil');
       
}


// rekam medis
function  rekam(){
    $data=Diagnosa::orderBy('id','desc')->get();
        return view('admin.rekam_data',[
            'data' =>$data
        ]);
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
        return view('admin.rekam_edit',[
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
        return redirect('/dashboard/rekam/data')->with('alert-success','Data tersimpan');


    }
function  rekam_delete($id){
    $diagnosa= Diagnosa::where('id',$id)->first();
    Rekam::where('kode_rekam',$diagnosa->kode_rekam)->delete();
    Diagnosa::where('id',$id)->delete();
        return redirect('/dashboard/rekam/data')->with('alert-success','Data terhapus');

}


// data rujukan
function  rujukan(){
   $data=Rekam::orderBy('id','desc')->where('status_rujuk','1')->get();
        return view('admin.rujukan',[
            'data' =>$data
        ]);
}


function cetak_kwitansi($id){
    $dt=Rekam::where('id',$id)->first();
    return view('cetak.kwitansi',[
        'dt'=> $dt
    ]);
}

function cetak_rujukan($id){
    $dt=Rujukan::where('id_rekam',$id)->first();

    return view('cetak.surat_rujuk',[
        'dt'=> $dt
    ]);
}


 function cek_rujuk(Request $request){
    $cek_status=$request->cek_rujuk;

    if($cek_status == 1){
        echo"
         <div class='form-group'>
            <label >Rumah Sakit Rujukan</label>
            <input type='text' class='form-control'  name='rs_rujuk' value='Rumah Sakit Umum Hasanuddin Kuta Cane' readonly>
        </div>
        <div class='form-group'>
            <label >Tanggal surat</label>
            <input type='date' class='form-control'  name='tgl_rujuk'>
        </div>
        ";
    }else{
        
    }

 }

    function cetak_rujukan_data(){
            $year=date('Y');
                $data=Rekam::whereYear('tanggal',$year)->get();
                return view('cetak.cetak_rujukan',[
                    'data'=> $data
                ]);

        }

        function kunjungan(){
        $data=Rekam::orderBy('id','asc')->get();
        return view('admin.kunjungan',[
            'data' =>$data
        ]);
    }
        function cetak_kunjungan(){
            $year=date('Y');
             $data=Rekam::whereYear('tanggal',$year)->get();
            return view('cetak.cetak_kunjungan',[
                'data'=> $data
            ]);
        } 



 function profile(){
    return view('admin.v_profile');
 }

  function struktur(){
    return view('admin.v_struktur');
 }

   function pelayanan(){
    return view('admin.v_pelayanan');
 }
    function visimisi(){
    return view('admin.v_visimisi');
 }

   function galeri(){
    return view('admin.v_galeri');
 }


 function role(){
     $data=Admin::orderBy('id','asc')->get();
     return view('admin.r_role_data',[
         'data' =>$data
     ]);
 }

  function role_edit($id){
     $data_user=Admin::where('id',$id)->first();
     $data=Admin::orderBy('id','asc')->get();

     return view('admin.r_role_data',[
         'data' =>$data,
         'd_user' =>$data_user
     ]);
 }

  function role_update(Request $request){
    $request->validate([
         'username' => 'required',
         'password' => 'required',
         'role' => 'required',
    ]);
    $cek_admin=Admin::where('level',1)->count();
    $cek_kapus=Admin::where('level',2)->count();
    $cek_dokter=Admin::where('level',3)->count();
    $cek_apoteker=Admin::where('level',4)->count();



    if($cek_admin < 3 || $cek_kapus < 1 || $cek_dokter < 1 || $cek_apoteker < 2){
        if($request->role == 1){
            Admin::insert([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'level' => 1,
                'status' => 1,
            ]);
     return redirect('/dashboard/role/data')->with('alert-success','data telah berhasil ditambahkan');

         }elseif($request->role == 2){
        Admin::insert([
             'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => 2,
            'status' => 1
        ]);
     return redirect('/dashboard/role/data')->with('alert-success','data telah berhasil ditambahkan');

    }elseif($request->role == 3){
        Admin::insert([
             'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => 3,
            'status' => 1
        ]);
     return redirect('/dashboard/role/data')->with('alert-success','data telah berhasil ditambahkan');

    }elseif($request->role == 4){
        Admin::insert([
             'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => 4,
            'status' => 1
        ]);
     return redirect('/dashboard/role/data')->with('alert-success','data telah berhasil ditambahkan');

    }
    }else{

     return redirect('/dashboard/role/data')->with('alert-success','maaf data sudah maksimal');

    }
    
 }

 function role_delete($id){
     Admin::where('id',$id)->delete();
     return redirect('/dashboard/role/data')->with('alert-success','Data telah terhapus');

 }



 function pengaturan(){
     $username= Session::get('adm_username');
    $data= Admin::where('username',$username)->first();
    return view('admin.pengaturan',[
        'data'=> $data
    ]);

 }

  function pengaturan_update(Request $request){
     $username= Session::get('adm_username');
   
     if($request->password == ""){
        return redirect('/dashboard')->with('alert-success','Tidak Ada perubahan');
     }else{
         Admin::where('level','1')->update([
             'password' =>bcrypt($request->password)
         ]);
        return redirect('/dashboard/pengaturan/data')->with('alert-success','Password telah berubah');

     }

 }






}
