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
          <form action="{{ url('/dashboard/dokter/rekam/act') }}" method="post">
        <div class="row">
                @csrf  
                @method('POST')
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        Rekam Medis
                    </div>
                    <div class="card-body">
                        @foreach($data as $dt)
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Rekam</label>
                            <input type="text" class="form-control" name="no_rm" value="{{$dt->no_rm}}" required>
                        </div>
                       <div class="form-group">
                          <label for="exampleInputEmail1">Dokter Pemeriksa</label>
                          <input type="text" class="form-control" name="dokter" required>
                      </div>
                  

                      <div class="form-group">
                          <label for="exampleInputEmail1">Tanggal Diagnosa</label>
                          <input type="date" class="form-control" name="tanggal" value="{{date('Y-m-d')}}"required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tindakan</label>
                        <input type="text" class="form-control" name="tindakan" required>
                    </div>
                      @endforeach
                    </div>
               </div> 
            </div>

            <div class="col-lg-8 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                       Diagnosa
                    </div>
                    <div class="card-body">
                        <p style="font-size:18px;font-weight:500">Subyektif</p>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dokter Pemeriksa</label>
                            <input type="text" class="form-control" name="dokter" required>
                        </div>
                        
                     
                    </div>
               </div> 
            </div>
        </div>
    </form>
</div>
       
      </section>   

</div>  


@endsection