@extends('layouts.app')
@section('title','Data Seluruh Siswa')
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
                                            <th>Kelas - Angkatan</th>
                                            <th>Nama Siswa</th>
                                            <th>NIS</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach ($data as $datas)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $datas->Kelas->nama_kelas }} - {{ $datas->Angkatan->th_angkatan }}</td>
                                                <td>{{ $datas->nama_siswa }}</td>
                                                <td>{{ $datas->nis }}</td>
                                                <td align="center">
                                                    <a href="{{ route('Data.show',$datas->id) }}"><i class="fa fa-pencil"></i></a>
                                                    | <a href="{{ url('data/hapus',$datas->id) }}"><i class="fa fa-trash"></i></a>
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