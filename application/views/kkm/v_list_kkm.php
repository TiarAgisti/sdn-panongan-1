<?php echo $this->session->flashdata("msg");?>
<div class="panel panel-default">
	<div class="panel-heading">Data KKM</div>
	<div class="panel-body">
		<div class="box-header">
			<a href="<?php echo base_url();?>user/add">
				<button type="button" class="btn btn-info">Tambah Data</button>
			</a>
		</div>
		<br />
		<div class="box-body">
			<table id="dtKKM" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode KKM</th>
						<th>Nama Mata Pelajaran</th>
						<th>Tingkat Kelas</th>
						<th>Nilai</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php ;foreach($listkkm as $row) :; ?>
					<tr>
						<td><?php echo $row->kode_kkm;?></td>
						<td><?php echo $row->nama_mapel;?></td>
						<td><?php echo $row->tingkat_kelas;?></td>
						<td><?php echo $row->nilai_kkm;?></td>
						<td>
							<a href="<?php echo base_url();?>kkm/edit/<?php echo $row->kode_kkm;?>">
								Ubah
							</a> |
							<a href="<?php echo base_url();?>kkm/hapus/<?php echo $row->kode_kkm;?>">
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
		$("#dtKKM").DataTable();
	});
</script>