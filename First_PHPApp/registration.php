<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		input, textarea{
			padding: 5px; margin-top: 5px;
		}
	</style>
	<title>Registration</title>
</head>
<body>
	<?php
		$con = mysqli_connect('localhost', 'root', '', 'lab9');
		if(!$con)
			die('Connection Failed: '.mysqli_connect_error());
		// echo 'Connection Successful<br>';
		/*
		$q = "INSERT INTO employee 
		VALUES ('$_POST[emp_id]',
						'$_POST[name]',
						'$_POST[password]',
						'$_POST[dep]',
						'$_POST[mobno]',
						'$_POST[email]',
						'$_POST[sal]',
						'$_POST[dob]',
						'$_POST[gender]',
						'$_POST[address]')";
		*/
		$emp = $name = $pass = $dep = $mobno = $email = $sal = $dob = $gender = $address = '';
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$emp = $_POST['emp_id'];
			$name = $_POST['name'];
			$pass = $_POST['password'];
			$dep = $_POST['dep'];
			$mobno = $_POST['mobno'];
			$email = $_POST['email'];
			$sal = $_POST['sal'];
			$dob = $_POST['dob'];
			$gender = $_POST['gender'];
			$address = $_POST['address'];
		
		$q = "INSERT INTO employee 
		VALUES ('$emp', '$name', '$pass', '$dep', '$mobno', '$email', '$sal', '$dob', '$gender', '$address')";
		if(!mysqli_query($con, $q))
			echo 'Registration failed. Error: '.mysqli_error($con);
		echo 'Employee registered successfully.<br>';
		}
		mysqli_close($con);
	?>

	<h1>Register</h1>
	<h2>Enter your details:</h2>
	<form onsubmit = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST">
	 	Employee ID:
	 	<input type="text" name="emp_id" placeholder="employee id"><br>
	 	Employee Name:
	 	<input type="text" name="name" placeholder="name"><br>
	 	Password:
	 	<input type="password" name="password" placeholder="password"><br>
	 	Department:
	 	<input type="text" name="dep" placeholder="department"><br>
	 	Mobile No.:
	 	<input type="text" name="mobno" placeholder="mobile no."><br>
	 	Email ID:
	 	<input type="email" name="email" placeholder="email id"><br>
	 	Employee Salary:
	 	<input type="number" name="sal" placeholder="salary"><br>
	 	Date of Birth:
	 	<input type="date" name="dob"><br>
	 	Gender:
	 	<input type="radio" name="gender" value="male">Male
	 	<input type="radio" name="gender" value="female">Female
	 	<input type="radio" name="gender" value="other">Other<br>
	 	Address:
	 	<textarea name="address" placeholder="address" rows="5"></textarea><br>
	 	<input type="submit" name="submit">
	 	<input type="reset" name="reset"><br>
	</form>
	Already have an account? 
	<a href="login.php">Login</a><br/>
	<a href="index.php">Go Back to Home</a>
</body>
</html>