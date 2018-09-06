<?php echo $this->session->flashdata("msg");?>
<div class="panel panel-default">
	<div class="panel-heading">Data Nilai Murid</div>
	<div class="panel-body">
        <input type="text" class="form-control" name="kd_murid" readonly hidden>
        <label>NISN:</label>
        <input type="text" class="form-control" name="nisn_murid" readonly required>
        <label>Nama:</label>
        <input type="text" class="form-control" name="nm_murid" readonly required>
        <input type="text" class="form-control" name="kd_kls" readonly hidden>
        <label>Kelas:</label>
        <input type="text" class="form-control" name="kls_murid" readonly required>
        <label>Tahun Ajaran:</label>
        <input type="number" class="form-control" name="thn_ajaran" readonly required>
        <br/>
        <table id="dtnilai" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode Mata Pelajaran</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>M00001</td>
                    <td>Matematika</td>
                    <td>92</td>
                    <td>
                        <a href="<?php echo base_url();?>nilai_murid/edit">
                            Ubah
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <br/>
        <a href="<?php echo base_url();?>nilai_murid"  class="btn btn-danger">
            Kembali
        </a>
	</div>
</div>