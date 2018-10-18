<?php echo $this->session->flashdata("msg");?>
<div class="panel panel-default">
	<div class="panel-heading">Data Nilai Murid</div>
	<div class="panel-body">
        <input type="text" class="form-control" name="kd_murid" value="<?php echo $kd_murid;?>" readonly hidden>
        <label>NISN:</label>
        <input type="text" class="form-control" name="nisn_murid" value="<?php echo $nisn_murid;?>" readonly required>
        <label>Nama:</label>
        <input type="text" class="form-control" name="nm_murid" value="<?php echo $nm_murid;?>" readonly required>
        <input type="text" class="form-control" name="kd_kls" value="<?php echo $kd_kelas;?>" readonly hidden>
        <label>Kelas:</label>
        <input type="text" class="form-control" name="kls_murid" value="<?php echo $kelas;?>" readonly required>
        <br/>
        <table id="dtnilai" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tahun Ajaran</th>
                    <th>Kode Mata Pelajaran</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Nilai</th>
                    <?php if ($this->session->userdata('type') == 'Admin'){; ?>
                    <th></th>
                    <?php }; ?>
                </tr>
            </thead>
            <tbody>
                <?php ;foreach($list_nilai as $row) :;?>
                <tr>
                    <td><?php echo $row->tahun_ajaran;?></td>
                    <td><?php echo $row->kode_mapel;?></td>
                    <td><?php echo $row->nama_mapel;?></td>
                    <td><?php echo $row->nilai;?></td>
                    <?php if ($this->session->userdata('type') == 'Admin'){; ?>
                    <td>
                        <a href="<?php echo base_url();?>nilai_murid/edit/<?php echo $kd_murid;?>/<?php echo $row->kode_mapel;?>">
                            Ubah
                        </a>
                    </td>
                    <?php }; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br/>
        <a href="<?php echo base_url();?>nilai_murid"  class="btn btn-danger">
            Kembali
        </a>
	</div>
</div>