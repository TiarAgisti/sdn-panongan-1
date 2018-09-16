<form method="post" action="<?php echo base_url();?>kkm/simpan">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data KKM</div>
        <div class="panel-body">
            <label>Kode KKM:</label>
            <input type="text" class="form-control" name="kode_kkm" placeholder="Generate Otomatis" readonly required>
            <label>Mata Pelajaran:</label>
            <select name="kode_mapel" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                foreach($ListMapel->result() as $db)
                {                    
                ?>
                    <option value="<?php echo $db->kode_mapel;?>"><?php echo $db->nama_mapel;?></option>
                <?php
                }
                ?>
            </select>
            <label>Tingkat Kelas:</label>
            <select name="tingkat_kelas" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                foreach($ListKelas->result() as $row)
                {                    
                ?>
                    <option value="<?php echo $row->tingkat_kelas;?>"><?php echo $row->tingkat_kelas;?></option>
                <?php
                }
                ?>
            </select>
            <label>Nilai KKM:</label>
            <input type="number" class="form-control" name="nilai_kkm" maxlength="15" required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>guru"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>
