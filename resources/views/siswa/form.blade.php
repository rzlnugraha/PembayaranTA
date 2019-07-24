<form action="{{ route('Data.store') }}" method="POST" autocomplete="on" enctype="multipart/form-data">
    @csrf @method('POST')
    <div class="modal-body">
            <div class="form-group">
                <label for="angkatan" class="control-label">Angkatan</label>
                <select name="id_angkatan" id="angkatan" class="form-control" required>
                    <option class="form-control" value="#">Pilih</option>
                    @foreach ($angkatan as $data)
                        <option class="form-control" value="{{ $data->id }}">{{ $data->th_angkatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kelas" class="control-label">Kelas</label>
                <select name="id_kelas" id="kelas" class="form-control" required>
                    <option class="form-control" value="#">Pilih</option>
                    @foreach ($kelas as $data)
                        <option class="form-control" value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="nama">Nama Siswa</label>
                <input class="form-control" type="text" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" autofocus required>
            </div>
            <div class="form-group">
                <label for="nis" class="control-label">Nomor Induk Siswa</label>
                <input class="form-control" type="text" name="nis" id="nis" max="10" placeholder="******" required>
            </div>
            <div class="form-group">
                    <label for="tempat" class="control-label">Tempat Lahir</label>
                    <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Bandung" required>
                </div>
            <div class="form-group">
                <label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
                <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" required>
            </div>
            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="contoh@mail.com" required>
            </div>
            <div class="form-group">
                <label for="agama" class="control-label">Agama</label>
                <select name="agama" id="agama" class="form-control" required>
                    <option value="">Pilih</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                </select>
            </div>
            <div class="form-group">
                    <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="#" disabled>Pilih</option>
                        <option value="Laki Laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            <div class="form-group">
                <label for="Alamat" class="control-label">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" cols="5"required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" name="foto_siswa" id="foto">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>