<?php
require_once 'dbconfig.php';
// deleting sql query
// check if the 'id' variable is set in URL

 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];

 // delete the entry
 if(mysqli_query($conn,"DELETE FROM questions WHERE question_id='$id'") or die(mysqli_error($conn))){
  if(mysqli_query($conn,"DELETE FROM tboptions WHERE question_id='$id'") or die(mysqli_error($conn))){
  if(mysqli_query($conn,"DELETE FROM student_votes WHERE question_id='$id'") or die(mysqli_error($conn))){
	  echo"<script>alert('Question Deleted Successfully');
		window.location.href='./adminview.php?mod=admin&view=questions';
		</script>";
  }
}
}
  else{
	  echo"<script>alert('The position does not exist ...');
		window.location.href='./adminview.php?mod=admin&view=questions';
		</script>";
  }
 
 // redirect back to positions
 //header("Location: positions.php");
 }
 else{
	 echo"<script>alert('Id not set');
		window.location.href='./adminview.php?mod=admin&view=questions';
		</script>";
 }
 // do nothing
    
?>