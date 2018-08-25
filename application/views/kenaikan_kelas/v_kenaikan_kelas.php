<div class="panel panel-default">
	<div class="panel-heading">Kenaikan Kelas</div>
	<div class="panel-body">
		<div class="box-body">
			<div class="box-header">
				<a href="#">
					<button type="button" class="btn btn-info">Input Naik Kelas</button>
				</a>
				<a href="#">
					<button type="button" class="btn btn-danger">Input Tidak Naik Kelas</button>
				</a>
			</div>
			<br/>
			<table id="dtkenaikan" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tahun Ajaran</th>
						<th>Dari Kelas</th>
						<th>Ke Kelas</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>2018</td>
						<td>1A</td>
						<td>2A</td>
						<td>
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
		$("#dtkenaikan").DataTable();
	});
</script>