<?php echo $this->session->flashdata("msg");?>
<form method="post" action="<?php echo base_url();?>raport_murid/get_raport">
    <div class="panel panel-default">
        <div class="panel-heading">Raport Murid</div>
        <div class="panel-body">        
            <label>Cari berdasarkan:</label>
            <select name="cmb_pilih" class="form-control" readonly>
                <option value="2">Nisn</option>
            </select>
            <br/>
            <input type="text" class="form-control" name="txt_cari">
            <br/>
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </div>
</form>