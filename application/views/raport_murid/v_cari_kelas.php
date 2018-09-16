<form method="post" action="#">
    <div class="panel panel-default">
        <div class="panel-heading">Input Raport Murid</div>
        <div class="panel-body">        
            <label>Kelas:</label>
            <select name="kd_kls" class="form-control">
                <option value="">--PILIH--</option>
                <?php
                foreach($resKelas as $db)
                {                    
                ?>
                    <option value="<?php echo $db->kode_kelas;?>"><?php echo $db->ket_kelas;?></option>
                <?php
                }
                ?>
            </select>
            <br/>
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </div>
</form>