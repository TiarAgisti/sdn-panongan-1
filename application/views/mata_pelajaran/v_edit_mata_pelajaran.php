<div class="panel panel-default">
	<div class="panel-heading">Edit Data Mata Pelajaran</div>
	<div class="panel-body">
        <label>Kode Mata Pelajaran:</label>
        <input type="text" class="form-control" name="kd_mapel" readonly required>
        <label>Mata Pelajaran:</label>
        <input type="text" class="form-control" name="nm_mapel" maxlength="150" required>
        <br/>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url();?>mata_pelajaran"  class="btn btn-danger">
            Batal
        </a>
	</div>
</div>