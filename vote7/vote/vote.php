<?php
//session_start();
require_once 'dbconfig.php';
$id=$_SESSION['member_id']
//If your session isn't valid, it returns you to the login screen for protection
?>
<?php
// retrieving positions sql query
$questions=mysqli_query($conn,"select q.* from questions q join student_votes s on q.question_id=s.question_id where q.accepted='yes' and s.member_id<>$id union select * from questions q where q.accepted='yes' and q.question_id not in (SELECT DISTINCT(s.question_id) from student_votes s)")
or die("There are no records to display ... \n" . mysqli_error($conn)); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Voting Page</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />   
<script language="JavaScript" src="js/user.js">

</script>
<script language="JavaScript" src="js/jquery.js">

</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","save.php?vote="+int,true);   
xmlhttp.send();
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?question="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#question').change(function(){
	if($('#question').val()=="select"){
			$('#options').empty();
			}
			else{
			$.getJSON(
			'loadoption.php',
			'q='+$('#question').val(),
		function(result){
			/*else if(result=="voted"){
			$('#options').empty();
			alert("You've Already Voted To This Question");
			}*/
			$.each(result.result, function(){
				$('#options').append('<tr><td>'+this['ques']+'</td> <td><input type="radio" name="vote" value='+this['item']+'></td></tr>');
			});
              $('#options').append('<tr><td><input type="submit" name="Submit" value="Vote" /></td></tr>');

    	}
		);
		}
	
});
});
</script>
</head>
<body>
<div id="page">
<div id="header">
  <h1>CURRENT POLLS</h1>
</div>
<div class="refresh">
</div>
<div id="container">
<form name="fmNames" id="fmNames" method="post" action="save.php">
<table width="420" align="center" id="tboption">
<tr>
    <td>Choose Question</td>
    <td><SELECT NAME="question" id="question">
    <OPTION VALUE="select">select
    <?php 
    //loop through all table rows
    while ($row=mysqli_fetch_array($questions,MYSQLI_ASSOC)){
    echo "<OPTION  name='question' VALUE=$row[question_id]>$row[question]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT></td>
    
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
<tr>
    <h3>NB: Click a circle under a respective option to cast your vote. You can't vote more than once in a respective question. This process can not be undone so think wisely before casting your vote.</h3>
    <td>&nbsp;</td>
</tr>
<tr>
    <th>Options:</th>
</tr>
<table id="options" align="center">
</table>
</table>
</form>
</div>
</div>
</body>
</html>