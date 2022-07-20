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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-body">

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
                    @php
                        $pasien= App\Models\Pasien::orderBy('id','desc')->get()    
                    @endphp
                      <?php $no=1; ?>
                      @foreach ($pasien as $dt)
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dt->no_rm}}</td>
                                <td>{{$dt->nama}}
                                  <br><label for="" class="badge badge-default">{{jenis_kelamin($dt->jenis_kelamin)}}</label>
                                </td>
                                <td>
                                  <a href="{{url('/dashboard/dokter/rekam/add/'.$dt->id.'')}}" class="btn btn-warning">Tambah Rekam Medis</a>
                                </td>
  
                            </tr>
                      @endforeach
                 
                 
                  </tbody>
              
                </table>
              </div>
         </div>  
      </section>   

</div>  


@endsection