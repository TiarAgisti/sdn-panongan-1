<?php echo $this->session->flashdata("msg");?>
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
						<th>Keterangan</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php ; foreach($listkelas as $row) : ;?>
					<tr>
						<td><?php echo $row->kode_kelas;?></td>
						<td><?php echo $row->tingkat_kelas;?></td>
						<td><?php echo $row->keterangan_tingkat;?></td>
						<td>
							<a href="<?php echo base_url();?>kelas/edit/<?php echo $row->kode_kelas;?>">
								Ubah
							</a> |
							<a href="<?php echo base_url();?>kelas/hapus/<?php echo $row->kode_kelas;?>">
								Hapus
							</a>
						</td>
					</tr>
					<?php endforeach; ?>
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