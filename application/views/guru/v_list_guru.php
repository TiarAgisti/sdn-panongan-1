<?php echo $this->session->flashdata("msg");?>
<div class="panel panel-default">
	<div class="panel-heading">Data Guru</div>
	<div class="panel-body">
		<div class="box-header">
			<a href="<?php echo base_url();?>guru/add">
				<button type="button" class="btn btn-info">Tambah Data</button>
			</a>
		</div>
		<br />
		<div class="box-body">
			<table id="dtguru" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode Guru</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Tanggal lahir</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php ; foreach($listguru as $row) : ;?>
					<tr>
						<td><?php echo $row->kode_guru;?></td>
						<td><?php echo $row->nip;?></td>
						<td><?php echo $row->nama_guru;?></td>
						<td><?php echo $row->tanggal_lahir;?></td>
						<td><?php echo $row->jenis_kelamin;?></td>
						<td><?php echo $row->alamat;?></td>
						<td><?php echo $row->no_telp;?></td>
						<td>
							<a href="<?php echo base_url();?>guru/edit">
								Ubah
							</a> |
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
		$("#dtguru").DataTable();
	});
</script>