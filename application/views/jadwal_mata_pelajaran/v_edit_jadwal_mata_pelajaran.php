<form method="post" action="<?php echo base_url();?>jadwal_mata_pelajaran/ubah">  
    <div class="panel panel-default">
        <div class="panel-heading">Edit Data Jadwal Mata Pelajaran</div>
        <div class="panel-body">
            <label>Kode Jadwal Mata Pelajaran:</label>
            <input type="text" class="form-control" name="kd_jdwl" value="<?php echo $kd_jdwl;?>" readonly required>
            <label>Hari</label>
            <select name="kd_hari" class="form-control">
                <?php
                    $ketSenin = "";
                    $ketSelasa = "";
                    $ketRabu = "";
                    $ketKamis = "";
                    $ketJumat = "";
                    $ketSabtu = "";
                    if ($hari_jdwl == 1){
                        $ketSenin = "selected";
                    }
                    if ($hari_jdwl == 2){
                        $ketSelasa = "selected";
                    }
                    if ($hari_jdwl == 3){
                        $ketRabu = "selected";
                    }
                    if ($hari_jdwl == 4){
                        $ketKamis = "selected";
                    }
                    if ($hari_jdwl == 5){
                        $ketJumat = "selected";
                    }
                    if ($hari_jdwl == 6){
                        $ketSabtu = "selected";
                    }
                ?>
                <option value="">--PILIH--</option>
                <option value="1" <?php echo $ketSenin;?>>Senin</option>
                <option value="2" <?php echo $ketSelasa;?>>Selasa</option>
                <option value="3" <?php echo $ketRabu;?>>Rabu</option>
                <option value="4" <?php echo $ketKamis;?>>Kamis</option>
                <option value="5" <?php echo $ketJumat;?>>Jumat</option>
                <option value="6" <?php echo $ketSabtu;?>>Sabtu</option>
            </select>
            <label>Kelas</label>
            <select name="kd_kelas" class="form-control">
                    <option value="">--PILIH--</option>
                    <?php
                        foreach($kelas->result() as $db)
                        {
                            if($kd_kls == $db->kode_kelas)
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
            <label>Mata Pelajaran</label>
            <select name="kd_mapel" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                    foreach($mapel->result() as $row)
                    {
                        if($kd_mapel == $row->kode_mapel)
                        {
                            $selected = "selected";
                        }
                        else
                        {
                            $selected = "";
                        }
                ?>
                        <option value="<?php echo $row->kode_mapel;?>" <?php echo $selected;?>><?php echo $row->nama_mapel;?></option>
                <?php
                    }
                ?>
            </select>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>jadwal_mata_pelajaran"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>