<div class="panel panel-default">
	<div class="panel-heading">Input Nilai Murid</div>
	<div class="panel-body">
        <input type="text" class="form-control" name="kd_murid" readonly hidden>
        <label>NISN:</label>
        <input type="text" class="form-control" name="nisn_murid" readonly required>
        <label>Nama:</label>
        <input type="text" class="form-control" name="nm_murid" readonly required>
        <input type="text" class="form-control" name="kd_kls" readonly hidden>
        <label>Kelas:</label>
        <input type="text" class="form-control" name="kls_murid" readonly required>
        <label>Tahun Ajaran:</label>
        <input type="number" class="form-control" name="thn_ajaran" readonly required>
        <label>Mata Pelajaran:</label>
        <select name="mapel_murid" class="form-control">
            <option value="">--PILIH--</option>
            <option value="M00001">Matematika</option>
            <option value="M00002">Bahasa Indonesia</option>
        </select>
        <label>Nilai:</label>
        <input type="number" class="form-control" name="nilai_murid" min="0" max="100" required>
        <br/>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url();?>nilai_murid"  class="btn btn-danger">
            Batal
        </a>
	</div>
</div>