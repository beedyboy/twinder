 <?php
 include('../includes/system.php');
 if(isset($_POST['action']) == "getResultLog"){ 
 //echo $GetSchool->getResultLog($_POST); 
 $type = $_POST['type'];
 //echo "Hello";
 
 if($type=="individual") {
	 
	  $stdAddNum=$_POST['stdAddNum']; 
	  $genStdBatchId=$_POST['genStdBatchId']; 
	  $SchoolTermId=$_POST['SchoolTermId']; 
 //$resultInds  = Examination::resultInd($stdAddNum,$genStdBatchId,$SchoolTermId);
 $resultInd  = Examination::resultInd($stdAddNum,$genStdBatchId,$SchoolTermId);
  
if(!empty($resultInd)): ?>

<table class="table table-striped table-bordered">
<tr>
<td>
<table class="table table-striped table-bordered">
<tr>
<th>Student ID</th>
<td><?php echo $stdAddNum; ?></td>
</tr>

<tr>
<th>Session</th>
<td><?php echo  System::getName('genstudentbatches', 'genStdBatchId',$genStdBatchId,1); ?></td>
</tr>

<tr>
<th>Term</th>
<td><?php echo  System::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1); ?></td>
</tr>

</table>
</td>

<td>
<table class="table table-striped table-bordered">
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
</tr>
<tr>
<td colspan="2">
 <input type="hidden" name="SchoolTermId" class="SchoolTermId<?php echo $stdAddNum; ?>"  value="<?php echo $SchoolTermId; ?>" />
<input type="hidden" name="genStdBatchId"  class="genStdBatchId<?php echo $stdAddNum; ?>" value="<?php echo $genStdBatchId; ?>" />
 
<span class="pull-right">  
<a href='templates/stdExportPDF.php?stdAddNum=<?php echo $stdAddNum; ?>&SchoolTermId=<?php echo $SchoolTermId; ?>&genStdBatchId=<?php echo $genStdBatchId; ?>' target='_blank' class='demo'>
<img src="images/pdfR.PNG" id="<?php echo $stdAddNum; ?>"  height="40px"  class="img-rounded" title="Export to PDF" />
</a>
<img src="images/csvR.PNG" id="<?php echo $stdAddNum; ?>" height="40px" class="img-rounded indExpCsv" title="Export to CSV" />
 <a>
<img src="images/Word-icon.png" id="<?php echo $stdAddNum; ?>"   height="40px" class="img-rounded indExpDoc" title="Export to Word Document" />
</a>
</span>
</td>
</tr>
</table>

<?php else: ?>
<h3> Record not found </h3>

<?php
endif; 
 
 }
	 
 else if($type=="class") { 
	  $bankId=$_POST['cbankId']; 
	  $genStdBatchId=$_POST['genStdBatchId']; 
	  $SchoolTermId=$_POST['SchoolTermId']; 
	  
	   $resultClass  = Examination::resultClass($bankId,$genStdBatchId,$SchoolTermId);
 
 $subId = System::getColById('beedygroupsub', 'bankId', $bankId, 1); 
 $classId = System::getColById('beedysubjectlist', 'subId', $subId, 2); 
   System::getColById('beedyclasslist', 'classId', $classId, 1)."\t"
 .System::getColById('beedysubjectlist', 'subId', $subId, 1); 
   
   
if(!empty($resultClass)): ?>

<table class="table table-striped table-bordered">
<tr>
<td>

<?php echo  System::getName('genstudentbatches', 'genStdBatchId',$genStdBatchId,1)."\t"; ?> 
<?php echo  System::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1)."\t"; ?> 
 <b>(<?php echo System::getColById('beedyclasslist', 'classId', $classId, 1)."\t"
 .System::getColById('beedysubjectlist', 'subId', $subId, 1); 
  ?>)
 </b> 
  
</td>
</tr>
<tr> 
<td>
<table class="table table-striped table-bordered">
<tr>
<th>Full Name</th>
<th>Subject</th>
<th>Score</th>
<th>Obtainable</th>
<th>Percentage(%)</th>
</tr>

<?php
foreach($resultClass as $LIST): 
$bankId = $LIST['bankId']; 
$subId = System::getName('beedygroupsub', 'bankId',$bankId,1);
 $Total_Question = System::getName('beedygroupsub', 'bankId',$bankId,7);
 $Mark = System::getName('beedygroupsub', 'bankId',$bankId,8);
 $obt = $Total_Question * $Mark;
 $stdAddNum =  $LIST['stdAddNum'];
