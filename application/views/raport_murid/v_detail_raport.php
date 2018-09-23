<form method="post" action="#">
    <div class="panel panel-default">
        <div class="panel-heading">Raport Murid</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <label>Wali Kelas:</label>
                    <input type="text" class="form-control" name="nm_guru" maxlength="25" value="<?php echo $nama_guru;?>" readonly>
                </div>
                <div class="col-md-6">
                    <label>Nama Murid:</label>
                    <input type="text" class="form-control" name="nm_murid" maxlength="25" value="<?php echo $nama_murid;?>" readonly>
                </div>      
            </div>  
            <div class="row">
                <div class="col-md-6">
                    <label>Kelas:</label>
                    <input type="text" class="form-control" name="ket_kelas" maxlength="25" value="<?php echo $ket_kelas;?>" readonly>
                </div>
                <div class="col-md-6">
                    <label>Tahun Ajaran:</label>
                    <input type="text" class="form-control" name="thn_ajaran" maxlength="25" value="<?php echo $thn_ajaran;?>" readonly>
                </div>
            </div>      
            
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
            <label>Sakit:</label>
            <input type="number" class="form-control" name="txt_sakit" value="<?php echo $sakit;?>" readonly>

            <label>Ijin:</label>
            <input type="number" class="form-control" name="txt_ijin" value="<?php echo $ijin;?>" readonly>

            <label>Alpa:</label>
            <input type="number" class="form-control" name="txt_alpa" value="<?php echo $alpa;?>" readonly>

            <label>Keterangan</label>
            <input type="text" class="form-control" name="txt_ket" value="<?php echo $keterangan;?>" readonly>
            <br>
            <button type="submit" class="btn btn-primary">Cetak</button>
            <a href="#"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>