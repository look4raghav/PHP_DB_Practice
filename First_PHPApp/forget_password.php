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
	<title>Edit password</title>
</head>
<body>
	<h1>Create new password:</h1>
	<form>
	 	Enter your Employee ID:
	 	<input type="text" name="emp_id" placeholder="employee id"><br>
	 	Enter your new password:
	 	<input type="password" name="pass" placeholder="new password"><br>
	 	Re-enter password:
	 	<input type="password" name="match" placeholder="match password"><br>
	 	<input type="submit" name="submit">
	 	<input type="reset" name="reset"><br>
	</form>
	<a href="login.php">Login</a><br>
	Don't have an account? 
	<a href="registration.php">Register</a><br/>
	<a href="index.php">Go Back to Home</a>
</body>
</html>