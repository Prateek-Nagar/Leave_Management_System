
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Panel:questions</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
  <h1>REQUEST QUESTIONS</h1>
</div>
<div id="container">
<table width="380" align="center">
<CAPTION><h3>REQUEST QUESTION</h3></CAPTION>
<form name="fmques" id="fmques" action="insertstuq.php" method="post" onsubmit="return questionValidate(this)">
<tr>
    <td>Question</td>
    <td><input type="text" name="question" /></td>
    <td><input type="submit" name="Submit" value="Request" /></td>
</tr>
</table>