<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
		<a class="navbar-brand brand-logo" href="#">
			<label style="color:blue;font: arial;">SDN Panongan 1</label>
			<!-- <IMG src="../asset/images/logo.svg" alt="logo" /> -->
		</a>
		<a class="navbar-brand brand-logo-mini" href="#">
			<label style="color:blue;font: arial;">SDN Panongan 1</label>
			<!-- <img src="../asset/images/logo-mini.svg" alt="logo" /> -->
		</a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center">
		<ul class="navbar-nav navbar-nav-right">
			<li class="nav-item dropdown d-none d-xl-inline-block">
				<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
					<span class="profile-text">Hello, <?php echo $this->session->userdata('nama');?></span>
					<img class="img-xs rounded-circle" src="<?php echo base_url(); ?>asset/images/faces/no-avatar.png" alt="Profile image">
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
					<div></div>
					<a class="dropdown-item">Change Password</a>
					<a class="dropdown-item" href="<?php echo base_url();?>login/logout">Sign Out</a>
				</div>
			</li>
		</ul>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
			<span class="icon-menu"></span>
		</button>
	</div>
</nav>