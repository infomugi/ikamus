<?php
$query = $this->db->query('SELECT * FROM setting WHERE status=1');
$app = $query->row();
?>

<div id="mini-header" class="container-fluid signin">
	<div class="row">
		<div class="col-xs-6 col-sm-5 logo-holder">
			<a href="index.html">
				<img class="logo" src="<?php echo base_url(); ?>assets/uploads/logo/<?php echo $app->logo; ?>" alt="<?php echo $app->name; ?>">
			</a>
		</div>
		<div class="col-xs-6 col-sm-7 menu-holder">
			<ul class="main-links">
				<li><a class="normal-link" href="#">Belum punya akun ?</a></li>
				<li><a class="sign-button" href="<?php echo base_url(); ?>site/register">Registrasi <i class="fa fa-arrow-right"></i></a></li>
			</ul>
		</div>
	</div>
</div>
<div id="form-section" class="container-fluid signin">
	<div class="row">
		<div class="col-sm-5 form-holder">
			<div class="signin-signup-form">
				<div class="form-title"><?php echo $pageTitle; ?></div>
				<form action="<?php echo $action ?>" id="signinform" method="post" role="form" class="form-layout" action="/">
					<div class="form-text">
						<input type="text" name="username" placeholder="Username" required>
					</div>
					<div class="form-text">
						<input type="password" name="password" placeholder="Password" required>
					</div>
					<div class="text text-danger text-center">
						<?php echo $error; ?>
						<BR>
							<BR>
							</div>
							<div class="form-button">
								<button id="submit" type="submit" class="btn btn-default">Masuk <i class="fa fa-arrow-right"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-7 info-slider-holder">
					<div class="img-text-slider">
						<div>
							<img src="<?php echo base_url(); ?>assets/frontend/images/img-b1.png" alt="">
							<p>Multimedia Apps</p>
						</div>
						<div>
							<img src="<?php echo base_url(); ?>assets/frontend/images/img-b2.png" alt="">
							<p>Web Apps</p>
						</div>
						<div>
							<img src="<?php echo base_url(); ?>assets/frontend/images/img-b3.png" alt="">
							<p>Mobile Apps</p>
						</div>
					</div>
				</div>
			</div>
		</div>

