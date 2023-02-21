<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		input, textarea{
			padding: 5px; margin-top: 5px;
		}
	</style>
	<title>Bank Registration</title>
</head>
<body>
	<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	/*
	$con = mysqli_connect($host, $user, $pass);
	if(!$con)
		die('Connection Failed: '.mysqli_connect_error());
	echo 'Connection successful<br>';

	$q = 'CREATE DATABASE bankDB';
	if(!mysqli_query($con, $q))
		echo 'Database creation failed. Error: '.mysqli_error($con);
	echo 'Database creation successful<br>';
	*/
	$dbname = 'bankDB';
	$con = mysqli_connect($host, $user, $pass, $dbname);
	if(!$con)
		die('Connection Failed: '.mysqli_connect_error());
	echo 'Connection successful<br>';
	/*
	$q = 'CREATE TABLE bank(
		b_id INT AUTO_INCREMENT NOT NULL,
		b_name VARCHAR(10),
		b_type VARCHAR(10),
		PRIMARY KEY(b_id));';
	if(!mysqli_query($con, $q))
		echo 'Table bank creation failed. Error: '.mysqli_error($con);
	echo 'Table bank created successfully<br>';

	$q = 'CREATE TABLE customer(
		c_id INT AUTO_INCREMENT NOT NULL,
		c_name VARCHAR(50),
		age INT,
		PRIMARY KEY(c_id));';
	if(!mysqli_query($con, $q))
		echo 'Table customer creation failed. Error: '.mysqli_error($con);
	echo 'Table customer created successfully<br>';

	$q = 'CREATE TABLE account(
		a_id INT AUTO_INCREMENT NOT NULL,
		b_id INT,
		c_id INT,
		a_type VARCHAR(10),
		amount INT,
		PRIMARY KEY(a_id));';
	if(!mysqli_query($con, $q))
		echo 'Table account creation failed. Error: '.mysqli_error($con);
	echo 'Table account created successfully<br>';

	$q = "INSERT INTO bank(b_name, b_type) 
	VALUES ('ICICI','Private'),
	('SBI','Government'),
	('PNB','Government'),
	('HDFC','Private')";
	if(!mysqli_query($con, $q))
		echo 'Insertion failed. Error: '.mysqli_error($con);
	echo 'Values inserted successfully<br>';

	$q = "INSERT INTO customer(c_name, age) 
	VALUES ('Jhuma', 21),
	('Kanan', 45),
	('Amey', 36),
	('Radha', 38)";
	if(!mysqli_query($con, $q))
		echo 'Insertion failed. Error: '.mysqli_error($con);
	echo 'Values inserted successfully<br>';

	$q = "INSERT INTO account(b_id, c_id, a_type, amount) 
	VALUES (1, 2, 'Savings', 50000),
	(1, 3, 'Current', 2000),
	(2, 1, 'Current', 5000),
	(4, 1, 'Savings', 65000),
	(3, 3, 'Savings', 85000),
	(2, 4, 'Current', 10000)";
	if(!mysqli_query($con, $q))
		echo 'Insertion failed. Error: '.mysqli_error($con);
	echo 'Values inserted successfully<br>';
	*/
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// $a_id = $_POST['a_id'];
		$c_name = $_POST['c_name'];
		$age = $_POST['age'];
		$b_id = $_POST['b_id'];
		$a_type = $_POST['a_type'];
		$amount = $_POST['amount'];
	}
	$q = "INSERT INTO customer(c_name, age) 
	VALUES ('$c_name', '$age');";
	if(!mysqli_query($con, $q))
		echo 'Registration failed. Error: '.mysqli_error($con);
	echo 'Customer registered successfully.<br>';
	/*
	$c_id = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id FROM customer WHERE c_name = '$c_name';"))['c_id'];
	$q = "INSERT INTO account(b_id, c_id, a_type, amount) 
	VALUES ('$b_id', '$c_id', '$a_type', '$amount')
	WHERE c_id;";
	if(!mysqli_query($con, $q))
		echo 'Registration failed. Error: '.mysqli_error($con);
	echo 'Customer registered successfully.<br>';
	*/
	$retval = mysqli_query($con, "SELECT * FROM customer ");
	if(mysqli_num_rows($retval)>0){
		while($row = mysqli_fetch_assoc($retval)){
			echo "Customer ID: {$row['c_id']}<br>".
			"Customer Name: {$row['c_name']}<br>".
			"Customer Age: {$row['age']}<br>";
		}
	}

	mysqli_close($con);
	?>

	<h1>Register</h1>
	<h2>Enter details:</h2>
	<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST">
	 	<!-- Account ID:
	 	<input type="number" name="a_id" placeholder="account id"><br> -->
	 	Customer Name:
	 	<input type="text" name="c_name" placeholder="customer name"><br>
	 	Age:
	 	<input type="number" name="age" placeholder="age"><br>
	 	Bank ID:
	 	<input type="number" name="b_id" placeholder="bank id"><br>
	 	Account type:
	 	<input type="text" name="a_type" placeholder="account type"><br>
	 	Amount:
	 	<input type="number" name="amount" placeholder="amount"><br>
	 	<input type="submit" name="submit">
	 	<input type="reset" name="reset"><br>
	</form>

</body>
</html>