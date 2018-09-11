<div class="panel panel-default">
	<div class="panel-heading">Edit Nilai Murid</div>
	<div class="panel-body">
        <input type="text" class="form-control" name="kd_murid" value="<?php echo $kdMurid;?>" readonly hidden>
        <label>NISN:</label>
        <input type="text" class="form-control" name="nisn_murid" value="<?php echo $nisnMurid;?>" readonly required>
        <label>Nama:</label>
        <input type="text" class="form-control" name="nm_murid" value="<?php echo $nmMurid;?>" readonly required>
        <input type="text" class="form-control" name="kd_kls" value="<?php echo $kdKelas;?>" readonly hidden>
        <label>Kelas:</label>
        <input type="text" class="form-control" name="kls_murid" value="<?php echo $ketKelas;?>" readonly required>
        <label>Tahun Ajaran:</label>
        <input type="number" class="form-control" name="thn_ajaran" value="<?php echo $thnAjaran;?>" readonly required>
        <input type="text" class="form-control" name="kd_mapel" value="<?php echo $kdMapel;?>" readonly hidden>
        <label>Mata Pelajaran:</label>
        <input type="text" class="form-control" name="mapel_murid" value="<?php echo $nmMapel;?>" readonly required>
        <label>Nilai:</label>
        <input type="number" class="form-control" name="nilai_murid" value="<?php echo $nilai;?>" min="0" max="100" required>
        <br/>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url();?>nilai_murid/list_nilai_murid/S00001"  class="btn btn-danger">
            Batal
        </a>
	</div>
</div>