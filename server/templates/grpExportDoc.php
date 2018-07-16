<?php 
include('../includes/system.php');
 $bankId=$_GET['bankId']; 
// $stdAddNum=$_GET['stdAddNum']; 
	  $genStdBatchId=$_GET['genStdBatchId']; 
	  $SchoolTermId=$_GET['SchoolTermId']; 
	  $exambankId=$_GET['exambankId']; 
 $resultClass  = $GetExam->resultClass($bankId,$genStdBatchId,$SchoolTermId);
  

//header("Content-Type: application/csv");
//header("Content-Disposition: attachment;Filename=cars-models.csv");

 $cn = Database::getName('genstudentbatches', 'genStdBatchId',$genStdBatchId,1)."\t".Database::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1);  
 $term = Database::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1); 
 $batch = Database::getName('genstudentbatches', 'genStdBatchId',$genStdBatchId,1);
 
$head = $cn."\t"."-".$batch."\t"."-".$term;
  $filename = $head.".doc"; //Change File type CSV/TXT etc
          
header("Content-type: application/vnd.ms-word");
                header('Content-Disposition: attachment; filename=' . $filename);
 
 //$output = fopen('php://output', 'w');
 //fputcsv($output, $head);
//fputcsv($output, array('Subject', 'Score', 'Obtainable', 'Percentage(%)'));
  
if(!empty($resultClass)): 

$subId = System::getColById('beedygroupsub', 'bankId', $bankId, 1); 
 $classId = System::getColById('beedysubjectlist', 'subId', $subId, 2); 
   System::getColById('beedyclasslist', 'classId', $classId, 1)."\t"
 .System::getColById('beedysubjectlist', 'subId', $subId, 1);  ?> 

<table border="2"class="table table-striped table-bordered">
<tr>
<td>

<?php
  echo System::getColById('beedygroup', 'exambankId', $exambankId, 1)."\t"."-";  
 echo  Database::getName('genstudentbatches', 'genStdBatchId',$genStdBatchId,1)."\t"; ?> 
<?php echo  Database::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1)."\t"; ?> 
 <b>(<?php echo System::getColById('beedyclasslist', 'classId', $classId, 1)."\t"
 .System::getColById('beedysubjectlist', 'subId', $subId, 1); 
  ?>)
 </b> 
  
</td>
</tr>
<tr> 
<td>
<table  border="1"  width="100%" class="table table-striped table-bordered">
<tr>
<th>S/N</th>
<th>Full Name</th>
<th>Subject</th>
<th>Score</th>
<th>Obtainable</th>
<th>Percentage(%)</th>
</tr>

<?php
$i=0;
foreach($resultClass as $LIST): 
$bankId = $LIST['bankId']; 
$subId = Database::getName('beedygroupsub', 'bankId',$bankId,1);
 $Total_Question = Database::getName('beedygroupsub', 'bankId',$bankId,7);
 $Mark = Database::getName('beedygroupsub', 'bankId',$bankId,8);
 $obt = $Total_Question * $Mark;
 $stdAddNum =  $LIST['stdAddNum'];
 $i++;
?>
<tr>
<td><?php echo $i; ?> </td>
<td>
<?php 
 echo System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1)."\t".
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 2)."\t". 
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 3);  ?> </td>
<td><?php echo Database::getName('beedysubjectlist', 'subId', $subId, 1); ?> </td>
<td><?php echo $LIST['Score']; ?> </td>
<td><?php echo $obt ?> </td>
<td><?php echo $LIST['Percentage']; ?> </td>
</tr>
<?php 
endforeach;
?>

</table>
</td>
</tr>
 
</table>
<?php else: ?>
<h3> Record not found </h3>

<?php
endif;  
 ?> 

 <script type="text/JavaScript" src="../style/jquery.min.js"></script>
<script type="text/JavaScript" src="../style/jquery-ui.js"></script>
<script type="text/JavaScript" src="../style/jquery-form.js"></script>
<script type="text/JavaScript" src="../style/jquery-1.5.min.js"></script>
<script type="text/JavaScript" src="../style/jquery.jgrowl.js"></script>
<script type="text/JavaScript" src="../style/bootstrap.min.js"></script>
<script type="text/JavaScript" src="../style/respond.min.js"></script>