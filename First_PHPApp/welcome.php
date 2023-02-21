<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
	<style>
		*{
			text-align: center;
			align-items: center;
		}
	</style>
</head>
<body>
	<?php
		$con = mysqli_connect('localhost', 'root', '', 'lab9');
		if(!$con)
			die('Connection Failed: '.mysqli_connect_error());
		$retval = mysqli_query($con, "SELECT name FROM employee WHERE emp_id = ");
		if(mysqli_num_rows($retval)>0){
			while($row = mysqli_fetch_assoc($retval)){
				echo "Employee ID: {$row['c_id']}<br>".
				"Employee Name: {$row['c_name']}<br>".
				"Employee Age: {$row['age']}<br>";
			}
		}
	?>
	<h2>Welcome <?php echo $name; ?></h2>
	<!-- employee details -->
	<a href="login.php">Logout</a>
</body>
</html>