?>
<tr>
<td>
<?php 
 echo System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1)."\t".
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 2)."\t". 
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 3);  ?> </td>
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
</tr>


<tr>
<td colspan="2">
 <input type="hidden" name="SchoolTermId" class="SchoolTermId<?php echo $bankId; ?>"  value="<?php echo $SchoolTermId; ?>" />
<input type="hidden" name="genStdBatchId"  class="genStdBatchId<?php echo $bankId; ?>" value="<?php echo $genStdBatchId; ?>" />
 
<span class="pull-right">  
<a href='templates/clsExportPDF.php?bankId=<?php echo $bankId; ?>&SchoolTermId=<?php echo $SchoolTermId; ?>&genStdBatchId=<?php echo $genStdBatchId; ?>' target='_blank' class='demo'>
<img src="images/pdfR.PNG" id="<?php echo $bankId; ?>"  height="40px"  class="img-rounded" title="Export to PDF" />
</a>
<img src="images/csvR.PNG" id="<?php echo $bankId; ?>" height="40px" class="img-rounded clsExpCsv" title="Export to CSV" />
 <a>
<img src="images/Word-icon.png" id="<?php echo $bankId; ?>"   height="40px" class="img-rounded clsExpDoc" title="Export to Word Document" />
</a>
</span>
</td>
</tr>
</table>

<?php else: ?>
<h3> Record not found </h3>

<?php
endif;  
 //class
 
 }
  
 else if($type=="group") { 
	  $exambankId=$_POST['exambankId']; 
	   $bankId=$_POST['gbankId']; 
	  $genStdBatchId=$_POST['genStdBatchId']; 
	  $SchoolTermId=$_POST['SchoolTermId']; 
	  
	   $resultClass  = Examination::resultClass($bankId,$genStdBatchId,$SchoolTermId);
 
 $subId = System::getColById('beedygroupsub', 'bankId', $bankId, 1); 
 $classId = System::getColById('beedysubjectlist', 'subId', $subId, 2); 
   System::getColById('beedyclasslist', 'classId', $classId, 1)."\t"
 .System::getColById('beedysubjectlist', 'subId', $subId, 1); 
   
   
if(!empty($resultClass)): ?>

<table class="table table-striped table-bordered">
<tr>
<td>

<?php  
 echo System::getColById('beedygroup', 'exambankId', $exambankId, 1)."\t"."-";  
 echo  System::getName('genstudentbatches', 'genStdBatchId',$genStdBatchId,1)."\t"; ?> 
<?php echo  System::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1)."\t"; ?> 
 <b>(<?php echo System::getColById('beedyclasslist', 'classId', $classId, 1)."\t"
 .System::getColById('beedysubjectlist', 'subId', $subId, 1); 
  ?>)
 </b> 
  
</td>
</tr>
<tr> 
<td>
<table class="table table-striped table-bordered">
<tr>
<th>Full Name</th>
<th>Subject</th>
<th>Score</th>
<th>Obtainable</th>
<th>Percentage(%)</th>
<th>View</th>
</tr>

<?php
foreach($resultClass as $LIST): 
$bankId = $LIST['bankId']; 
$subId = System::getName('beedygroupsub', 'bankId',$bankId,1);
 $Total_Question = System::getName('beedygroupsub', 'bankId',$bankId,7);
 $Mark = System::getName('beedygroupsub', 'bankId',$bankId,8);
 $obt = $Total_Question * $Mark;
 $stdAddNum =  $LIST['stdAddNum'];
?>
<tr>
<td>
<?php 
 echo System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1)."\t".
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 2)."\t". 
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 3);  ?> </td>
<td><?php echo System::getName('beedysubjectlist', 'subId', $subId, 1); ?> </td>
<td><?php echo $LIST['Score']; ?> </td>
<td><?php echo $obt ?> </td>
<td><?php echo $LIST['Percentage']; ?> </td>
<td><a  href="?pid=22&action=Examination&sub=filteredResult/&stdAddNum=<?php echo $LIST['stdAddNum']; ?>&resultId=<?php echo $LIST['resultId']; ?>" target="_blank"  title="Click to view"
 
 class="btn btn-info">View</a> </td>
</tr>
<?php 
endforeach;
?>

</table>
</td>
</tr>


<tr>
<td colspan="2">
 <input type="hidden" name="exambankId" class="exambankId<?php echo $bankId; ?>"  value="<?php echo $exambankId; ?>" />
 <input type="hidden" name="SchoolTermId" class="SchoolTermId<?php echo $bankId; ?>"  value="<?php echo $SchoolTermId; ?>" />
