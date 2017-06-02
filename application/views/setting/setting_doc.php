<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Setting List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Description</th>
		<th>Keywords</th>
		<th>Favicon</th>
		<th>Logo</th>
		<th>Address</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Facebook</th>
		<th>Instagram</th>
		<th>Twitter</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($setting_data as $setting)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $setting->name ?></td>
		      <td><?php echo $setting->description ?></td>
		      <td><?php echo $setting->keywords ?></td>
		      <td><?php echo $setting->favicon ?></td>
		      <td><?php echo $setting->logo ?></td>
		      <td><?php echo $setting->address ?></td>
		      <td><?php echo $setting->phone ?></td>
		      <td><?php echo $setting->email ?></td>
		      <td><?php echo $setting->facebook ?></td>
		      <td><?php echo $setting->instagram ?></td>
		      <td><?php echo $setting->twitter ?></td>
		      <td><?php echo $setting->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>