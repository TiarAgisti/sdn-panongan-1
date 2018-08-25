<div class="panel panel-default">
	<div class="panel-heading">Data Mata Pelajaran</div>
	<div class="panel-body">
		<div class="box-header">
			<a href="<?php echo base_url();?>mata_pelajaran/add">
				<button type="button" class="btn btn-info">Tambah Data</button>
			</a>
		</div>
		<br />
		<div class="box-body">
			<table id="dtmapel" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode Mata Pelajaran</th>
						<th>Nama</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>MP0001</td>
						<td>Matematika</td>
						<td>
							<a href="<?php echo base_url();?>mata_pelajaran/edit">
								Ubah
							</a> |
							<a href="#">
								Hapus
							</a>
						</td>
					</tr>
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
		$("#dtmapel").DataTable();
	});
</script>