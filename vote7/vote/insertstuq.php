<?php
require_once 'dbconfig.php';
// inserting sql query
if (isset($_POST['Submit']))
{

$newPosition = addslashes( $_POST['question'] ); //prevents types of SQL injection

if(mysqli_query( $conn,"INSERT INTO questions(question,accepted) VALUES ('$newPosition','no')" ) or die
	("Could not insert position at the moment". mysqli_error($conn) )){
		echo"<script>alert('Question Requested Successfully');
		window.location.href='./studentview.php?mod=student&view=requestquestion';
		</script>";
		}
		else{
		echo"<script>alert('Error Requesting question');
		window.location.href='./studentview.php?mod=student&view=requestquestion';
		</script>";
		}
// redirect back to positions
 //header("Location: positions.php");
}
else{
	 echo"<script>alert('Question Not Requested');
		window.location.href='./studentview.php?mod=student&view=requestquestion';
		</script>";
 }
?>