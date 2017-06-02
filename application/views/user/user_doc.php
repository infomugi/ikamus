<!doctype html>
<html>
<head>
    <title>Export to Word</title>
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
    <h2>User List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
		<th>Create Time</th>
		<th>Update Time</th>
		<th>Visit Time</th>
		<th>Fullname</th>
		<th>Gender</th>
		<th>Birth</th>
		<th>Email</th>
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th>Division</th>
		<th>Image</th>
		<th>Ipaddress</th>
		<th>Active</th>
		<th>Status</th>
		
        </tr><?php
        foreach ($user_data as $user)
        {
            ?>
            <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $user->create_time ?></td>
		      <td><?php echo $user->update_time ?></td>
		      <td><?php echo $user->visit_time ?></td>
		      <td><?php echo $user->fullname ?></td>
		      <td><?php echo $user->gender ?></td>
		      <td><?php echo $user->birth ?></td>
		      <td><?php echo $user->email ?></td>
		      <td><?php echo $user->username ?></td>
		      <td><?php echo $user->password ?></td>
		      <td><?php echo $user->level ?></td>
		      <td><?php echo $user->division ?></td>
		      <td><?php echo $user->image ?></td>
		      <td><?php echo $user->ipaddress ?></td>
		      <td><?php echo $user->active ?></td>
		      <td><?php echo $user->status ?></td>	
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>