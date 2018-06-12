<?php
require_once 'dbconfig.php';
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
  if(mysqli_query($conn,"DELETE FROM tboptions WHERE option_id='$id'")){
  echo"<script>alert('Option Deleted Successfully');
		window.location.href='./adminview.php?mod=admin&view=options';
		</script>";
  }
  else{
	  echo"<script>alert('The option does not exist ...');
		window.location.href='./adminview.php?mod=admin&view=options';
		</script>";
  }
 
 // redirect back to positions
 //header("Location: positions.php");
 }
 else{
	 echo"<script>alert('Id not set');
		window.location.href='./adminview.php?mod=admin&view=options';
		</script>";
 }
 // do nothing
    
?>