<form method="post" action="<?php echo base_url();?>kelas/simpan">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Data Kelas</div>
        <div class="panel-body">
            <label>Kode Kelas:</label>
            <input type="text" class="form-control" name="kd_kls" placeholder="Generate Otomatis" readonly required>
            <label>Tingkat Kelas:</label>
            <select name="tngkt_kls" class="form-control">
                <option value="">--PILIH--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <!-- <input type="number" class="form-control" name="tngkt_kls" min="1" max="6" required> -->
            <label>Keterangan Tingkat:</label>
            <input type="text" class="form-control" name="ket_tngkt_kls" pattern="[A-Za-z]{1}" title="hanya boleh huruf" required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>kelas"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>