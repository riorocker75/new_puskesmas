@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
     <div style="text-align:center;margin:30px 0">
<!-- 
    <img src="{{url('/logo/pancabudi.png')}}" style="width:120px;height:120px" alt="" srcset="">&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{url('/logo/logo.png')}}" style="width:120px;height:120px" alt="" srcset=""> -->
  </div>
    <section class="content">
        @php
            $jlh_pasien= App\Models\Pasien::where('status',1)->count();; 
            $jlh_rekam= App\Models\Rekam::where('status',1)->count();;   
            $jlh_rujuk= App\Models\Rujukan::all()->count();;   
            $jlh_dokter= App\Models\Dokter::all()->count();;   

        @endphp
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  Register Pasien
              
                </div>
      
                <div class="card-body">
                    <form action="{{url('/daftar/pasien/simple/act')}}" method="post">
                      @csrf  
                      @method('POST')
                    <div class="form-group">
                          <label>Nomor Rekam</label>
                          <input type="text" class="form-control" name="no_rekam" required>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama" required>
                  </div>
      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select class="custom-select form-control-border border-width-2"  name="kelamin" required="required">
                            <option value="">--Pilih Kelamin--</option>
                            <option value="1">Pria</option>
                            <option value="2">Wanita</option>
                    </select>
                </div>
      
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" required>
              </div>
      
              <div class="form-group">
                <label>Golongan Darah</label>
                <input type="text" class="form-control" name="gol_darah" required>
            </div>
      
              <button type="submit" class="btn btn-primary">Simpan</button>
      
                    </form>
                </div>
      
              </div>
          </div>
          <div class="col-lg-8 col-md-6 col-12">
            <div class="card">
              <div class="card-header">
               Data Pasien
            
              </div>
              <div class="card-body">
  
                @php
                    $pasien = App\Models\Pasien::orderBy('id','desc')->get()
                 
                @endphp
  
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor rekam</th>
                    <th>Nama</th>
                    <th>Aksi</th>
  
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($pasien as $dt)
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dt->no_rm}}</td>
                                <td>{{$dt->nama}}
                                  <br><label for="" class="badge badge-default">{{jenis_kelamin($dt->jenis_kelamin)}}</label>
                                </td>
                                <td>
                                  <a href="{{url('/dashboard/pasien/edit/'.$dt->id.'')}}" class="btn btn-warning">Ubah</a>
                                  <a href="{{url('/dashboard/pasien/delete/'.$dt->id.'')}}" class="btn btn-danger">Hapus</a>

                                </td>
  
                            </tr>
                      @endforeach
                 
                 
                  </tbody>
              
                </table>
                
              
                {{-- {{$cek->prosedur}} --}}
              </div>
           </div>
          </div>

        </div>

        
        
         


      </div>  
      </section>   

</div>  


@endsection