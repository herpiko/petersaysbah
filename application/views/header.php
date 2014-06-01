
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<<<<<<< HEAD
  <title><?php echo $title ?> - PPDB Online SMA Negeri 1 Dompu</title>
=======
  <title><?php echo $title ?> - PSB Online SMA Negeri 1 Dompu</title>
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="<?php echo $base_url; ?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $base_url; ?>assets/css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $base_url; ?>assets/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $base_url; ?>assets/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $base_url; ?>assets/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo $base_url; ?>assets/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?php echo $base_url; ?>assets/img/favicon.png">
  
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/scripts.js"></script>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
<<<<<<< HEAD
			<h3>Penerimaan Peserta Didik Baru - SMA Negeri 1 Dompu
=======
			<h3>Penerimaan Siswa Baru Daring - SMA Negeri 1 Dompu
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
			</h3>
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">PSBD</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li <?php if ($title=="Selamat Datang") {
							echo "class=\"active\"";
						} ?>>
							<a href="<?php echo $base_url; ?>">Beranda</a>
						</li>
						<li <?php if ($title=="Alur Pendaftaran") {
							echo "class=\"active\"";
						} ?>>
							<a href="<?php echo $base_url; ?>alur">Alur</a>
						</li>					
						<li <?php if ($title=="Jadwal") {
							echo "class=\"active\"";
						} ?>>
							<a href="<?php echo $base_url; ?>jadwal">Jadwal</a>
						</li>
<<<<<<< HEAD
						<li <?php if ($title=="Persyaratan Pendaftaran") {
							echo "class=\"active\"";
						} ?>>
							<a href="<?php echo $base_url; ?>persyaratan">Persyaratan</a>
=======
						<li <?php if ($title=="Daya Tampung") {
							echo "class=\"active\"";
						} ?>>
							<a href="<?php echo $base_url; ?>dayatampung">Daya Tampung</a>
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
						</li>
						<li <?php if ($title=="Formulir Pendaftaran") {
							echo "class=\"active\"";
						} ?>>
						<?php

							
							if (!$is_logged_in) {
								echo "<a href=\"".$base_url."index.php/auth/register\">Pendaftaran</a>";
							}
						 ?>
							
						</li>
<<<<<<< HEAD
						<li <?php if ($title=="Profil") {
=======
						<li <?php if ($title=="Peringkat") {
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
							echo "class=\"active\"";
						} ?>>
						<?php 
							if ($is_logged_in) {
<<<<<<< HEAD
								if ($username!='admin') {
								echo "<a href=\"".$base_url."profil\">Profil</a>";
								}
								
							}
							
						?>
						</li>
						
						<?php 
							if ($is_logged_in AND $username!="admin") {
							echo "<li";
							if ($title=="Peringkat") {
							echo " class=\"active\"";
							}
							echo ">";
									echo "<a href=\"".$base_url."peringkat\">Peringkat</a>";	
							echo "</li>";
							}
							
						?>
						<?php 
							if ($is_logged_in) {
								if ($username=="admin") {

						echo "<li class=\"dropdown";
						if ($title=="Peringkat") {
							echo " active";
							}
						echo "\">";
						
						echo "<a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">";
									 echo "Daftar Peserta"; 
								echo "</a>
									<ul class=\"dropdown-menu\">
										<li>
											<a href=\"".$base_url."peringkat\">Peringkat</a>
										</li>
										<li>
											<a href=\"".$base_url."peringkat/out\">Tidak lolos</a>
										</li>
										<li>
											<a href=\"".$base_url."peringkat/daftardis\">Diskualifikasi</a>
										</li>
									</ul>
								</li>";
							}
						}
						?>
						
						</li>
						</li>
						
=======
								echo "<a href=\"".$base_url."peringkat\">Peringkat</a>";
							}
							
						?>
						
						</li>
						</li>
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
						<li>
						<?php 
							if ($is_logged_in) {
								if ($username!='admin') {
<<<<<<< HEAD
								echo "<a target=\"_blank\" href=\"".$base_url."profil/cetak/".$user_id."\">Cetak Bukti Pendaftaran</a>";
=======
								echo "<a target=\"_blank\" href=\"".$base_url."cetak\">Cetak lembar registrasi</a>";
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
								}
								
							}
							
						?>
						
						</li>
					<!-- 	<li <?php if ($title=="Statistik") {
							echo "class=\"active\"";
						} ?>>
						<?php 
							if ($username=="admin") {
								echo "<a href=\"".$base_url."statistik\">Statistik</a>";
							}
						 ?>
						</li> -->
						<li <?php if ($title=="Pengaturan") {
							echo "class=\"active\"";
						} ?>>
						<?php 
							if ($username=="admin") {
								echo "<a href=\"".$base_url."pengaturan\">Pengaturan</a>";
							}
						 ?>
						</li>
						
						<!-- <li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li> -->
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="<?php echo $base_url; ?>faq">FAQ</a>
						</li>
						<?php if ($is_logged_in==FALSE) {
							if ($title=="Login") {
								echo "<li class=\"active\"> <a href=\"".$base_url."auth/login\">Login</a></li>";
							} else {
								echo "<li> <a href=\"".$base_url."auth/login\">Login</a></li>";
							}
									
								} ?>
								<?php if ($is_logged_in==TRUE) {
								echo "
								<li class=\"dropdown\">
									 <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">";
									 echo "<i class=\"icon-user\"></i> Hi, ".$username." "; 
								echo "<strong class=\"caret\"></strong></a>
									<ul class=\"dropdown-menu\">
										<li>
											<a href=\"".$base_url."auth/change_password\">Ganti kata kunci</a>
										</li>
										<li>
											<a href=\"".$base_url."auth/logout\">Keluar</a>
										</li>
									</ul>
								</li>";
								} ?>
					</ul>
				</div>
				
			</nav>
			