<div class="panel panel-default">
	<div class="panel-heading">Data User</div>
	<div class="panel-body">
		<div class="box-header">
			<a href="<?php echo base_url();?>user/add">
				<button type="button" class="btn btn-info">Tambah Data</button>
			</a>
		</div>
		<br />
		<div class="box-body">
			<table id="dtuser" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode User</th>
						<th>Nama</th>
						<th>Tipe User</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>G00001</td>
						<td>Tiar Agisti</td>
						<td>Guru</td>
						<td>
							<a href="<?php echo base_url();?>user/edit">
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
		$("#dtuser").DataTable();
	});
</script>