<form method="post" action="<?php echo base_url();?>guru/ubah">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Data Guru</div>
        <div class="panel-body">
            <label>Kode Guru:</label>
            <input type="text" class="form-control" name="kd_guru" value="<?php echo $kode_guru;?>" readonly required>
            <label>NIP:</label>
            <input type="number" class="form-control" name="nip_guru" maxlength="25" value="<?php echo $nip;?>" required>
            <label>Nama:</label>
            <input type="text" class="form-control" name="nm_guru" maxlength="150" value="<?php echo $nama_guru;?>" pattern="[A-Za-z]{3,}" title="hanya boleh huruf" required>
            <label>Tgl Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $tanggal_lahir;?>">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <?php
                    $selected_lk = "";
                    $selected_pr = "";
                    if( $jenis_kelamin == "Laki-Laki")
                    {
                        $selected_lk = "selected";
                    }
                    if( $jenis_kelamin == "Perempuan")
                    {
                        $selected_pr = "selected";
                    }
                ?>
                <option value="">--PILIH--</option>
                <option value="Laki-Laki" <?php echo $selected_lk;?>>Laki-Laki</option>
                <option value="Perempuan" <?php echo $selected_pr;?>>Perempuan</option>
            </select>
            <label>Alamat:</label>
            <input type="text" class="form-control" name="alamat_guru" maxlength="255" value="<?php echo $alamat;?>" required>
            <label>No Telepon:</label>
            <input type="number" class="form-control" name="tlp_guru" value="<?php echo $no_telp;?>" required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>guru"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>
