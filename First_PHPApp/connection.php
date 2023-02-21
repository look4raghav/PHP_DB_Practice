
<?php
$con = mysqli_connect('localhost', 'root', '', 'lab9');
if(!$con)
	die('Connection Failed: '.mysqli_connect_error());
echo 'Connection Successful<br>';
mysqli_close($con);
?>
