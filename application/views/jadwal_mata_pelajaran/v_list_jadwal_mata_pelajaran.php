<?php echo $this->session->flashdata("msg");?>
<div class="panel panel-default">
	<div class="panel-heading">Data Jadwal Mata Pelajaran</div>
	<div class="panel-body">
		<div class="box-header">
			<a href="<?php echo base_url();?>jadwal_mata_pelajaran/add">
				<button type="button" class="btn btn-info">Tambah Data</button>
			</a>
		</div>
		<br />
		<div class="box-body">
			<table id="dtjadwal" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode Jadwal</th>
						<th>Hari</th>
						<th>Kelas</th>
						<th>Mata Pelajaran</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php ;foreach($listjadwal as $row) :;?>
					<tr>
						<td><?php echo $row->kode_jadwal;?></td>
						<td><?php echo $row->ket_hari;?></td>
						<td><?php echo $row->tingkat_kelas;?></td>
						<td><?php echo $row->nama_mapel;?></td>
						<td>
							<a href="<?php echo base_url();?>jadwal_mata_pelajaran/edit/<?php echo $row->kode_jadwal;?>">
								Ubah
							</a> |
							<a href="#">
								Hapus
							</a>
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>	
	</div>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/dataTables.bootstrap.css">
<script src="<?php echo base_url(); ?>asset/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/dataTables.bootstrap.min.js"></script>
<script>
	$(function () {
		$("#dtjadwal").DataTable();
	});
</script>