<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body>
<div id="page">
<div id="header">
<h1>MANAGE ADMINISTRATORS </h1>
</div>
<div id="container">
<?php
$con=mysqli_connect("localhost", "root", "") or die(mysql_error($con));
mysqli_select_db($con,"polling") or die(mysql_error($con));
//If your session isn't valid, it returns you to the login screen for protection
//Process
//Process
?>
<table align="center">
<tr>
<td>
<form action="updateadmin.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
<table align="center">
<CAPTION><h4>UPDATE ACCOUNT</h4></CAPTION>
<tr><td>First Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="email" maxlength="100" value=""></td></tr>
<tr><td>New Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="password" maxlength="15" value=""></td></tr>
<tr><td>Confirm New Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update Account"></td></tr>
</table>
</form>
</td>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
<td>
<form action="createadmin.php" method="post" <!--onsubmit="return registerValidate(this)-->">
<table align="center">
<CAPTION><h4>CREATE ACCOUNT</h4></CAPTION>
<tr><td>First Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="email" maxlength="100" value=""></td></tr>
<tr><td>Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="password" maxlength="15" value=""></td></tr>
<tr><td>Confirm Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Create Account"></td></tr>
</table>
</form>
</td>
</tr>
</table>
</div>
</div>
</body></html>