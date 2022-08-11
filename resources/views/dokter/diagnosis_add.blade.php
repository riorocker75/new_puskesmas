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
                            <label for="">Keluhan Utama</label>
                            <input type="text" class="form-control" name="keluhan" >
                        </div>

                         <div class="form-group">
                            <label for="">Telahaan</label>
                            <input type="text" class="form-control" name="telaah" >
                        </div>

                         <div class="form-group">
                            <label for="">RPT</label>
                            <input type="text" class="form-control" name="rpt" >
                        </div>

                         <div class="form-group">
                            <label for="">RPO</label>
                            <input type="text" class="form-control" name="rpo" >
                        </div>

                         <div class="form-group">
                            <label for="">Riwayat Alergi</label>
                            <input type="text" class="form-control" name="alergi" >
                        </div>
                        

                        <br>
                           <p style="font-size:18px;font-weight:500">Objektif</p>
                           <span>a. Vital Sign</span>
                           <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">TD</label>
                                    <input type="text" class="form-control" name="td" >
                                </div>

                                
                                <div class="form-group">
                                  <label for="">HR</label>
                                  <input type="text" class="form-control" name="hr" >
                              </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="form-group">
                                  <label for="">PR</label>
                                  <input type="text" class="form-control" name="pr" >
                              </div>
                              <div class="form-group">
                                  <label for="">T</label>
                                  <input type="text" class="form-control" name="t" >
                              </div>
                            </div>

                             <div class="col-lg-3 col-md-6 col-12">
                                  <div class="form-group">
                                      <label for="">BB</label>
                                      <input type="text" class="form-control" name="bb" >
                                  </div>
                                  <div class="form-group">
                                  <label for="">TB</label>
                                  <input type="text" class="form-control" name="tb" >
                              </div>
                            </div>

                             <div class="col-lg-3 col-md-6 col-12">
                                  <div class="form-group">
                                      <label for="">LP</label>
                                      <input type="text" class="form-control" name="lp" >
                                  </div>
                            </div>

                            
                           </div>


                         <div class="form-group">
                            <label for="">Assement</label>
                            <textarea name="assement" class="form-control"  cols="10" rows="2"></textarea>
                        </div>

                          <div class="form-group">
                            <label for="">Planning</label>
                            <textarea name="planning" class="form-control"  cols="10" rows="2"></textarea>
                        </div>

                          <div class="form-group">
                            <label for="">Education</label>
                            <textarea name="education" class="form-control"  cols="10" rows="2"></textarea>
                        </div>

                          <div class="form-group">
                                  <label for="">Therapy</label>
                                  <textarea name="terapi" id="summernote" cols="30" rows="10"></textarea>
                                  {{-- <input type="text" class="form-control" name="terapi" > --}}
                              </div>
                       
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>

                     
                    </div>
               </div> 
            </div>
        </div>
    </form>
</div>
       
      </section>   

</div>  


@endsection