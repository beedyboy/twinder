<?php
//setting header to json
header('Content-Type: application/json');
//setting header to json
include('../includes/autoloader.php');


  
$GetSession  = new my_Session();
$GetDatabase  = new Database();
$GetSchool  = new school(); 
$GetStudent  = new student();
$GetSystem  = new System();
$GetExam  = new Examination();
 
  
$loadSchool = $GetSchool->loadSchool(); 
$i = 0; 
 foreach($loadSchool as $Beedy):
$i++;
$active= $Beedy['active'];
$dateTo= $Beedy['dateTo'];
$dateFrom= $Beedy['dateFrom']; 
endforeach;



$schArray['dateFrom'] = $dateFrom;
$schArray['dateTo'] = $dateTo; 
$schArray['active'] = $active;
 
 

$now= time();
$today=date('Y-m-d'); 
 
 $d1 = new DateTime($schArray['dateFrom']);
 $d2 = new DateTime($schArray['dateTo']);
 $td = new DateTime($today);
 $bdLast= $td->diff($d2)->format("%R%a");
  

 $return_arr[] = array("active"=>$active, 		
						"bdLast"=>$bdLast  ); 
 
  
//now print the data
echo json_encode($return_arr);