<div class="panel panel-default">
	<div class="panel-heading">Nilai Murid</div>
	<div class="panel-body">
		<div class="box-body">
			<table id="dtnilai" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nisn</th>
						<th>Nama Murid</th>
						<th>Kelas</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>1112</td>
						<td>Tiar</td>
						<td>1A</td>
						<td>
							<a href="#">
								Masukan Nilai
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
		$("#dtnilai").DataTable();
	});
</script>