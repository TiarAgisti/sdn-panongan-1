<form method="post" action="<?php echo base_url();?>murid/simpan">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data Murid</div>
        <div class="panel-body">
            <label>Kode Murid:</label>
            <input type="text" class="form-control" name="kd_murid" placeholder="Generate Otomatis" readonly required>
            <label>NISN:</label>
            <input type="number" class="form-control" name="nisn_murid" required>
            <label>Nama:</label>
            <input type="text" class="form-control" name="nm_murid" maxlength="150" pattern="[A-Za-z]{3,}" title="hanya boleh huruf"required>
            <label>Tgl Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir_murid">
            <label>Jenis Kelamin</label>
            <select name="jk_murid" class="form-control">
                <option value="">--PILIH--</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label>Alamat:</label>
            <input type="text" class="form-control" name="alamat_murid" maxlength="255" required>
            <label>No Telepon:</label>
            <input type="number" class="form-control" name="tlp_murid" maxlength="15" required>
            <label>Kelas:</label>
            <select name="kls_murid" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                foreach($kelas->result() as $db)
                {                    
                ?>
                    <option value="<?php echo $db->kode_kelas;?>"><?php echo $db->ket_kelas;?></option>
                <?php
                }
                ?>
            </select>
            <label>Tahun Ajaran:</label>
            <input type="number" class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran; ?>" readonly required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>murid"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>
