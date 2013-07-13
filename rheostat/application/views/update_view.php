<html>
<head>
	<title>Edit user</title>
</head>
<body>
	<h1>Update</h1>
	<form id='updateform' action='<?php echo base_url();?>index.php/edituser/getUser' method='POST'>
		<label>Enter id</label>
		<input type='text' name='searchid' />
		<input type='submit' value='get user'>
	</form>
	<form id='updateform' action='<?php echo base_url();?>index.php/edituser/update' method='POST'>
		<h2>Update your details</h2>
		<label>update your name</label>
		<input type='text' name='editedname'value='<?php
													if(($record))
													{
														//print_r($record)
														foreach($record->result() as $row)
														{
															echo $row->first_name;
															$uid = $row->user_id;
														}
													}
														
													?>'/>
		<input type='hidden' name='editid'value='<?php echo $uid;?>'/>
		<input type='submit' value='update user'>
	</form>
</body>
</html>