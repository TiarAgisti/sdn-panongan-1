<!DOCTYPE html>
<html lang="en">
<?php
  $this->load->view($header);
?>
<!-- <?php include 'header.php' ?> -->

<body>
  <div class="container-scroller">
    <?php
      $this->load->view($navbar);
    ?>
    <!-- <?php include 'head_nav_bar.php' ?> -->
    <div class="container-fluid page-body-wrapper">
  		<!-- <?php 
        include 'sidebar.php' 
      ?> -->
      <?php
        $this->load->view($sidebar);
      ?>
  		<div class="main-panel">
        <div class="content-wrapper">
          <?php
            $this->load->view($body);
          ?> 
        </div>
        <?php
          $this->load->view($footer);
        ?> 
        <!-- <?php
  		    include 'footer.php' 
        ?> -->
        </div>
      </div>
  </div>
</body>

</html>