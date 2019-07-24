@extends('layouts.app')
@section('title','Pembayaran Bulan '.$bulan->bulan)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-12 col-sm12">
                <div class="x_panel">
                    <div class="x_title">
                    <h2>Pembayaran Bulan<small><strong>{{ $bulan->bulan }}</strong></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Masukan biaya yang di transfer!</strong> Biaya untuk Angkatan <strong>{{ $siswa->th_angkatan }}</strong> adalah <strong>Rp. {{ number_format($siswa->bayar_spp,2,',','.') }}</strong>
                        </div>
                        <form class="form-horizontal" action="{{ route('Siswa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_bulan" value="{{ $bulan->id }}">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Biaya yang dibayarkan</label>
                                <div class="col-sm-2"> 
                                <input style="border-radius: 5px;" type="number" name="biaya" class="form-control" id="pwd" placeholder="Rp. ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Bukti Pembayaran</label>
                                <div class="col-sm-10">
                                <input style="border:none;" type="file" name="bukti_tf" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection