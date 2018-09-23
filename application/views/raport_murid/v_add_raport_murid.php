<form method="post" action="<?php echo base_url();?>raport_murid/simpan_raport">
    <div class="panel panel-default">
        <div class="panel-heading">Raport Murid</div>
        <div class="panel-body">        
            <label>Wali Kelas:</label>
            <input type="text" class="form-control" name="kd_guru" maxlength="25" value="<?php echo $kode_guru;?>" hidden>
            <input type="text" class="form-control" name="nm_guru" maxlength="25" value="<?php echo $nama_guru;?>" readonly>

            <label>Nama Murid:</label>
            <input type="text" class="form-control" name="kd_murid" maxlength="25" value="<?php echo $kode_murid;?>" hidden>
            <input type="text" class="form-control" name="nm_murid" maxlength="25" value="<?php echo $nama_murid;?>" readonly>

            <label>Kelas:</label>
            <input type="text" class="form-control" name="kd_kelas" maxlength="25" value="<?php echo $kode_kelas;?>" hidden>
            <input type="text" class="form-control" name="ket_kelas" maxlength="25" value="<?php echo $ket_kelas;?>" readonly>

            <label>Tahun Ajaran:</label>
            <input type="text" class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran;?>" maxlength="25" readonly>

            <label>Sakit:</label>
            <input type="number" class="form-control" name="txt_sakit">

            <label>Ijin:</label>
            <input type="number" class="form-control" name="txt_ijin">

            <label>Alpa:</label>
            <input type="number" class="form-control" name="txt_alpa">

            <label>Keterangan</label>
            <select name="cmb_keterangan" class="form-control">
                <option value="">--PILIH--</option>
                <option value="Naik Kelas">Naik Kelas</option>
                <option value="Tidak Naik Kelas">Tidak Naik Kelas</option>
            </select>
            <br/>
            <table id="dtlistNilai" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Nilai KKM</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list_nilai as $row){;?>
                    <tr>
                        <td><?php echo $row->kode_mapel;?></td>
                        <td><?php echo $row->nama_mapel;?></td>
                        <td><?php echo $row->nilai_kkm;?></td>
                        <td><?php echo $row->nilai;?></td>
                        <td><?php echo $row->keterangan;?></td>
                    </tr>
                    <?php }; ?>
                </tbody>
            </table>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>raport_murid"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>