<?php
require_once 'dbconfig.php';
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['username'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lname'] ); //prevents types of SQL injection
$myEmail = $_POST['emailsignup'];
$myPassword = $_POST['passwordsignup'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

$sql = mysqli_query($conn, "INSERT INTO tbMembers(first_name, last_name, email, password,type) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass','student')" )
        or die( mysqli_error($conn) );
header("Location: index.php");
//die( "You have registered for an account.<br><br>Go to <a href=\"index.html\">Login</a>" );
}
?>