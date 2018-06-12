<?php
require_once 'dbconfig.php';
// inserting sql query
if (isset($_POST['Submit']))
{

$option = addslashes( $_POST['name'] ); //prevents types of SQL injection
$question = addslashes( $_POST['question'] ); //prevents types of SQL injection

if(mysqli_query( $conn,"INSERT INTO tboptions(options,question_id) VALUES ('$option','$question')" ) or die
	("Could not insert position at the moment". mysqli_error($conn) )){
	
		echo"<script>alert('Option Added Successfully');
		window.location.href='./adminview.php?mod=admin&view=options';
		</script>";
		}
		else{
		echo"<script>alert('Error Adding option');
		window.location.href='./adminview.php?mod=admin&view=options';
		</script>";
		}
// redirect back to positions
 //header("Location: positions.php");
}
else{
	 echo"<script>alert('Option Not Set');
		window.location.href='./adminview.php?mod=admin&view=options';
		</script>";
 }
?>