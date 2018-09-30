<?php echo $this->session->flashdata("msg");?>
<form method="post" action="<?php echo base_url();?>jadwal_mata_pelajaran/simpan">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data Jadwal Mata Pelajaran</div>
        <div class="panel-body">
            <label>Kode Jadwal Mata Pelajaran:</label>
            <input type="text" class="form-control" name="kd_jdwl" placeholder="Generate Otomatis" readonly required>
            <label>Hari</label>
            <select name="kd_hari" class="form-control">
                <option value="">--PILIH--</option>
                <option value="1">Senin</option>
                <option value="2">Selasa</option>
                <option value="3">Rabu</option>
                <option value="4">Kamis</option>
                <option value="5">Jumat</option>
                <option value="6">Sabtu</option>
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
            <label>Mata Pelajaran</label>
            <select name="kd_mapel" class="form-control">
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
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>jadwal_mata_pelajaran"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>