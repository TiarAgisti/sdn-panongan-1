<form method="post" action="#">
    <div class="panel panel-default">
        <div class="panel-heading">Raport Murid</div>
        <div class="panel-body">        
            <label>Wali Kelas:</label>
            <input type="text" class="form-control" name="kd_guru" maxlength="25" hidden>
            <input type="text" class="form-control" name="nm_guru" maxlength="25" readonly>

            <label>Nama Murid:</label>
            <input type="text" class="form-control" name="kd_murid" maxlength="25" hidden>
            <input type="text" class="form-control" name="nm_murid" maxlength="25" readonly>

            <label>Kelas:</label>
            <input type="text" class="form-control" name="kd_kelas" maxlength="25" hidden>
            <input type="text" class="form-control" name="ket_kelas" maxlength="25" readonly>

            <label>Tahun Ajaran:</label>
            <input type="text" class="form-control" name="thn_ajaran" maxlength="25" readonly>

            <label>Sakit:</label>
            <input type="number" class="form-control" name="txt_sakit">

            <label>Ijin:</label>
            <input type="number" class="form-control" name="txt_ijin">

            <label>Alpa:</label>
            <input type="number" class="form-control" name="txt_alpa">

            <label>Keterangan</label>
            <select name="cmb_keterangan" class="form-control">
                <option value="">--PILIH--</option>
                <option value="Naik Kelas">Naik Kelas</option>
                <option value="Tidak Naik Kelas">Tidak Naik Kelas</option>
            </select>
            <br/>
            <table id="dtmuridkelas" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Nilai KKM</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>M00001</td>
                        <td>Bahasa Indonesia</td>
                        <td>60</td>
                        <td>70</td>
                        <td>Terpenuhi</td>
                    </tr>
                </tbody>
            </table>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="#"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>