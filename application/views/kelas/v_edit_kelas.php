<form method="post" action="<?php echo base_url();?>kelas/ubah">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Data Kelas</div>
        <div class="panel-body">
            <label>Kode Kelas:</label>
            <input type="text" class="form-control" name="kd_kls" value="<?php echo $kode_kelas;?>" readonly required>
            <label>Tingkat Kelas:</label>
             <select name="tngkt_kls" class="form-control">
                <?php
                    $selected_1 = "";
                    $selected_2 = "";
                    $selected_3 = "";
                    $selected_4 = "";
                    $selected_5 = "";
                    $selected_6 = "";
                    if( $tingkat_kelas == "1")
                    {
                        $selected_1 = "selected";
                    }
                    if( $tingkat_kelas == "2")
                    {
                        $selected_2 = "selected";
                    }
                    if( $tingkat_kelas == "3")
                    {
                        $selected_3 = "selected";
                    }
                    if( $tingkat_kelas == "4")
                    {
                        $selected_4 = "selected";
                    }
                    if( $tingkat_kelas == "5")
                    {
                        $selected_5 = "selected";
                    }
                    if( $tingkat_kelas == "6")
                    {
                        $selected_6 = "selected";
                    }
                    
                ?>
                <option value="">--PILIH--</option>
                <option value="1" <?php echo $selected_1;?> >1</option>
                <option value="2" <?php echo $selected_2;?> >2</option>
                <option value="3" <?php echo $selected_3;?>>3</option>
                <option value="4" <?php echo $selected_4;?>>4</option>
                <option value="5" <?php echo $selected_5;?>>5</option>
                <option value="6" <?php echo $selected_6;?>>6</option>
            </select>
            <!-- <input type="number" class="form-control" name="tngkt_kls" min="1" max="6" value="<?php echo $tingkat_kelas;?>" required> -->
            <label>Keterangan Tingkat:</label>
            <input type="text" class="form-control" name="ket_tngkt_kls" maxlength="2" value="<?php echo $keterangan_tingkat;?>" pattern="[A-Za-z]{1}" title="hanya boleh huruf" required>
            <br/>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url();?>kelas"  class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>