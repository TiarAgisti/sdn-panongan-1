<?php echo $this->session->flashdata("msg");?>
<form method="" action="">
    <div class="row purchace-popup">
      <div class="col-12">
        <span class="d-flex alifn-items-center">
          <p>Jadwal Mata Pelajaran Murid</p>
        </span>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Cari berdasarkan hari</div>
        <div class="panel-body">
            <table id="dtjadwal" class="table table-bordered table-striped">
                <thead>
                    <tr border="1">
                        <th>Hari</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Senin</td>
                        <td>
                            <a href="<?php echo base_url();?>jadwal_mata_pelajaran/view_jadwal_by_hari/1">
                                Lihat Jadwal
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Selasa</td>
                        <td>
                            <a href="<?php echo base_url();?>jadwal_mata_pelajaran/view_jadwal_by_hari/2">
                                Lihat Jadwal
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Rabu</td>
                        <td>
                            <a href="<?php echo base_url();?>jadwal_mata_pelajaran/view_jadwal_by_hari/3">
                                Lihat Jadwal
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Kamis</td>
                        <td>
                            <a href="<?php echo base_url();?>jadwal_mata_pelajaran/view_jadwal_by_hari/4">
                                Lihat Jadwal
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumat</td>
                        <td>
                            <a href="<?php echo base_url();?>jadwal_mata_pelajaran/view_jadwal_by_hari/5">
                                Lihat Jadwal
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Sabtu</td>
                        <td>
                            <a href="<?php echo base_url();?>jadwal_mata_pelajaran/view_jadwal_by_hari/6">
                                Lihat Jadwal
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>  
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Cari berdasarkan kelas</div>
        <div class="panel-body">
            <table id="dtjadwalkelas" class="table table-bordered table-striped">
                <thead>
                    <th>Kelas</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach($kelas->result() as $db)
                    {                    
                    ?>
                    <tr>
                        <td><?php echo $db->ket_kelas;?></td>
                        <td>
                            <a href="<?php echo base_url();?>jadwal_mata_pelajaran/view_jadwal_by_kelas/<?php echo $db->kode_kelas;?>">
                                Lihat Jadwal
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/dataTables.bootstrap.css">
<script src="<?php echo base_url(); ?>asset/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $("#dtjadwalkelas").DataTable();
    });
</script>