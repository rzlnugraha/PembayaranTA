@extends('layouts.app')
@section('title',' Edit '.$data->nama_kepsek)
@push('style')
    
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
                    <form class="form-horizontal form-label-left" action="{{ route('Kepsek.update',$data->id_user) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf @method('PUT')
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Kepala Sekolah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_kepsek" value="{{ $data->nama_kepsek }}" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" value="{{ $data->email }}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NIK <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="nik" required="required" value="{{ $data->nik }}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Tempat Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="width:220px;" type="text" id="website" value="{{ $data->tempat_lahir }}" name="tempat_lahir" required="required" placeholder="Tempat Lahir" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl">Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="width:220px;" type="date" id="tgl" value="{{ $data->tgl_lahir }}" name="tgl_lahir" required="required" placeholder="Tempat Lahir" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Agama</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="agama" style="width:150px;" id="" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                        </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="jenis_kelamin" style="width:150px;" id="" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lama">Lama Jabatan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="lama" name="lama_jabatan" required="required" value="{{ $data->lama_jabatan }}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="alamat" class="form-control col-md-7 col-xs-12">{{ $data->alamat }}</textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lama">Foto Kepala Sekolah <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="foto_kepsek" id="foto" class="form-control">
                            <img src="/images/{{ $data->foto_kepsek }}" width="50px" height="60px" alt="" srcset="">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
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

@push('script')
    <!-- validator -->
    <script src="{{ asset('assets') }}/vendors/validator/validator.js"></script>
@endpush