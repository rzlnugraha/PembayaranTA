@extends('layouts.app')
@section('title','Data Siswa')
    
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
                        <div class="row">
                            <div class="col-md-2">
                                <form action="" method="POST" id="form_pembayaran"> 
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label" for="angkatan">Tanggal Pembayaran:</label>
                                        <input type="date" name="tgl" id="angkatan" class="form-control">
                                    </div>
                                    <button style="margin-top: 5px;" type="button" id="tampil" class="btn btn-danger">Tampilkan</button>
                                </form>
                            </div>
                        </div>
                        <div id='list_data'>
                            
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

<script>
    $('#tampil').on('click', function(){
        $.ajax({
            type : "POST",
            url : "/get_data",
            dataType : "json",
            data : $('#form_pembayaran').serialize(),

            success : function (data){
                $('#list_data').html(data['view']);
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

@endpush
