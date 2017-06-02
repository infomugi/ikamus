
<h2 style="margin-top:0px" style="text-transform:capitalize"><?php echo $name; ?></h2>
<a href="<?php echo site_url('term/create') ?>" class="btn btn-primary">Add Istilah</a>
<a href="<?php echo site_url('term/index') ?>" class="btn btn-primary"> Manage Istilah</a>
<HR>
	<table class="table">
		<tr><td>Name</td><td><?php echo $name; ?></td></tr>
		<tr><td>Description</td><td><?php echo $description; ?></td></tr>
		<tr><td>Status</td><td><?php echo $status; ?></td></tr>
	</table>
	