<input type="hidden" name="genStdBatchId"  class="genStdBatchId<?php echo $bankId; ?>" value="<?php echo $genStdBatchId; ?>" />
 
<span class="pull-right">  
<a href='templates/grpExportPDF.php?bankId=<?php echo $bankId; ?>&exambankId=<?php echo $exambankId; ?>&SchoolTermId=<?php echo $SchoolTermId; ?>&genStdBatchId=<?php echo $genStdBatchId; ?>' target='_blank' class='demo'> 
<img src="images/pdfR.PNG" id="<?php echo $bankId; ?>"  height="40px"  class="img-rounded" title="Export to PDF" />
</a>
<img src="images/csvR.PNG" id="<?php echo $bankId; ?>" height="40px" class="img-rounded grpExpCsv" title="Export to CSV" />
 <a>
<img src="images/Word-icon.png" id="<?php echo $bankId; ?>"   height="40px" class="img-rounded grpExpDoc" title="Export to Word Document" />
</a>
</span>
</td>
</tr>
</table>

<?php else: ?>
<h3> Record not found </h3>

<?php
endif;  
 //class
 
 } 
// echo $type;
 }
 
 ?> 
 
 <script>
 var popOutWindow = null;
  function filterViewedResult(stdAddNum,resultId){
	  //window.open("", "", "status=1, toolbar=0"); 
	 // popOutWindow =window.open('filterViewedResult.php?stdAddNum=' + stdAddNum,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
	  popOutWindow =window.open('templates/filteredResult.cbt.php?action=Examination'+'&sub=filteredResult/'+'&stdAddNum='+stdAddNum+'&resultId='+resultId,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");

  }
	 
	  </script>
<script type="text/javascript">
$(document).ready( function() {


$('.indExpCsv').click( function() {
var stdAddNum = $(this).attr("id"); 
var genStdBatchId = $('.genStdBatchId'+stdAddNum).val();
var SchoolTermId = $('.SchoolTermId'+stdAddNum).val(); 

 window.open("templates/stdExportCsv.php?stdAddNum="+stdAddNum+'&genStdBatchId='+genStdBatchId+'&SchoolTermId='+SchoolTermId, '_blank');
 });	 
 

$('.indExpDoc').click( function() {
var stdAddNum = $(this).attr("id"); 
var genStdBatchId = $('.genStdBatchId'+stdAddNum).val();
var SchoolTermId = $('.SchoolTermId'+stdAddNum).val(); 

 window.open("templates/stdExportDoc.php?stdAddNum="+stdAddNum+'&genStdBatchId='+genStdBatchId+'&SchoolTermId='+SchoolTermId, '_blank');
 });	 


$('.clsExpCsv').click( function() {
var bankId = $(this).attr("id"); 
var genStdBatchId = $('.genStdBatchId'+bankId).val();
var SchoolTermId = $('.SchoolTermId'+bankId).val(); 

 window.open("templates/clsExportCsv.php?bankId="+bankId+'&genStdBatchId='+genStdBatchId+'&SchoolTermId='+SchoolTermId, '_blank');
 });	 

$('.clsExpDoc').click( function() { 
var bankId = $(this).attr("id"); 
var genStdBatchId = $('.genStdBatchId'+bankId).val();
var SchoolTermId = $('.SchoolTermId'+bankId).val(); 

 window.open("templates/clsExportDoc.php?bankId="+bankId+'&genStdBatchId='+genStdBatchId+'&SchoolTermId='+SchoolTermId, '_blank');
 });	 

 

$('.grpExpCsv').click( function() {
var bankId = $(this).attr("id"); 
var exambankId = $('.exambankId'+bankId).val();
var genStdBatchId = $('.genStdBatchId'+bankId).val();
var SchoolTermId = $('.SchoolTermId'+bankId).val(); 

 window.open("templates/grpExportCsv.php?bankId="+bankId+'&exambankId='+exambankId+'&genStdBatchId='+genStdBatchId+'&SchoolTermId='+SchoolTermId, '_blank');
 });	 

$('.grpExpDoc').click( function() { 
var bankId = $(this).attr("id"); 
var exambankId = $('.exambankId'+bankId).val();
var genStdBatchId = $('.genStdBatchId'+bankId).val();
var SchoolTermId = $('.SchoolTermId'+bankId).val(); 

 window.open("templates/grpExportDoc.php?bankId="+bankId+'&exambankId='+exambankId+'&genStdBatchId='+genStdBatchId+'&SchoolTermId='+SchoolTermId, '_blank');
 });	 

 

  
});				
</script>