<!-- Datatables -->
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

<table class="table table-bordered" id="datatable">
    <thead>
        <tr>
            <th style="width:20px;">No</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Angkatan</th>
            <th>#</th>
        </tr>
    </thead>
    @php
        $no=1;
    @endphp
    <tbody>
    @forelse ($data as $datas)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $datas->nama_siswa }}</td>
            <td>{{ $datas->nis }}</td>
            <td>{{ $datas->nama_kelas }}</td>
            <td>{{ $datas->th_angkatan }}</td>
            <td><a href="{{ route('Data.show',$datas->id_user) }}"><i class="fa fa-arrow-right"></i></a></td>
        </tr>
    @empty
        Tidak ada data
    @endforelse
    </tbody>
</table>

{{-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>