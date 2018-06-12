<?php
$mod = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

if($mod == 'student'){
	switch ($view) {
	
		case 'currentpoll' :
			$content 	= 'vote.php';		
		break;
		
		case 'requestquestion' :
			$content 	= 'requestquestion.php';		
		break;
		
		case 'manageprofile' :
			$content 	= 'manage-profile.php';		
		break;
		case 'home':
			$content = 'main.php';
			break;
			}//switch
}//if
require_once './student.php';
?>