<form method="post" action="<?php echo base_url();?>wali_kelas/simpan">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data Wali Kelas</div>
        <div class="panel-body">
            <label>Kode Wali Kelas:</label>
            <input type="text" class="form-control" name="kd_wali" placeholder="Generate Otomatis" readonly required>
            <label>Nama Guru</label>
            <select name="kd_guru" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                foreach($guru->result() as $row)
                {                    
                ?>
                    <option value="<?php echo $row->kode_guru;?>"><?php echo $row->ket_guru;?></option>
                <?php
                }
                ?>
            </select>
            <label>Kelas</label>
            <select name="kd_kelas" class="form-control">
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
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>wali_kelas"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>