<div class="panel panel-default">
	<div class="panel-heading">Tambah Data Wali Kelas</div>
	<div class="panel-body">
        <label>Kode Wali Kelas:</label>
        <input type="text" class="form-control" name="kd_wali" placeholder="Generate Otomatis" readonly required>
        <label>Nama Guru</label>
        <select name="kd_guru" class="form-control">
            <option value="">--PILIH--</option>
            <option value="G00001">Tiar</option>
            <option value="G00002">Agisti</option>
        </select>
        <label>Kelas</label>
        <select name="kd_kelas" class="form-control">
            <option value="">--PILIH--</option>
            <option value="K00001">1A</option>
            <option value="K00002">2A</option>
        </select>
        <br/>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url();?>wali_kelas"  class="btn btn-danger">
            Batal
        </a>
	</div>
</div>