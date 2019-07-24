    <div class="form-group">
        <label for="" class="control-label">Angkatan</label>
        <select name="id_angkatan" id="" class="form-control">
            <option value="{{ $siswa->angkatan->id }}" selected>-- {{ $siswa->angkatan->th_angkatan }} --</option>
            @foreach ($angkatan as $item)
                <option value="{{ $item->id }}">{{ $item->th_angkatan }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Kelas</label>
        <select name="id_kelas" id="" class="form-control">
            <option value="{{ $siswa->kelas->id }}" selected>-- {{ $siswa->kelas->nama_kelas }} --</option>
            @foreach ($kelas as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Nama Lengkap</label>
        <input type="text" name="nama_siswa" id="" class="form-control" value="{{ $siswa->nama_siswa }}">
    </div>
    <div class="form-group">
        <label for="" class="control-label">Nomor Induk Siswa</label>
        <input type="text" name="nis" id="" class="form-control" value="{{ $siswa->nis }}">
    </div>
    <div class="form-group">
        <label for="" class="control-label">Email</label>
        <input type="email" name="email" id="" class="form-control" value="{{ $siswa->user->email }}">
    </div>
    <div class="form-group">
        <label for="" class="control-label">Agama</label>
        <select name="agama" id="" class="form-control">
            @php
                $agama = ['Islam','Kristen Katolik','Kristen Protestan','Budha','Hindu']
            @endphp
            @foreach ($agama as $data)
                <option value="{{ $data }}">{{ $data }}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="" class="control-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="" value="{{ $siswa->tempat_lahir }}" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="" class="control-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="" value="{{ $siswa->tgl_lahir }}" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="" class="form-control">
            <option value="Laki Laki">Laki Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Alamat</label>
        <textarea name="alamat" id="" cols="5" rows="5" class="form-control">{{ $siswa->alamat }}</textarea>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Foto</label>
        <input type="file" class="form-control" value="{{ $siswa->foto_siswa }}" name="foto_siswa" id="">
    </div>