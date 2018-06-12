<?php
require_once 'dbconfig.php';
// inserting sql query

$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

if(mysqli_query( $conn,"INSERT INTO tbmembers(first_name, last_name, email, password,type) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass','admin')" ) or die
	("Could not insert record at the moment". mysqli_error($conn) )){
		echo"<script>alert(' Account Created Successfully');
		window.location.href='./adminview.php?mod=admin&view=manageadmin';
		</script>";
		}
		else{
		echo"<script>alert('Error Creating ');
		window.location.href='./adminview.php?mod=admin&view=manageadmin';
		</script>";
		}
// redirect back to positions
 //header("Location: positions.php");

?>