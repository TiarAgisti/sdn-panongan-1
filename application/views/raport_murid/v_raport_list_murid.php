<?php echo $this->session->flashdata("msg");?>
<div class="panel panel-default">
	<div class="panel-heading">Data Murid</div>
	<div class="panel-body">
		<div class="box-header">
			<a href="<?php echo base_url();?>raport_murid">
				<button type="button" class="btn btn-info">Kembali</button>
			</a>
		</div>
		<div class="box-body">
			<table id="dtmuridkelas" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode Murid</th>
						<th>NISN</th>
						<th>Nama</th>
						<th>Tahun Ajaran</th>
						<th>Kelas</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($resMurid as $row){;?>
					<tr>
						<td><?php echo $row->kode_murid;?></td>
						<td><?php echo $row->nisn;?></td>
						<td><?php echo $row->nama_murid;?></td>
						<td><?php echo $row->tahun_ajaran;?></td>
						<td><?php echo $row->ket_kelas;?></td>
						<td>
							<a href="<?php echo base_url();?>raport_murid/add_raport">
								Buat Raport
							</a>
						</td>
					</tr>
					<?php }; ?>
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