<html>
<head>
	<title></title>
</head>
<body>
	<form action='<?php echo base_url();?>index.php/user_controller/delete' method='POST'>
		<h1>Delete</h1>
		<label>Enter name</label>
		<input type='text' name='uname'/>
		<input type='submit' value='DeleteUser' name='submit'/>
		
	</form>

</body>
</html>