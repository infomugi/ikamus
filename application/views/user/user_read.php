
<div class="m-t-n m-b">
	<div class="card m-b-0 bg-primary-dark p-a-md no-border m-b m-x-n-g">
		<div class="card-img-overlay p-a-0 " style="background: url(http://lorempixel.com/1920/600?8) no-repeat; background-size: cover;"></div>
		<div class="card-block" style="height: 300px">
		</div>
	</div>
	<div class="row profile-header text-white">
		<div class="col col-xs-3">
			<img class="profile-avatar" src="<?php echo base_url(); ?>assets/uploads/avatar/middle/<?php echo $image; ?>" alt="" />
		</div>
		<div class="col p-b-lg col-xs-9">
			<div class="profile-stats text-center">
				<div class="row">
					<div class="col-xs-4">
						<h4 class="m-t-0 m-b-0">23K</h4>
						<small>Followers</small>
					</div>
					<div class="col-xs-4">
						<h4 class="m-t-0 m-b-0">989</h4>
						<small>Photos</small>
					</div>
					<div class="col-xs-4">
						<h4 class="m-t-0 m-b-0">23</h4>
						<small>Videos</small>
					</div>
				</div>
			</div>
			<div class="profile-user">
				<h4 class="m-t-0 m-b-0"><?php echo $fullname; ?> (@<?php echo $username; ?>)</h4>
				<small class=""><?php echo $level; ?> - <?php echo $active; ?></small>
			</div>
		</div>
	</div>
</div>
<div class="">
	<div class="row">
		<div class="col-sm-3">
			<div class="profile-sidebar">
				<div class="card bg-white no-border text-center">
					<div class="card-block">
						<span class="h5"></span>
						<p><?php echo $email; ?></p>
						<div class="w150 center-block mt10">
							<button class="btn btn-danger btn-block">
								<span>Send a message</span>
							</button>
						</div>
					</div>
				</div>

				<div class="card bg-white no-border">
					<div class="card-block">
						<small class="bold text-uppercase">Tanggal Lahir</small>
						<p><?php echo $birth; ?></p>
					</div>
				</div>								

				<div class="card bg-white no-border">
					<div class="card-block">
						<small class="bold text-uppercase">Jenis Kelamin</small>
						<p><?php echo $gender; ?></p>
					</div>
				</div>

				<div class="card bg-white no-border">
					<div class="card-block">
						<small class="bold text-uppercase">Login Terakhir</small>
						<p><?php echo $visit_time; ?></p>
					</div>
				</div>	

				<div class="card bg-white no-border">
					<div class="card-block">
						<small class="bold text-uppercase">Tanggal Bergabung</small>
						<p><?php echo $create_time; ?></p>
					</div>
				</div>								


			</div>
		</div>
		<div class="col-sm-9">
			<div class="card bg-primary no-border composer">
				<div class="card-block">
					<textarea placeholder="What's on your mind" rows="3" class="form-control shadow no-border"></textarea>
					<div class="composer-options">
						<button class="btn" type="button">
							<i class="icon-pointer"></i>
						</button>
						<button class="btn" type="button">
							<i class="icon-picture"></i>
						</button>
						<button class="btn" type="button">
							<i class="icon-film"></i>
						</button>
						<button class="btn" type="button">
							<i class="icon-clock"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="card bg-white no-border">
				<div class="card-block">
					<div class="profile-timeline-header">
						<a href="#" class="profile-timeline-user">
							<img src="<?php echo base_url(); ?>assets/uploads/avatar/middle/<?php echo $image; ?>" alt="Avatar <?php echo $fullname; ?>" class="img-rounded">
						</a>
						<div class="profile-timeline-user-details">
							<a href="#" class="bold"><?php echo $fullname; ?></a>
							<br>
							<em class="text-success small">Submitted a new post</em>
						</div>
					</div>
					<div class="profile-timeline-content">
						<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
						<div class="profile-timeline-controls">
							<a class="pull-right" href="javascript:;">
								<i class="icon-share"></i>
							</a>
							<a class="m-r" href="javascript:;">
								<i class="icon-heart"></i>&nbsp;Like
							</a>
							<a href="javascript:;">
								<i class="icon-bubble"></i>&nbsp;Comment
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
