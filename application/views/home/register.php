<?php
$query = $this->db->query('SELECT * FROM setting WHERE status=1');
$app = $query->row();
?>

<div id="mini-header" class="container-fluid signup">
	<div class="row">
		<div class="col-xs-6 col-sm-5 logo-holder">
			<a href="index.html">
				<img class="logo" src="<?php echo base_url(); ?>assets/uploads/logo/<?php echo $app->logo; ?>" alt="<?php echo $app->name; ?>">
			</a>
		</div>
		<div class="col-xs-6 col-sm-7 menu-holder">
			<ul class="main-links">
				<li><a class="normal-link" href="#">Sudah punya akun ?</a></li>
				<li><a class="sign-button" href="<?php echo base_url(); ?>site/login">Login <i class="fa fa-arrow-right"></i></a></li>
			</ul>
		</div>
	</div>
</div>
<div id="form-section" class="container-fluid signup">
	<div class="row">
		<div class="col-sm-5 form-holder">
			<div class="signin-signup-form">
				<div class="form-title"><?php echo $pageTitle; ?></div>
				<form action="<?php echo $action ?>" id="signinform" method="post" role="form" class="form-layout" action="/">
					<div class="row">
						<div class="col-md-6 form-text">
							<input type="text" name="fullname" placeholder="Nama Lengkap" required>
						</div>
						<div class="col-md-6 form-text">
							<input type="text" name="username" placeholder="Username" required>
						</div>
					</div>
					<div class="form-text">
						<input type="email" name="email" placeholder="Alamat Email" required>
					</div>
					<div class="form-text">
						<input type="password" name="password" placeholder="Katasandi" required>
					</div>
					<div class="form-text text-holder">
						<span class="text-only">Notifikasi Ke Email ?</span>
						<input type="radio" name="pmethod" class="hno-radiobtn" id="rad1"><label for="rad1">Ya</label>
						<input type="radio" name="pmethod" class="hno-radiobtn" id="rad2"><label for="rad2">Tidak</label>
					</div>
					<div class="form-button">
						<button id="submit" type="submit" class="btn btn-default">Daftar <i class="fa fa-arrow-right"></i></button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-7 info-slider-holder">
			<div class="img-text-slider">
				<div>
					<img src="<?php echo base_url(); ?>assets/frontend/images/img-g1.png" alt="">
					<p>Management Apps.</p>
				</div>
				<div>
					<img src="<?php echo base_url(); ?>assets/frontend/images/img-g2.png" alt="">
					<p>Integrate Apps</p>
				</div>
			</div>
		</div>
	</div>
</div>