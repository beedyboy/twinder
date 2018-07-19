<?php 
include('../includes/system.php');
 $stdAddNum=$_GET['stdAddNum']; 
	  $genStdBatchId=$_GET['genStdBatchId']; 
	  $SchoolTermId=$_GET['SchoolTermId']; 
 $resultInd  =Examination::resultInd($stdAddNum,$genStdBatchId,$SchoolTermId);
 
$table = 'table_name';
$outstr = NULL;

//header("Content-Type: application/csv");
//header("Content-Disposition: attachment;Filename=cars-models.csv");
$full_name= System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1)."\t". 
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 2)."\t".
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 3);  
 $term = System::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1); 
$batch = System::getName('genstudentbatches', 'genStdBatchId',$genStdBatchId,1);
$head = $full_name."\t"."-".$batch."\t"."-".$term;
  $filename = $head.".doc"; //Change File type CSV/TXT etc
          
header("Content-type: application/vnd.ms-word");
                header('Content-Disposition: attachment; filename=' . $filename);
 
 //$output = fopen('php://output', 'w');
 //fputcsv($output, $head);
//fputcsv($output, array('Subject', 'Score', 'Obtainable', 'Percentage(%)'));
  
if(!empty($resultInd)):  ?>






<table border="2" width="100%" class="table table-striped table-bordered">
<tr>
 
<td>
<table  border="1"  width="100%" class="table table-striped table-bordered">
<tr>
<th>Subject</th>
<th>Score</th>
<th>Obtainable</th>
<th>Percentage(%)</th>
</tr>
<?php
foreach($resultInd as $LIST): 
$bankId = $LIST['bankId']; 
$subId = System::getName('beedygroupsub', 'bankId',$bankId,1);
 $Total_Question = System::getName('beedygroupsub', 'bankId',$bankId,7);
 $Mark = System::getName('beedygroupsub', 'bankId',$bankId,8);
 $obt = $Total_Question * $Mark;
?>
<tr>
<td><?php echo System::getName('beedysubjectlist', 'subId', $subId, 1); ?> </td>
<td><?php echo $LIST['Score']; ?> </td>
<td><?php echo $obt ?> </td>
<td><?php echo $LIST['Percentage']; ?> </td>
</tr>
<?php 
endforeach;
?>

</table>
</td>
</tr> </table>

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