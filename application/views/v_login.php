<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SDN II Panongan</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/vendors/iconfonts/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/style.css">
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="asset/images/favicon.png" /> -->
</head>

<body>
	<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form method="post" action="<?php base_url();?>login/login_handler">
                <div class="center">
                  <h1 style="text-align: center;">SDN II Panongan</h1>
                </div>
                <div class="form-group">
                  <label class="label">Kode User</label>
                  <div class="input-group">
                    <input type="text" name="txtusername" id="txtusername" class="form-control" placeholder="Kode User" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="txtpassword" id="txtpassword" class="form-control" placeholder="*********" required>
                    <div class="input-group-append">
                     <span class="input-group-text">
                       <i class="mdi mdi-check-circle-outline"></i>
                     </span>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <button class="btn btn-primary submit-btn btn-block">Login</button>
               </div>
               <div class="form-group">
                <?php echo $this->session->flashdata("msg");?>
                <!-- <label style="color:red;" id="txtpesan" name="txtpesan"><?php echo $this->session->userdata("error_message"); ?></label>  -->
              </div>
              <div class="form-group d-flex justify-content-between">
               <div class="form-check form-check-flat mt-0">

               </div>
               <!-- <a href="#" class="text-small forgot-password text-black">Forgot Password</a> -->
             </div>
             <div class="form-group">

             </div>
           </form>
         </div>
         <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
       </div>
     </div>
   </div>
   <!-- content-wrapper ends -->
 </div>
 <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo base_url(); ?>asset/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo base_url(); ?>asset/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?php echo base_url(); ?>asset/js/off-canvas.js"></script>
<!-- <script src="asset/js/hoverable-collapse.js"></script> -->
<script src="<?php echo base_url(); ?>asset/js/misc.js"></script>
<!-- <script src="asset/js/settings.js"></script> -->
<!-- <script src="asset/js/todolist.js"></script> -->
<!-- endinject -->
</body>

</html>