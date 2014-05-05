<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="css/css1.css" rel="stylesheet" type="text/css" />

 <h1 align="center">Registration</h1>
  <style>
            .box
            {
                background-image: url("16.jpg");


            }
  </style>
</head>
    <body class="box">
<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 )
            {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>';
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
<form id="loginForm" name="loginForm" method="post" action="register-exec.php">

    <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
      <th>Username<font color="#FF0000">*</font> </th>
      <td><input name="uname" type="text" class="textfield" id="uname" placeholder="usn"/></td>
    </tr>
    <tr>
      <th> Name<font color="#FF0000">*</font> </th>
      <td><input name="name" type="text" class="textfield" id="name" placeholder="name"/></td>
    </tr>

    <tr>
      <th width="124">Email<font color="#FF0000">*</font></th>
      <td width="168"><input name="email" type="text" class="textfield" id="email" placeholder="email"/></td>
    </tr>

    <tr>
      <th>Password<font color="#FF0000">*</font></th>
      <td><input type="password" id="password" name="password"  class="textfield" placeholder="password"/></td>
    </tr>
    <tr>
      <th>Confirm Password<font color="#FF0000">*</font></th>
      <td><input name="cpassword" type="password" class="textfield" id="cpassword" placeholder="confirm password"/></td>
    </tr>
    <tr>
      <td><input type="submit" name="Submit" value="Register"/></td>
      <td><input type="reset" name="reset" value="Clear" /></td>
      <td><input type="reset" name="Back" value="Back" onclick=window.location.replace("background_1.html"); /></td>
    </tr>
  </table>
</form>
</body>
</html>
