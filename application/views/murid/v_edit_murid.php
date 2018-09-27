<form method="post" action="<?php echo base_url();?>murid/ubah">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Data Murid</div>
        <div class="panel-body">
            <label>Kode Murid:</label>
            <input type="text" class="form-control" name="kd_murid" value="<?php echo $kode_murid; ?>" readonly required>
            <label>NISN:</label>
            <input type="number" class="form-control" name="nisn_murid" maxlength="20" value="<?php echo $nisn; ?>" required>
            <label>Nama:</label>
            <input type="text" class="form-control" name="nm_murid" maxlength="150" value="<?php echo $nama_murid; ?>" pattern="[A-Za-z]{3,}" title="hanya boleh huruf" required>
            <label>Tgl Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir_murid" value="<?php echo $tanggal_lahir; ?>">
            <label>Jenis Kelamin</label>
            <select name="jk_murid" class="form-control">
                <?php
                    $selected_murid_lk = "";
                    $selected_murid_pr = "";
                    if ($jenis_kelamin == "Laki-Laki"){
                        $selected_murid_lk = "selected";
                    }
                    if ($jenis_kelamin == "Perempuan"){
                        $selected_murid_pr = "selected";
                    }
                ?>
                <option value="">--PILIH--</option>
                <option value="Laki-Laki" <?php echo $selected_murid_lk;?>>Laki-Laki</option>
                <option value="Perempuan" <?php echo $selected_murid_pr;?>>Perempuan</option>
            </select>
            <label>Alamat:</label>
            <input type="text" class="form-control" name="alamat_murid" maxlength="255" value="<?php echo $alamat;?>" required>
            <label>No Telepon:</label>
            <input type="number" class="form-control" name="tlp_murid" maxlength="15" value="<?php echo $no_telp;?>" required>
            <label>Kelas:</label>
            <select name="kls_murid" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                    foreach($kelas->result() as $db)
                    {
                        if($kd_kelas == $db->kode_kelas)
                        {
                            $selected = "selected";
                        }
                        else
                        {
                            $selected = "";
                        }
                ?>
                        <option value="<?php echo $db->kode_kelas;?>" <?php echo $selected;?>><?php echo $db->ket_kelas;?></option>
                <?php
                    }
                ?>
            </select>
            <label>Tahun Ajaran:</label>
            <input type="number" class="form-control" name="thn_ajaran" value="<?php echo $tahun_ajaran;?>" readonly required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>murid"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>
