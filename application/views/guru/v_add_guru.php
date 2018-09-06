<form method="post" action="<?php echo base_url();?>guru/simpan">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data Guru</div>
        <div class="panel-body">
            <label>Kode Guru:</label>
            <input type="text" class="form-control" name="kd_guru" placeholder="Generate Otomatis" readonly required>
            <label>NIP:</label>
            <input type="text" class="form-control" name="nip_guru" maxlength="25" required>
            <label>Nama:</label>
            <input type="text" class="form-control" name="nm_guru" maxlength="150" required>
            <label>Tgl Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">--PILIH--</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label>Alamat:</label>
            <input type="text" class="form-control" name="alamat_guru" maxlength="255" required>
            <label>No Telepon:</label>
            <input type="number" class="form-control" name="tlp_guru" maxlength="15" required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>guru"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>
