<form action="{{ route('Kepsek.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nama" class="control-label">Nama Kepala Sekolah</label>
        <input type="text" name="nama_kepsek" id="nama" class="form-control" placeholder="Nama Kepala Sekolah" required autofocus>
    </div>
    <div class="form-group">
        <label for="nik" class="control-label">Nomor Induk Kepegawaian</label>
        <input type="number" name="nik" id="nik" class="form-control" placeholder="Nomor NIK" required>
    </div>
    <div class="form-group">
        <label for="email" class="control-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email Kepala Sekolah" required>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tempat" class="control-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat" class="form-control" placeholder="Tempat Lahir" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tgl" class="control-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl" class="form-control" required>
            </div>
        </div>        
    </div>
    <div class="form-group">
        <label for="agama" class="control-label">Agama</label>
        <select name="agama" id="agama" class="form-control" required>
            <option value="">---------------------</option>
            <option value="Islam">Islam</option>
            <option value="Kristen Protestan">Kristen Protestan</option>
            <option value="Kristen Katolik">Kristen Katolik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
        </select>
    </div>
    <div class="form-group">
        <label for="jenis" class="control-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis" class="form-control" required>
            <option value="">---------------------</option>
            <option value="Laki Laki">Laki Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="lama" class="control-label">Lama Jabatan</label>
        <input type="number" name="lama_jabatan" id="lama" class="form-control" placeholder="Lama Jabatan" required>
    </div>
    <div class="form-group">
        <label for="alamat" class="control-label">Alamat</label>
        <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" placeholder="Alamat Lengkap Kepala Sekolah" required></textarea>
    </div>
    <div class="form-group">
        <label for="role" class="control-label">Jabatan</label>
        <select name="role" id="" class="form-control">
            <option value="">-------- Pilih ----------</option>
            <option value="kepsek">Kepala Sekolah</option>
            <option value="bk">Bimbingan Konseling</option>
            <option value="bendahara">Bendahara</option>
            <option value="osis">OSIS</option>
            <option value="kesiswaan">Kesiswaan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="foto" class="control-label">Foto Kepala Sekolah</label>
        <input type="file" name="foto_kepsek" id="foto" class="form-control">
    </div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
