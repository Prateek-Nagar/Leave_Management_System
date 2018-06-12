<?php
// connection details
require_once 'dbconfig.php';

//session_start();
//If your session isn't valid, it returns you to the login screen for protection
//retrive positions from the questions table
$result=mysqli_query($conn,"SELECT * FROM questions where accepted='yes'")
or die("There are no records to display ... \n" . mysqli_error($result)); 
//header("Location: positions.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:questions</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
  <h1>MANAGE QUESTIONS</h1>
</div>
<div id="container">
<table width="380" align="center">
<CAPTION><h3>ADD NEW QUESTION</h3></CAPTION>
<form name="fmques" id="fmques" action="insertq.php" method="post" onsubmit="return questionValidate(this)">
<tr>
    <td>Question</td>
    <td><input type="text" name="question" /></td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="420" align="center">
<CAPTION><h3>AVAILABLE QUESTIONS</h3></CAPTION>
<tr>
<th>Question ID</th>
<th>Question</th>
</tr>

<?php

$count=mysqli_num_rows($result);
if($count==0){
echo "No Questions Added Yet";
}
else{
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
echo "<tr>";
echo "<td>" . $row['question_id']."</td>";
echo "<td>" . $row['question']."</td>";
echo '<td><a href="deleteq.php?id=' . $row['question_id'] . '">Delete Question</a></td>';
echo "</tr>";
}
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