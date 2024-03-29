
<link href="{{ asset('assets') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('assets') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('assets') }}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('assets') }}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('assets') }}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<table id="datatable" class="table table-stripped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jumlah Siswa</th>
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
            <td>{{ $datas->nama_kelas }}</td>
            <td>{{ $datas->Siswa->count() }} Siswa</td>
            <td><a href="{{ url('kelas',$datas->id) }}"><i class="fa fa-pencil"></i></a></td>
        </tr>
       @endforeach
    </tbody>
</table>

<!-- Datatables -->
<script src="{{ asset('assets') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="{{ asset('assets') }}/vendors/jszip/dist/jszip.min.js"></script>
<script src="{{ asset('assets') }}/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/vendors/pdfmake/build/vfs_fonts.js"></script>
