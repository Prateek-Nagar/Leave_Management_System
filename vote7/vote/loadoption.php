<?php
require_once 'dbconfig.php';
    // retrieval sql query
// check if Submit is set in POST

 // get position value
 $question = addslashes( $_REQUEST['q'] ); //prevents types of SQL injection
 $result = array();
 $sql = mysqli_query($conn,"SELECT * FROM tboptions WHERE question_id='$question'")
 or die(" There are no records at the moment ... \n"); 
 $count=mysqli_num_rows($sql);
 if($count!=0){
 while($row = mysqli_fetch_array($sql)){
		array_push($result, 
				array('item'=>$row[0],'ques'=>$row[1]));
	}
	
	echo json_encode(array('result'=>$result));
 }
 /*else
 {
	echo json_encode("voted");
 }
*/
	mysqli_close($conn);
 // redirect back to vote
 //header("Location: vote.php");

  
?>