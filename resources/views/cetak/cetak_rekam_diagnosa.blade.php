<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>
{{-- databales --}}
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>



    <style type="text/css">
			.lead {
				font-family: "Verdana";
				font-weight: bold;
			}
			.value {
				font-family: "Verdana";
			}
			.value-big {
				font-family: "Verdana";
				font-weight: bold;
				font-size: large;
			}
			.td {
				valign : "top";
			}

			/* @page { size: with x height */
			/*@page { size: 20cm 10cm; margin: 0px; }*/
			@page {
				size: A4;
				margin : 0px;
			}
	/*		@media print {
			  html, body {
			  	width: 210mm;
			  }
			}*/
			 .kepala{
        text-align:center;
        font-size: 28px;
        margin:40px 120px;

    }
    .kop_surat {
	position: relative;
	height: 4cm;
	display: flex;
	top: 0;
}

.logo_surat {
	height: 0.5cm;
	width: 0.5cm;
    position: absolute;
    left: 150px;
}
.logo_surat img{
    margin-top: 40px;
  width: 90px;
    height: 75px;
}
.logo_kanan{
    position: absolute;
        right: 150px;

}
.logo_kanan img{
     margin-top: 40px;
    width: 90px;
    height: 75px;
}
.judul_surat {
	padding-top: 0.5cm;
	padding-left: 1cm;
	padding-right: 1cm;
	font-size: 20pt;
	font-weight: 700;
	text-align: center;
	width: 14.8cm;
	/* background: red; */
	margin: 0 auto;
	/* line-height: 1.3;s */
}
	</style>
</head>
<body onload="window.print();">
	<div class="wrapper">
		<div class="container">
            
            @foreach ($data as $dt)
            @php
             $rekam= App\Models\RekamMedis::where('kode_rekam',$dt->kode_rekam)->first();   
            @endphp
            <div class="kop_surat">
            <div class="logo_surat">
                <img src="{{url('/')}}/logo/logoAs.png" alt="" srcset="">
            </div>
                <div class="logo_kanan float-right">
                    <img src="{{url('/')}}/logo/puskesmas.png" alt="" srcset="">

                </div>

            <div class="judul_surat">
               <p style="font-size:20px">PEMERINTAH KABUPATEN SIMEULUE</p> 
              <p style="line-height: 0;margin-top:16px">PUSKESMAS SIMEULUE TENGAH</p>
               <p style="margin-top:-10px"> KECAMATAN SIMEULUE TENGAH</p>
              
               <p style="font-size:12px;font-weight:400">Jln.Tengkuh di ujung kp.Aie Kode Pos 23894</p>
            </div>
        </div>
        <div style="width:100%;border:1px solid #000;"></div>
        <div class="float-right">{{$rekam->no_rm}}</div>
   <div style="text-align:center;margin-top:30px">
			<h5 style=" text-decoration-line: underline;">STATUS RAWAT JALAN</h5><br>
   </div>
   @php
        $pasien=App\Models\Pasien::where('no_rm',$rekam->no_rm)->first();
   @endphp
   <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
             <p>
                NAMA
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
              <p style="text-transform:uppercase">
           : {{$pasien->nama}}
                
            </p>
        </div>
   </div>

   <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
            <p>
            TANGGAL/BULAN/TAHUN LAHIR
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
                <p style="text-transform:uppercase">
              : {{date('d-m-Y',strtotime($pasien->tanggal_lahir))}}
            </p>
            
        </div>
   </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
             <p>
                JENIS KELAMIN
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
              <p style="text-transform:uppercase">
            : {{jenis_kelamin($pasien->jenis_kelamin)}}
            </p>
        </div>
   </div>

       <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
             <p>
                PEKERJAAN
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
              <p style="text-transform:uppercase">
            : {{$pasien->pekerjaan}}
                
            </p>
        </div>
   </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
             <p>
                ALAMAT
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
              <p style="text-transform:uppercase">
            : {{$pasien->alamat}}
                
            </p>
        </div>
   </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
             <p>
                NOMOR TELEPHONE / HP
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
              <p style="text-transform:uppercase">
            : {{$pasien->no_hp}}
            </p>
        </div>
   </div>

   <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
             <p>
                NOMOR JAMINAN KESEHATAN
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
              <p style="text-transform:uppercase">
                1. JK/KIS/ASKES
            </p style="text-transform:uppercase">
            <p>2. KTP/KK</p>
        </div>
   </div>

   <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
             <p>
                GOLONGAN DARAH
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
              <p style="text-transform:uppercase">
           : {{$pasien->gol_darah}}
                
            </p>
        </div>
   </div>

   

      <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
             <p>
                RIWAYAT ALERGI
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
               <p style="text-transform:uppercase">
                1. ALERGI OBAT-OBATAN : {{$pasien->alergi_obat}}
                </p>
            <p style="text-transform:uppercase">2. MAKANAN : {{$pasien->alergi_makan}}</p>

            <p style="text-transform:uppercase">3. UDARA : {{$pasien->alergi_udara}}</p>
            <p style="text-transform:uppercase">4. LAIN - LAIN : {{$pasien->alergi_lain}}</p>


        </div>
   </div>



   <table id="absensi" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>TANGGAL/JAM</th>
                <th>ANAMNESA</th>
                <th>DIAGNOSA</th>
                <th>PLANING</th>
                <th>KONSELING</th>
                <th>PARAF</th>

            </tr>
        </thead>
        <tbody>
			   <?php $no=1; ?>
            @php
                $diagnosa=App\Models\Diagnosa::where('kode_rekam',$rekam->kode_rekam)->first();
            @endphp
			
            <tr>
					
                 <td>{{format_tanggal(date('Y-m-d',strtotime($rekam->tanggal)))}}</td>
                <td>
                    <p style="font-weight:700">KU:</p>
                   
                    <br>
                    <p style="font-weight:700; text-decoration-line: underline;">VITAL SIGN:</p>
                     <span>TD: {{$diagnosa->td}}</span> <br>
                     <span>PR: {{$diagnosa->pr}}</span> <br>
                     <span>BB:  {{$diagnosa->bb}}</span> <br>
                     <span>LP:  {{$diagnosa->lp}}</span> <br>
                     <span>HR:  {{$diagnosa->hr}}</span> <br><br>
                     <span>T:  {{$diagnosa->t}}</span> <br>
                     <span>TB:  {{$diagnosa->tb}}</span> <br>


                
                </td>
                <td></td>
                <td>{{$diagnosa->planing}}</td>
                <td>{{$diagnosa->terapi}}</td>
                <td></td>
			
            </tr>  
        </tbody>   
	</table>
@endforeach
		</div>
	</div>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
$('#absensi').dataTable({
	searching: false, paging: false, info: false
});
</script>    
</body>
</html>