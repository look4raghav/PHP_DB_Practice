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
	<title>Login</title>
</head>
<body>
	<?php
		$emp = $pass = $empErr = $passErr = '';
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["emp_id"])) $empErr = "*Employee ID is required.";
			else $emp = $_POST["emp_id"];
			if (empty($_POST["password"])) $passErr = "*Password is required.";
			else $pass = $_POST["password"];
		}
		$con = mysqli_connect('localhost', 'root', '', 'lab9');
		if(!$con)
			die('Connection Failed: '.mysqli_connect_error());
		// echo 'Connection Successful<br>';
		$q = "SELECT password FROM employee WHERE emp_id = '$emp';";
		$retval = mysqli_query($con, $q);
		if(mysqli_num_rows($retval) != 1)
			$empErr = '*Employee ID is incorrect.';
		else{
			while($row = mysqli_fetch_assoc($retval)){;
				if($row['password'] != $pass)
					$passErr = '*Password is incorrect.';
				else
					echo "Login successful<br>";
			}
		}

		mysqli_close($con);
	?>

					
	<h1>Login</h1>
	<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST">
	 	Enter your Employee ID:
	 	<input type="text" name="emp_id" placeholder="employee id" value="<?php // echo $emp;?>" ><br>
		<span class="err"><?php echo $empErr;?></span><br>
		Enter your password:
		<input type="password" name="password" placeholder="password" value="<?php // echo $pass;?>" ><br>
		<span class="err"><?php echo $passErr;?></span><br>
	 	<input type="submit" name="submit">
	 	<input type="reset" name="reset" onClick="f1()"><br>
	</form>
	<a href="forget_password.php">Forgot Password? Click Here</a><br>
	Don't have an account? 
	<a href="registration.php">Register</a><br/>
	<a href="index.php">Go Back to Home</a>
</body>
</html>