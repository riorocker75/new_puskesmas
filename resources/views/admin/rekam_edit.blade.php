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
        @foreach($data as $dt)

          <form action="" method="post">
        <div class="row">
                @csrf  
                @method('POST')
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    @php
                        $rekam_medis= App\Models\RekamMedis::where('kode_rekam',$dt->kode_rekam)->first();
                    @endphp

                    <div class="card-header">
                        Rekam Medis
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Rekam</label>
                            <input type="text" class="form-control" name="no_rm" value="{{$rekam_medis->no_rm}}" required>
                            <input type="hidden" class="form-control" name="id_rekam" value="{{$rekam_medis->id}}" required>

                        </div>
                       <div class="form-group">
                          <label for="exampleInputEmail1">Dokter Pemeriksa</label>
                          <input type="text" class="form-control" name="dokter" value="{{$rekam_medis->dokter}}" required>
                      </div>
                  

                      <div class="form-group">
                          <label for="exampleInputEmail1">Tanggal Diagnosa</label>
                          <input type="date" class="form-control" name="tanggal" value="{{date('Y-m-d',strtotime($rekam_medis->tanggal))}}" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tindakan</label>
                        <input type="text" class="form-control" name="tindakan" value="{{$rekam_medis->tindakan}}" required>
                    </div>
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
                            <input type="text" class="form-control" name="keluhan" value="{{$dt->keluhan}}" >
                            <input type="hidden" class="form-control" name="id_diagnosa" value="{{$dt->id}}" >

                        </div>

                         <div class="form-group">
                            <label for="">Telahaan</label>
                            <input type="text" class="form-control" name="telaah" value="{{$dt->telaah}}">
                        </div>

                         <div class="form-group">
                            <label for="">RPT</label>
                            <input type="text" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="form-control" name="rpt" value="{{$dt->rpt}}" >
                        </div>

                         <div class="form-group">
                            <label for="">RPO</label>
                            <input type="text" class="form-control" name="rpo" value="{{$dt->rpo}}">
                        </div>

                         <div class="form-group">
                            <label for="">Riwayat Alergi</label>
                            <input type="text" class="form-control" name="alergi" value="{{$dt->alergi}}">
                        </div>
                        

                        <br>
                           <p style="font-size:18px;font-weight:500">Objektif</p>
                           <span>a. Vital Sign</span>
                           <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">TD</label>
                                    <input type="text" class="form-control" name="td" value="{{$dt->td}}">
                                </div>

                                
                                <div class="form-group">
                                  <label for="">HR</label>
                                  <input type="text" class="form-control" name="hr" value="{{$dt->hr}}">
                              </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="form-group">
                                  <label for="">PR</label>
                                  <input type="text" class="form-control" name="pr" value="{{$dt->pr}}">
                              </div>
                              <div class="form-group">
                                  <label for="">T</label>
                                  <input type="text" class="form-control" name="t" value="{{$dt->t}}">
                              </div>
                            </div>

                             <div class="col-lg-3 col-md-6 col-12">
                                  <div class="form-group">
                                      <label for="">BB</label>
                                      <input type="text" class="form-control" name="bb" value="{{$dt->bb}}">
                                  </div>
                                  <div class="form-group">
                                  <label for="">TB</label>
                                  <input type="text" class="form-control" name="tb" value="{{$dt->tb}}">
                              </div>
                            </div>

                             <div class="col-lg-3 col-md-6 col-12">
                                  <div class="form-group">
                                      <label for="">LP</label>
                                      <input type="text" class="form-control" name="lp" value="{{$dt->lp}}">
                                  </div>
                            </div>

                            
                           </div>


                         <div class="form-group">
                            <label for="">Assement</label>
                            <textarea name="assement" class="form-control"  cols="10" rows="2">{{$dt->assement}}</textarea>
                        </div>

                          <div class="form-group">
                            <label for="">Planning</label>
                            <textarea name="planning" class="form-control"  cols="10" rows="2">{{$dt->planing}}</textarea>
                        </div>

                          <div class="form-group">
                            <label for="">Education</label>
                            <textarea name="education" class="form-control"  cols="10" rows="2">{{$dt->education}}</textarea>
                        </div>

                          <div class="form-group">
                                  <label for="">Therapy</label>
                                  {!!$dt->terapi!!}
                              </div>
                       

                     
                    </div>
               </div> 
            </div>
        </div>
    </form>
      @endforeach

</div>
       
      </section>   

</div>  


@endsection