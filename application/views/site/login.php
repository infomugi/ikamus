<div class="app signin usersession">
	<div class="session-wrapper">
		<div class="page-height-o row-equal align-middle">
			<div class="column">
				<div class="card bg-white no-border">
					<div class="card-block">
						<form action="<?php echo $action ?>" method="post" role="form" class="form-layout" action="/">
							<div class="text-center m-b">
								<img src="<?php echo base_url(); ?>assets/images/logo.png" class="img-responsive"/>
							</div>
							<div class="form-inputs">
								<label class="text-uppercase">Username</label>
								<input type="text" class="form-control input-lg" placeholder="Username" name="username" required>
								<label class="text-uppercase">Password</label>
								<input type="password" class="form-control input-lg" placeholder="Password" name="password" required>
								
								<div class="text text-danger text-center">
									<?php echo $error; ?>
									<BR>
										<BR>
										</div>

									</div>
									<button class="btn btn-primary btn-block btn-lg m-b" type="submit">Login</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>