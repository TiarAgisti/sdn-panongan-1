<form method="post" action="<?php echo base_url();?>nilai_murid/simpan">  
    <div class="panel panel-default">
        <div class="panel-heading">Input Nilai Murid</div>
        <div class="panel-body">
            <input type="text" class="form-control" name="kd_murid" value="<?php echo $kd_murid;?>" readonly hidden>
            <label>NISN:</label>
            <input type="text" class="form-control" name="nisn_murid" value="<?php echo $nisn_murid;?>" readonly required>
            <label>Nama:</label>
            <input type="text" class="form-control" name="nm_murid" value="<?php echo $nm_murid;?>" readonly required>
            <input type="text" class="form-control" name="kd_kls" value="<?php echo $kd_kelas;?>" readonly hidden>
            <label>Kelas:</label>
            <input type="text" class="form-control" name="kls_murid" value="<?php echo $kelas;?>" readonly required>
            <label>Tahun Ajaran:</label>
            <input type="number" class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran;?>" readonly required>
            <label>Mata Pelajaran:</label>
            <select name="mapel_murid" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                foreach($mapel->result() as $row)
                {                    
                ?>
                    <option value="<?php echo $row->kode_mapel;?>"><?php echo $row->nama_mapel;?></option>
                <?php
                }
                ?>
            </select>
            <label>Nilai:</label>
            <input type="number" class="form-control" name="nilai_murid" min="0" max="100" required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>nilai_murid"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>