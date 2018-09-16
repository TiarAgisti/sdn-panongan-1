<form method="post" action="<?php echo base_url();?>kkm/ubah">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data KKM</div>
        <div class="panel-body">
            <label>Kode KKM:</label>
            <input type="text" class="form-control" name="kode_kkm" value="<?php echo $kode_kkm;?>" readonly required>
            <label>Mata Pelajaran:</label>
            <select name="kode_mapel" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                    foreach($listMapel->result() as $db)
                    {
                        if($kode_mapel == $db->kode_mapel)
                        {
                            $selected = "selected";
                        }
                        else
                        {
                            $selected = "";
                        }
                ?>
                        <option value="<?php echo $db->kode_mapel;?>" <?php echo $selected;?>><?php echo $db->nama_mapel;?></option>
                <?php
                    }
                ?>
            </select>
            <label>Tingkat Kelas:</label>
            <select name="tingkat_kelas" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                    foreach($listKelas->result() as $row)
                    {
                        if($tingkat_kelas == $row->tingkat_kelas)
                        {
                            $selected = "selected";
                        }
                        else
                        {
                            $selected = "";
                        }
                ?>
                    <option value="<?php echo $row->tingkat_kelas;?>" <?php echo $selected;?>><?php echo $row->tingkat_kelas;?></option>
                <?php
                    }
                ?>
            </select>
            <label>Nilai KKM:</label>
            <input type="number" class="form-control" name="nilai_kkm" value="<?php echo $nilai_kkm;?>" maxlength="15" required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>guru"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>
