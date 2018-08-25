<div class="panel panel-default">
	<div class="panel-heading">Data Murid</div>
	<div class="panel-body">
		<div class="box-header">
			<a href="<?php echo base_url();?>murid/add">
				<button type="button" class="btn btn-info">Tambah Data</button>
			</a>
		</div>
		<br />
		<div class="box-body">
			<table id="dtmuridkelas" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode Murid</th>
						<th>NISN</th>
						<th>Nama</th>
						<th>Tanggal lahir</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th>Kelas</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>M00001</td>
						<td>123456</td>
						<td>Tiar Agisti</td>
						<td>1990-08-31</td>
						<td>Laki - Laki</td>
						<td>Binong</td>
						<td>085817579282</td>
						<td>1A</td>
						<td>
							<a href="<?php echo base_url();?>murid/edit">
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
		$("#dtmuridkelas").DataTable();
	});
</script>