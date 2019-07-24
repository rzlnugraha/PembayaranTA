@extends('layouts.app')
@section('title','Data Kepala Sekolah')
@push('style')
    <!-- Datatables -->
    <link href="{{asset('assets')}}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="col-lg-12 col-md-12 col-sm12">
            <div class="x_panel">
                <div class="x_title">
                <h2>Data Siswa<small>Seluruh Siswa</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><!-- Button trigger modal -->
                        <a data-toggle="modal" data-target="#exampleModal" title="Tambah Data"><i class="fa fa-plus"> </i>
                        </a>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kepala Sekolah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                @include('kepsek.form_tambah')
                              </div>
                            </div>
                          </div>
                        </div></li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <div class="col-md-12">
                            <table class="table table-responsive table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>NIK</th>
                                        <th>Jabatan</th>
                                        <th>Lama Jabatan</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($kepsek as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_kepsek }}</td>
                                        <td>{{ $data->tempat_lahir }}, {{ $data->tgl_lahir }}</td>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->role }}</td>
                                        <td>{{ $data->lama_jabatan }}</td>
                                        <td align="center">
                                            <a onclick="confirm('Apakah anda yakin menghapus data?')" href="{{ url('Kepsek/hapus',$data->id_user) }}"><i class="fa fa-trash"></i></a> 
                                            | <a href="{{ route('Kepsek.edit',$data->id_user) }}"><i class="fa fa-pencil"></i></a>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('script')
    <script src="{{ asset('assets')}}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets')}}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('assets')}}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets')}}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{ asset('assets')}}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{ asset('assets')}}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets')}}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{ asset('assets')}}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
@endpush