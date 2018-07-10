<?php
//setting header to json
header('Content-Type: application/json');
//setting header to json
include('../includes/autoloader.php');
//get connection
$bankId= $_GET['bankId'];
$conn = $GetDatabase->getInstance();
date_default_timezone_set("Etc/GMT-8");

//query to get data from the table
$result = $conn->db->prepare("SELECT * FROM beedy_exam_result WHERE bankId=:bankId ORDER BY stdAddNum");
//$result = $conn->db->prepare("SELECT * FROM score ORDER BY playerid");
 $result->execute(array('bankId'=>$bankId));
 
//loop through the returned data
while ($row = $select= $result->fetch()) { 
 $stdAddNum = $row['stdAddNum'];
	 $score = $row['Score'];
	 
 $return_arr[] = array("stdAddNum"=>System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1), 		
						"score"=>$score ); 
 
 
 }
//now print the data
echo json_encode($return_arr);