<?php echo $this->session->flashdata("msg");?>
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
						<th>Kelas</th>
						<th>Tahun Ajaran</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php ; foreach($listmurid as $row) : ;?>
					<tr>
						<td><?php echo $row->kode_murid;?></td>
						<td><?php echo $row->nisn;?></td>
						<td><?php echo $row->nama_murid;?></td>
						<td><?php echo $row->ket_kelas;?></td>
						<td><?php echo $row->tahun_ajaran;?></td>
						<td>
							<a href="<?php echo base_url();?>murid/edit">
								Ubah
							</a> |
							<a href="#">
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
		$("#dtmuridkelas").DataTable();
	});
</script>