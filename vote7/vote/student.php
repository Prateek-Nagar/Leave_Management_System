<?php
$con=mysqli_connect("localhost", "root", "") or die(mysql_error($con));
mysqli_select_db($con,"polling") or die(mysql_error($con));

session_start();
//If your session isn't valid, it returns you to the login screen for protection
$img ='images\VOTE_MATTERS.jpg';
?>
<html style="background-color: white; overflow-x:hidden;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/admin.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" height="100%"border="0" align="center" cellpadding="0" cellspacing="1" class="graybox">
   <img id="image" src="<?php echo $img; ?>" width="1350" height="150">
  
  <tr>
    <td width="20%" valign="top" class="navArea">
 	
	<div id="ddblueblockmenu">
	  <div class="menutitle">Student Menu</div>
		  <ul>
			<li><a href="./studentview.php?mod=student&view=home">Welcome,&nbsp;<?php echo ucwords($_SESSION['user_name']); ?></a></li>
			<li><a href="./studentview.php?mod=student&view=manageprofile">Manage Profile</a></li>
      <li><a href="./studentview.php?mod=student&view=requestquestion">Request Question</a></li>
			<li><a href="./studentview.php?mod=student&view=currentpoll">Current Polls</a></li>
			<li><a href="logout.php">Logout</a></li>
		  </ul>
	  <div class="menutitle">&nbsp;</div>	  
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

	</td>
    <td width="720" valign="top" class="contentArea"><table width="100%" border="0" cellspacing="0" cellpadding="20">
        <tr>
          <td>
<?php
require_once $content;	 
?>          </td>
        </tr>
      </table></td>
  </tr>
</table>
  </body>
</html>




