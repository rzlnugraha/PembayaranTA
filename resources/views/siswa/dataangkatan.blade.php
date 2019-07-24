@extends('layouts.app')
@section('title','Data Siswa')
    
@push('style')
<!-- Datatables -->
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
                        <div class="row">
                            <div class="col-md-2">
                                <form action="" method="POST" id="form_angkatan"> @csrf
                                    <div class="form-group">
                                        <label class="control-label" for="angkatan">Angkatan:</label>
                                        <select name="id_angkatan" id="angkatan" class="form-control">
                                            <option value="#">Pilih</option>
                                            @foreach ($angkatan as $data)
                                                <option value="{{ $data->id }}">{{ $data->th_angkatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button style="margin-top: 5px;" type="button" id="tampilkan" class="btn btn-danger">Tampilkan</button>
                                </form>
                            </div>
                        </div>
                        <div id='list_siswa'>
                            {{-- @include('siswa.datasiswa') --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')



<script>
        $('#tampilkan').on('click', function(){
            $.ajax({
                type : "POST",
                url : "/getdata",
                dataType : "json",
                data : $('#form_angkatan').serialize(),
    
                success : function (data){
                    $('#list_siswa').html(data['view']);
                    console.log(data);
                },
                error : function (xhr, status){
                    console.log(xhr.error + "Error :" + status);
                },
                complete: function(){
                    alreadyloading = false;
                }
            });
        })
    </script>

<script>
$('#dataangkatan').DataTable();
</script>

@endpush
