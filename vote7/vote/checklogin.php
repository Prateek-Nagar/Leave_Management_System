<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
require_once 'dbconfig.php';
//$tbl_name="tbMembers"; // Table name
// Defining your login details into variables
$myusername=$_POST['username'];
$mypassword=$_POST['password'];
$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
// MySQL injection protections
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($conn,$myusername);
$mypassword = mysqli_real_escape_string($conn,$mypassword);

$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysqli_error($conn));
$result=mysqli_query($conn,$sql) or die(mysql_error());

// Checking table row
$count=mysqli_num_rows($result);
// If username and password is a match, the count will be 1

if($count==1){
// If everything checks out, you will now be forwarded to student.php
$row = mysqli_fetch_assoc($result);
$uType=$row['type'];
if($uType == 'student')
		{  
		     $sql = "SELECT * FROM tbmembers
					WHERE email = '$myusername'";
			$result = mysqli_query($conn,$sql) or die(mysql_error());
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
				$_SESSION['member_id'] = $row['member_id'];
				$_SESSION['user_name'] = $row['first_name'];
				$_SESSION['type'] = $row['type'];
				header('Location:studentview.php?mod=student&view=home');	
			}
			
		}
		if($uType == 'admin'){
			$sql = "SELECT * FROM tbmembers
					WHERE email =  '$myusername'";
			$result = mysqli_query($conn,$sql) or die(mysql_error());
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
				$_SESSION['member_id'] = $row['member_id'];
				$_SESSION['user_name'] = $row['first_name'];
				$_SESSION['type'] = $row['type'];
				header('Location:adminview.php?mod=admin&view=home');	
			}//if
			
		}	

}
//If the username or password is wrong, you will receive this message below.
else {
echo"<script>alert('Incorrect User ID And Password Combination');
window.location.href='index.php';
</script>";
}
ob_end_flush();
?> 
