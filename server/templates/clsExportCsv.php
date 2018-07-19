<?php 
include('../includes/system.php');
$bankId=$_GET['bankId']; 
// $stdAddNum=$_GET['stdAddNum']; 
	  $genStdBatchId=$_GET['genStdBatchId']; 
	  $SchoolTermId=$_GET['SchoolTermId']; 
 $resultClass  =Examination::resultClass($bankId,$genStdBatchId,$SchoolTermId);
  

//header("Content-Type: application/csv");
//header("Content-Disposition: attachment;Filename=cars-models.csv");

 $cn = System::getName('genstudentbatches', 'genStdBatchId',$genStdBatchId,1)."\t".System::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1);  
 $term = System::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1); 
 $batch = System::getName('genstudentbatches', 'genStdBatchId',$genStdBatchId,1);
 
$head = $cn."\t"."-".$batch."\t"."-".$term;
  $filename = $head.".csv";
  
 header('Content-type: application/csv'); //Change File type CSV/TXT etc
 header('Content-Disposition: attachment; filename=' . $filename);

 $output = fopen('php://output', 'w');
 //fputcsv($output, $head);
fputcsv($output, array('Surname', 'First Name', 'Last Name', 'Subject', 'Score', 'Obtainable', 'Percentage(%)'));
  
if(!empty($resultClass)): ?>
 
<?php
foreach($resultClass as $LIST): 
//$bankId = $LIST['bankId']; 
 $stdAddNum =  $LIST['stdAddNum']; 
$subId = System::getName('beedygroupsub', 'bankId',$bankId,1);
 $Total_Question = System::getName('beedygroupsub', 'bankId',$bankId,7);
 $Mark = System::getName('beedygroupsub', 'bankId',$bankId,8);
 $obt = $Total_Question * $Mark;
 
$row=array(System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1), System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 2),
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 3), System::getName('beedysubjectlist', 'subId', $subId, 1), $LIST['Score'], $obt, $LIST['Percentage']);

fputcsv($output, $row);
?> 
<?php 
 
endforeach;
?>
 
<?php
endif;  
 ?> 
 