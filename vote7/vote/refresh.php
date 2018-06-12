<?php
require_once 'dbconfig.php';
?>
<?php
// retrieving option(s) results based on position
if (isset($_POST['Submit'])){   
  $question = addslashes( $_POST['question'] );
    $sql=mysqli_query($conn,"SELECT * FROM questions where question_id='$question'")or die("Error");
     $row = mysqli_fetch_array($sql);
     $q=$row['question'];
    $results = mysqli_query($conn,"SELECT * FROM tboptions where question_id='$question'")or die("Error");

    $row1 = mysqli_fetch_array($results); // for the first option
    $row2 = mysqli_fetch_array($results); // for the second option
     if ($row1=="" or !isset($row1) ){
	  $option_name_1="Undefined Option 1" ;// second option name
      $option_1=0;						// second option votes  
	  }	  
	  else{	  
      $option_name_1=$row1['options']; // second option name
      $option_1=$row1['option_votes']; // second option votes
      }

      if ($row2=="" or !isset($row2) ){
	  $option_name_2="Undefined Option 2" ;// second option name
      $option_2=0;						// second option votes  
	  }	  
	  else{	  
      $option_name_2=$row2['options']; // second option name
      $option_2=$row2['option_votes']; // second option votes
      }
}
    else
         // do nothing
?> 
<?php
// retrieving positions sql query
$questions=mysqli_query($conn,"SELECT * FROM questions where accepted='yes'")
or die("There are no records to display ... \n" . mysqli_error($conn)); 
?>
<?php
//session_start();
//If your session isn't valid, it returns you to the login screen for protection
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$option_1+$option_2;}?>

<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body>
<div id="page">
<div id="header">
<h1>POLL RESULTS </h1>
</div>
<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="" >
<tr>
    <td>Choose Question</td>
    <td><SELECT NAME="question" id="question">
    <OPTION VALUE="select">select
    <?php 
    //loop through all table rows
    while ($row=mysqli_fetch_array($questions)){
    echo "<OPTION name='question' VALUE=$row[question_id]>$row[question]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Results" /></td>
</tr>
<tr>

    <td>&nbsp;</td> 
    <td>&nbsp;</td>

</tr>
</form> 
</table>
<?php
if(isset($_POST['Submit'])){
  echo "Question:";
  echo  $q;
}
  ?><br><br>
  <?php
 if(isset($_POST['Submit'])){echo $option_name_1;} ?>:<br>
<img src="images/option-1.gif"
width='<?php if(isset($_POST['Submit'])){ if ($option_2 || $option_1 != 0){echo(100*round($option_1/($option_2+$option_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($option_2 || $option_1 != 0){echo(100*round($option_1/($option_2+$option_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $option_1;} ?>
<br>
<br>
<?php if(isset($_POST['Submit'])){ echo $option_name_2;} ?>:<br>
<img src="images/option-2.gif"
width='<?php if(isset($_POST['Submit'])){ if ($option_2 || $option_1 != 0){echo(100*round($option_2/($option_2+$option_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($option_2 || $option_1 != 0){echo(100*round($option_2/($option_2+$option_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $option_2;} ?>
</div>
</div>
</body></html>