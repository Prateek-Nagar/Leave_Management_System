<?php
session_start();
$id=$_SESSION['member_id'];

if (isset($_POST['Submit']))
 {
 // get position value
 $question = addslashes( $_POST['question'] );
 $vote = $_POST['vote'];
}
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"polling");

mysqli_query($con,"UPDATE tboptions SET option_votes=option_votes+1 WHERE option_id='$vote'");

mysqli_query($con,"INSERT INTO student_votes VALUES ($question,$vote,$id)");
echo"<script>alert('Voted Successfully');
		window.location.href='./studentview.php?mod=student&view=currentpoll';
		</script>";
mysqli_close($con);
?> 