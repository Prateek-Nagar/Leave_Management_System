<?php
require_once 'dbconfig.php';
// inserting sql query
if (isset($_GET['id']) && isset($_POST['update']))
{
$myId = addslashes( $_GET['id']);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

if(mysqli_query( $conn,"UPDATE tbmembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass',type='admin' WHERE member_id = '$myId'" ) or die
	("Could not update at the moment". mysqli_error($conn) )){
		echo"<script>alert('Profile updated Successfully');
		window.location.href='./adminview.php?mod=admin&view=manageadmin';
		</script>";
		}
		else{
		echo"<script>alert('Error Updating');
		window.location.href='./adminview.php?mod=admin&view=manageadmin';
		</script>";
		}
// redirect back to positions
 //header("Location: positions.php");
}
else{
	 echo"<script>alert('Profile not updated');
		window.location.href='./adminview.php?mod=admin&view=manageadmin';
		</script>";
 }
?>