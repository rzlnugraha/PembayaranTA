<table class="table table-striped" id="datatable">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Angkatan</th>
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
            <td></td>
        </tr>
    @empty
        Tidak ada data
    @endforelse
    </tbody>
    <input type="search" name="search" id="" value="Search">
</table>