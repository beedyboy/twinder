<?php 
error_reporting(E_ALL);
		ini_set('display_errors', 1);
include_once "../classes/session.php"; 


 
if(Session::exists('steps')): 
	$counter = Session::get('steps')+1;
	 Session::set('steps', $counter);
	 echo $counter; 

  endif;
 
?>




 