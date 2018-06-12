<?php
require_once 'dbconfig.php';
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
  if(mysqli_query($conn,"Update questions SET accepted='yes' WHERE question_id='$id'")){
  echo"<script>alert('Question Accepted Successfully');
		window.location.href='./adminview.php?mod=admin&view=reviewquestions';
		</script>";
  }
  else{
	  echo"<script>alert('Not accepted  ...');
		window.location.href='./adminview.php?mod=admin&view=reviewquestions';
		</script>";
  }
 
 // redirect back to positions
 //header("Location: positions.php");
 }
 else{
	 echo"<script>alert('Id not set');
		window.location.href='./adminview.php?mod=admin&view=reviewquestions';
		</script>";
 }
 // do nothing
    
?>