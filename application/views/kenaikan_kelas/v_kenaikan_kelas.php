<div class="panel panel-default">
	<div class="panel-heading">Kenaikan Kelas</div>
	<div class="panel-body">
		<div class="box-body">
			<div class="box-header">
				<a href="<?php echo base_url();?>kenaikan_kelas/add">
					<button type="button" class="btn btn-info">Input Naik Kelas</button>
				</a>
			</div>
			<br/>
			<table id="dtkenaikan" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Tahun Ajaran</th>
						<th>Dari Kelas</th>
						<th>Ke Kelas</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php ;foreach($listkenaikan as $row) :;?>
					<tr>
						<td><?php echo $row->tahun_ajaran;?></td>
						<td><?php echo $row->dari_kelas;?></td>
						<td><?php echo $row->ke_kelas;?></td>
						<td>
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
		$("#dtkenaikan").DataTable();
	});
</script>