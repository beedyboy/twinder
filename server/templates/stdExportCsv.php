<?php 
include('../includes/system.php');
 $stdAddNum=$_GET['stdAddNum']; 
	  $genStdBatchId=$_GET['genStdBatchId']; 
	  $SchoolTermId=$_GET['SchoolTermId']; 
 $resultInd  = $GetExam->resultInd($stdAddNum,$genStdBatchId,$SchoolTermId);
 
$table = 'table_name';
$outstr = NULL;

//header("Content-Type: application/csv");
//header("Content-Disposition: attachment;Filename=cars-models.csv");
$full_name= System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1)."\t". 
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 2)."\t".
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 3);  
 $term = Database::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1); 
$batch = Database::getName('genStudentBatches', 'genStdBatchId',$genStdBatchId,1);
$head = $full_name."\t"."-".$batch."\t"."-".$term;
  $filename = $head.".csv"; //Change File type CSV/TXT etc
                header('Content-type: application/csv'); //Change File type CSV/TXT etc
                header('Content-Disposition: attachment; filename=' . $filename);
 
 $output = fopen('php://output', 'w');
 //fputcsv($output, $head);
fputcsv($output, array('Subject', 'Score', 'Obtainable', 'Percentage(%)'));
  
if(!empty($resultInd)): ?>
 
<?php
foreach($resultInd as $LIST): 
$bankId = $LIST['bankId']; 
$subId = Database::getName('beedyGroupSub', 'bankId',$bankId,1);
 $Total_Question = Database::getName('beedyGroupSub', 'bankId',$bankId,7);
 $Mark = Database::getName('beedyGroupSub', 'bankId',$bankId,8);
 $obt = $Total_Question * $Mark;
 
$row=array(Database::getName('beedySubjectList', 'subId', $subId, 1), $LIST['Score'], $obt, $LIST['Percentage']);

fputcsv($output, $row);
?> 
<?php 
 
endforeach;
?>
 
<?php
endif;  
 ?> 
 