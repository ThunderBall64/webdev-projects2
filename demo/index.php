<?php  
# Project	: Social Media App
# Name 		: Tyler Billings
# Date 		: 4th Jan 2018
# Objective	: Spcial Media App in PHP, JavaScript, MySQL

$con = mysqli_connect("localhost", "root", "", "social");
if (mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}
//echo "Connected to MySQL";
$query = mysqli_query($con, "INSERT INTO test VALUES('', 'Tyler')");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Social Media Application</title>
	<meta charset="utf-8">
</head>
<body>

</body>
</html>