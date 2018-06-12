<?php
// connection details
require_once 'dbconfig.php';

//session_start();
//If your session isn't valid, it returns you to the login screen for protection

//retrive candidates from the tbcandidates table
$result=mysqli_query($conn,"SELECT * FROM tboptions")
or die("There are no records to display ... \n" . mysqli_error($result)); 
?>
<?php
// retrieving positions sql query
$questions_retrieved=mysqli_query($conn,"SELECT * FROM questions where accepted='yes'")
or die("There are no records to display ... \n" . mysqli_error($questions_retrieved)); 
/*
$row = mysql_fetch_array($positions_retrieved);
 if($row)
 {
 // get data from db
 $positions = $row['question'];
 }
 */
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:OPTIONS</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
  <h1>MANAGE OPTIONS</h1>
</div>
<div id="container">
<table width="380" align="center">
<CAPTION><h3>ADD NEW OPTION</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="inserto.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td>Option</td>
    <td><input type="text" name="name" /></td>
</tr>
<tr>
    <td>Question</td>
    <td><SELECT name="question" id="position">select
    <OPTION VALUE="select">select
    <?php
    //loop through all table rows
    while ($row=mysqli_fetch_array($questions_retrieved)){
    echo "<OPTION name='question' VALUE=$row[question_id]>$row[question]";
    //mysql_free_result($positions_retrieved);


    //mysql_close($link);
    }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE OPTIONS</h3></CAPTION>
<tr>
<th>OPTION ID</th>
<th>OPTION</th>
<th>QUESTION</th>
</tr>

<?php
//loop through all table rows
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['option_id']."</td>";
echo "<td>" . $row['options']."</td>";
echo "<td>" . $row['question_id']."</td>";
echo '<td><a href="deleteo.php?id=' . $row['option_id'] . '">Delete Option</a></td>';
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($conn);
?>
</table>
<hr>
</div>
</div>
</body>
</html>