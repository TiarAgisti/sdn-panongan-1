<form method="post" action="<?php echo base_url();?>user/simpan">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data User</div>
        <div class="panel-body">
            <label>Kode User:</label>
            <input type="text" class="form-control" name="kd_usr" placeholder="Generate Otomatis" readonly>
            <label>Nama User:</label>
            <input type="text" class="form-control" name="nm_usr" maxlength="50">
            <label>Password User:</label>
            <input type="password" class="form-control" name="pass_usr" maxlength="20">
            <label>Tipe User:</label>
            <select name="tipe_usr" class="form-control">
                <option value="">--PILIH--</option>
                <option value="Guru">Guru</option>
                <option value="Orangtua">Orangtua</option>
                <option value="Admin">Admin</option>
            </select>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>user"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>