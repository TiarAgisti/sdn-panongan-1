<div class="panel panel-default">
	<div class="panel-heading">Data Wali Kelas</div>
	<div class="panel-body">
		<div class="box-header">
			<a href="<?php echo base_url();?>wali_kelas/add">
				<button type="button" class="btn btn-info">Tambah Data</button>
			</a>
		</div>
		<br />
		<div class="box-body">
			<table id="dtwali" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode Wali Kelas</th>
						<th>Nama Guru</th>
						<th>Kelas</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>WL0001</td>
						<td>Tiar</td>
						<td>1A</td>
						<td>
							<a href="<?php echo base_url();?>wali_kelas/edit">
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
		$("#dtwali").DataTable();
	});
</script>