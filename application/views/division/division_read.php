
<h2 style="margin-top:0px">Detail Division</h2>
<a href="<?php echo site_url('division/create') ?>" class="btn btn-primary">Add Division</a>
<a href="<?php echo site_url('division/index') ?>" class="btn btn-primary"> Manage Division</a>
<HR>
	<table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	</table>
		