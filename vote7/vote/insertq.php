<?php
require_once 'dbconfig.php';
// inserting sql query
if (isset($_POST['Submit']))
{

$question = addslashes( $_POST['question'] ); //prevents types of SQL injection

if(mysqli_query( $conn,"INSERT INTO questions(question,accepted) VALUES ('$question','yes')" ) or die
	("Could not insert position at the moment". mysqli_error($conn) )){
		echo"<script>alert('Question Added Successfully');
		window.location.href='./adminview.php?mod=admin&view=questions';
		</script>";
		}
		else{
		echo"<script>alert('Error Adding question');
		window.location.href='./adminview.php?mod=admin&view=questions';
		</script>";
		}
// redirect back to positions
 //header("Location: positions.php");
}
else{
	 echo"<script>alert('Question Not Set');
		window.location.href='./adminview.php?mod=admin&view=questions';
		</script>";
 }
?>