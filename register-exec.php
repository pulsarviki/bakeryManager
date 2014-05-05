<?php
	//Start the session
	session_start();
        //Include database connection details
	require_once('connect_db.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$usn = clean($_POST['uname']);
        $name =clean($_POST['name']);
        $email =clean($_POST['email']);
        $password = clean($_POST['password']);
	$cpassword =clean($_POST['cpassword']);
	
	//Input Validations
	if($usn == '') {
		$errmsg_arr[] = 'USN is missing';
		$errflag = true;
	}
	if($name == '') {
		$errmsg_arr[] = 'name is missing';
		$errflag = true;
	}
	
	if($email == '') {
		$errmsg_arr[] = 'email is missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	
	//Check for duplicate login ID
	if($usn != '') {
		$qry = "SELECT * FROM login WHERE USN='$usn'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'USN is already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		header("location: register-form.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO login(USN,name,email,password) VALUES('$usn','$name','$email','$password')";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: register-success.php");
		exit();
	}else {
		die("Query failed");
	}
?>