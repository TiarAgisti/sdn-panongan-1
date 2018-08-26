<div class="panel panel-default">
	<div class="panel-heading">Tambah Data Kenaikan Kelas</div>
	<div class="panel-body">
        <label>Tahun Ajaran:</label>
        <input type="text" class="form-control" name="thn_ajaran" readonly required>
        <label>Dari Kelas:</label>
        <select name="dr_kls" class="form-control">
            <option value="">--PILIH--</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <label>Ke Kelas:</label>
        <select name="dr_kls" class="form-control">
            <option value="">--PILIH--</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <br/>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url();?>kenaikan_kelas"  class="btn btn-danger">
            Batal
        </a>
	</div>
</div>