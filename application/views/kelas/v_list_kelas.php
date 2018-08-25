<div class="panel panel-default">
	<div class="panel-heading">Data Kelas</div>
	<div class="panel-body">
		<div class="box-header">
			<a href="<?php echo base_url();?>kelas/add">
				<button type="button" class="btn btn-info">Tambah Data</button>
			</a>
		</div>
		<br />
		<div class="box-body">
			<table id="dtkelas" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode Kelas</th>
						<th>Kelas</th>
						<th>Level</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>KLS0001</td>
						<td>1</td>
						<td>A</td>
						<td>
							<a href="<?php echo base_url();?>kelas/edit">
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
		$("#dtkelas").DataTable();
	});
</script>