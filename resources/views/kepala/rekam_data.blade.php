@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rekam Medis Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rekam </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
            <div class="card-header">
              Data Diagnosa
            </div>
              <div class="card-body">

                <table id="table2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor rekam</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Diagnosa</th>

                    <th>Aksi</th>
  
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $diagnosa= App\Models\Diagnosa::orderBy('id','desc')->get()    
                    @endphp
                      <?php $no=1; ?>
                      @foreach ($diagnosa as $ds)

                      @php
                          $rekam=App\Models\RekamMedis::where('kode_rekam',$ds->kode_rekam)->first();
                          $pasien= App\Models\Pasien::where('no_rm',$rekam->no_rm)->first();
                      @endphp
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$rekam->no_rm}}</td>
                                <td>{{$pasien->nama}}
                                  <br><label for="" class="badge badge-default">{{jenis_kelamin($pasien->jenis_kelamin)}}</label>
                                </td>
                                <td>{{format_tanggal(date('Y-m-d',strtotime($rekam->tanggal)))}}</td>
                                <td><a data-toggle="modal" data-target="#modalDiagnosa-{{$ds->id}}" class="btn btn-default">Lihat diagnosa</a></td>

                                <td>
                                  {{-- <a href="{{url('/dashboard/dokter/rekam/edit/'.$ds->id.'')}}" class="btn btn-warning">Ubah</a> --}}
                                  <a href="{{url('/kapus/rekam/pasien/'.$ds->id.'')}}" class="btn btn-primary">Lihat Pasien</a>

                                  <a href="{{url('/kapus/cetak/rekam/'.$ds->id.'')}}" class="btn btn-default">Cetak</a>

                                </td>
  
                            </tr>


                                   <!-- Modal -->
                                  <div class="modal fade" id="modalDiagnosa-{{$ds->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Diagnosis {{$rekam->no_rm}}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <p style="font-size:18px;font-weight:500">Subyektif</p>
                                            <div class="form-group">
                                                <label for="">Keluhan Utama</label>
                                                <input type="text" class="form-control" name="keluhan" value="{{$ds->keluhan}}" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Telahaan</label>
                                                <input type="text" class="form-control" name="telaah" value="{{$ds->telaah}}" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="">RPT</label>
                                                <input type="text" class="form-control" name="rpt" value="{{$ds->rpt}}" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="">RPO</label>
                                                <input type="text" class="form-control" name="rpo" value="{{$ds->rpo}}" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Riwayat Alergi</label>
                                                <input type="text" class="form-control" name="alergi" value="{{$ds->alergi}}" disabled>
                                            </div>
                                            

                                            <br>
                                              <p style="font-size:18px;font-weight:500">Objektif</p>
                                              <span>a. Vital Sign</span>
                                              <div class="row">
                                                <div class="col-lg-3 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="">TD</label>
                                                        <input type="text" class="form-control" name="td" value="{{$ds->td}}" disabled>
                                                    </div>

                                                    
                                                    <div class="form-group">
                                                      <label for="">HR</label>
                                                      <input type="text" class="form-control" name="hr" value="{{$ds->hr}}" disabled>
                                                  </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-12">
                                                    <div class="form-group">
                                                      <label for="">PR</label>
                                                      <input type="text" class="form-control" name="pr" value="{{$ds->pr}}" disabled>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="">T</label>
                                                      <input type="text" class="form-control" name="t" value="{{$ds->t}}" disabled>
                                                  </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6 col-12">
                                                      <div class="form-group">
                                                          <label for="">BB</label>
                                                          <input type="text" class="form-control" name="bb" value="{{$ds->bb}}" disabled>
                                                      </div>
                                                      <div class="form-group">
                                                      <label for="">TB</label>
                                                      <input type="text" class="form-control" name="tb" value="{{$ds->tb}}" disabled>
                                                  </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6 col-12">
                                                      <div class="form-group">
                                                          <label for="">LP</label>
                                                          <input type="text" class="form-control" name="lp" value="{{$ds->lp}}" disabled>
                                                      </div>
                                                </div>

                                                
                                              </div>


                                            <div class="form-group">
                                                <label for="">Assement</label>
                                                <textarea name="assement" class="form-control"  cols="10" rows="2" disabled>{{$ds->assement}}</textarea>
                                            </div>

                                              <div class="form-group">
                                                <label for="">Planning</label>
                                                <textarea name="planning" class="form-control"  cols="10" rows="2" disabled>{{$ds->planing}}</textarea>
                                            </div>

                                              <div class="form-group">
                                                <label for="">Education</label>
                                                <textarea name="education" class="form-control"  cols="10" rows="2" disabled>{{$ds->education}}</textarea>
                                            </div>

                                              <div class="form-group">
                                                      <label for="">Therapy</label>
                                                      <input type="text" class="form-control" name="terapi" value="{{$ds->terapi}}" disabled>
                                                  </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                      @endforeach
                 
                 
                  </tbody>
              
                </table>
              </div>     
         </div>  
      </section>   

</div>  


@endsection