<?php
$mod = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

if($mod == 'admin'){
	switch ($view) {
	
	     case 'questions' :
			$content 	= 'questions.php';		
		break;
		
		 case 'reviewquestions' :
			$content 	= 'reviewquestion.php';		
		break;
		
		case 'options' :
			$content 	= 'options.php';		
		break;
	
		case 'refresh' :
			$content 	= 'refresh.php';		
		break;
		
		
		case 'manageadmin' :
			$content 	= 'manage-admins.php';		
		break;

		case 'home':
			$content = 'main.php';
			break;
		
		
		
	}//switch
}//if

require_once './admin.php';
?>