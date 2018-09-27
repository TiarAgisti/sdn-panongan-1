<form method="post" action="<?php echo base_url();?>user/ubah">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Data User</div>
        <div class="panel-body">
            <label>Kode User:</label>
            <input type="text" class="form-control" name="kd_usr" value="<?php echo $kode_user;?>" readonly>
            <label>Nama User:</label>
            <input type="text" class="form-control" name="nm_usr" maxlength="50" value="<?php echo $nama_user;?>" pattern="[A-Za-z]{3,}" title="hanya boleh huruf" required>
            <label>Password User:</label>
            <input type="password" class="form-control" name="pass_usr" maxlength="20" value="<?php echo $password_user;?>">
            <p style="color:red;">*jika tidak ingin merubah password,kosongkan saja</p>
            <label>Tipe User:</label>
            <select name="tipe_usr" class="form-control">
                <option value="<?php echo $tipe_user;?>" selected><?php echo $tipe_user;?></option>
                <option value="Guru">Guru</option>
                <option value="Orangtua">Orangtua</option>
                <option value="Admin">Admin</option>
            </select>
            <br/>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>user"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>