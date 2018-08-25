<div class="panel panel-default">
	<div class="panel-heading">Edit Data Jadwal Mata Pelajaran</div>
	<div class="panel-body">
        <label>Kode Jadwal Mata Pelajaran:</label>
        <input type="text" class="form-control" name="kd_jdwl" readonly required>
        <label>Hari</label>
        <select name="kd_hari" class="form-control">
            <option value="">--PILIH--</option>
            <option value="1">Senin</option>
            <option value="2">Selasa</option>
            <option value="3">Rabu</option>
            <option value="4">Kamis</option>
            <option value="5">Jumat</option>
            <option value="6">Sabtu</option>
            <option value="7">Minggu</option>
        </select>
        <label>Kelas</label>
        <select name="kd_kelas" class="form-control">
            <option value="">--PILIH--</option>
            <option value="K00001">1A</option>
            <option value="K00002">2A</option>
        </select>
        <label>Mata Pelajaran</label>
        <select name="kd_mapel" class="form-control">
            <option value="">--PILIH--</option>
            <option value="M00001">Matematika</option>
            <option value="M00002">Bahasa Indonesia</option>
        </select>
        <br/>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url();?>jadwal_mata_pelajaran"  class="btn btn-danger">
            Batal
        </a>
	</div>
</div>