<div class="panel panel-default">
	<div class="panel-heading">Edit Data User</div>
	<div class="panel-body">
        <label>Tipe User:</label>
        <select name="tipe_usr" class="form-control">
            <option value="">--PILIH--</option>
            <option value="Guru">Guru</option>
            <option value="Murid">Murid</option>
        </select>
        <label>Kode User:</label>
        <select name="kd_usr" class="form-control">
            <option value="">--PILIH--</option>
            <option value="G00001">G00001</option>
            <option value="G00002">G00002</option>
        </select>
        <label>Nama User:</label>
        <input type="text" class="form-control" name="nm_usr" readonly>
        <label>Password User:</label>
        <input type="password" class="form-control" name="pass_usr">
        <br/>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url();?>user"  class="btn btn-danger">
            Batal
        </a>
	</div>
</div>