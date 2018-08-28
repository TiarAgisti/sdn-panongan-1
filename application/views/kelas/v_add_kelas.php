<form method="post" action="<?php echo base_url();?>kelas/simpan">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data Kelas</div>
        <div class="panel-body">
            <label>Kode Kelas:</label>
            <input type="text" class="form-control" name="kd_kls" placeholder="Generate Otomatis" readonly required>
            <label>Tingkat Kelas:</label>
            <input type="number" class="form-control" name="tngkt_kls" min="1" max="6" required>
            <label>Keterangan Tingkat:</label>
            <input type="text" class="form-control" name="ket_tngkt_kls" maxlength="2" required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>kelas"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>