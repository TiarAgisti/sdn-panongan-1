<?php echo $this->session->flashdata("msg");?>
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
					<?php ;foreach($listuser as $row) :; ?>
					<tr>
						<td><?php echo $row->kode_user;?></td>
						<td><?php echo $row->nama_user;?></td>
						<td><?php echo $row->tipe_user;?></td>
						<td>
							<a href="<?php echo base_url();?>user/edit/<?php echo $row->kode_user;?>">
								Ubah
							</a> |
							<a href="<?php echo base_url();?>user/hapus/<?php echo $row->kode_user;?>">
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
		$("#dtuser").DataTable();
	});
</script>