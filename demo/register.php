<?php  
$con = mysqli_connect("localhost", "root", "", "social");
if (mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}

// declaring variables to prevent errors
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = "";

if (isset($_POST['register_button'])) {
	// These are registration form values

	// First Name
	$fname = strip_tags($_POST['reg_fname']); // remove html tags
	$fname = str_replace('', '', $fname); // replace spsce with fname var
	$fname = ucfirst(strtolower($fname)); // upercase first letter

	// Last Name
	$lname = strip_tags($_POST['reg_lname']);
	$lname = str_replace('', '', $lname);
	$lname = ucfirst(strtolower($lname));

	// Email
	$em = strip_tags($_POST['reg_email1']);
	$em = str_replace('', '', $em);
	$em = ucfirst(strtolower($em));

	// Email 2 for Confirmation
	$$em2 = strip_tags($_POST['reg_email2']);
	$$em2 = str_replace('', '', $em2);
	$$em2 = ucfirst(strtolower($em2));

	// Password 1 && 2 for validation
	$password = strip_tags($_POST['reg_password']);
	$password2 = strip_tags($_POST['reg_password2']);

	// Display Current Date
	$date = date("Y-m-d"); 

	if ($em == $em2) {
		// validate email and format
		if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
			$em = filter_var($em, FILTER_VALIDATE_EMAIL);
			// check if email exists
			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
			// Count number of rows that were returned
			$num_rows = mysqli_num_rows($e_check);
			if ($num_rows > 0) {
				echo "Email already in use";
			}
		} else {
			echo "Invalid format";
		}
	} else {
		echo "Emails don't match";;
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Social Media Registration</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" required> <br>
		<input type="text" name="reg_lname" placeholder="Last Name" required> <br>
		<input type="email" name="reg_email1" placeholder="Email" required> <br>
		<input type="email" name="reg_email2" placeholder="Confirm Email" required> <br>
		<input type="password" name="reg_password" placeholder="Password" required> <br>
		<input type="password" name="reg_password2" placeholder="Confirm Password" required> <br>
		<input type="submit" name="register_button" value="Register">
	</form>
</body>
</html>