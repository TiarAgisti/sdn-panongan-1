<div class="panel panel-default">
	<div class="panel-heading">Nilai Murid</div>
	<div class="panel-body">
		<div class="box-body">
			<table id="dtnilai" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nisn</th>
						<th>Nama Murid</th>
						<th>Kelas</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1112</td>
						<td>Tiar</td>
						<td>1A</td>
						<td>
							<a href="<?php echo base_url();?>nilai_murid/add">
								Masukan Nilai
							</a>
							||
							<a href="<?php echo base_url();?>nilai_murid/list_nilai_murid">
								Lihat Nilai
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