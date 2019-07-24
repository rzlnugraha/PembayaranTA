@extends('layouts.app')
@section('title','Pembayaran')
    
@push('style')
    
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-12 col-sm12">
                <div class="x_panel">
                    <div class="x_title">
                    <h2>Pembayaran SPP<small>Angkatan {{ $siswa->th_angkatan }}</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- start user projects -->
                        <div class="row">
                            <div class="col-md-4">
                                <h2>SPP yang sudah dibayar</h2>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bulan</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($spp as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->bulan->bulan }}</td>
                                                @if ($item->status_spp == 'lunas')
                                                    <td><strong>Lunas</strong></td>
                                                @endif
                                                @if ($item->status_spp == 'proses')
                                                    <td><strong>Proses</strong></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <h2>SPP yang belum dibayar </h2>
                                <table class="table table-hover table-info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bulan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $nomor=1;
                                    @endphp
                                    @foreach ($bulan2 as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{ $data->bulan }}</td>
                                            <td><a href="{{ route('pembayaran',$data->id) }}" class="btn btn-success btn-xs">Bayar</a></td>
                                        </tr>
                                    </tbody>

                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <!-- end user projects -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-12 col-sm12">
                <div class="x_panel">
                    <div class="x_title">
                    <h2>Pembayaran Event<small>{{ Auth::user()->name }}</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    
@endpush