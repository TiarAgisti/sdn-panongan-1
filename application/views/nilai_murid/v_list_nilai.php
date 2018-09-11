<div class="panel panel-default">
	<div class="panel-heading">Nilai Murid</div>
	<div class="panel-body">
		<div class="box-body">
			<table id="dtnilai" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Kode Murid</th>
						<th>Nisn</th>
						<th>Nama Murid</th>
						<th>Kelas</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php ;foreach($listmurid as $row) :;?>
					<tr>
						<td><?php echo $row->kode_murid;?></td>
						<td><?php echo $row->nisn;?></td>
						<td><?php echo $row->nama_murid;?></td>
						<td><?php echo $row->ket_kelas;?></td>
						<td>
							<a href="<?php echo base_url();?>nilai_murid/add/<?php echo $row->kode_murid;?>">
								Masukan Nilai
							</a>
							||
							<a href="<?php echo base_url();?>nilai_murid/list_nilai_murid/<?php echo $row->kode_murid;?>">
								Lihat Nilai
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
		$("#dtnilai").DataTable();
	});
</script>