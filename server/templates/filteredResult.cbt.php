 
<?php  
$stdAddNum=$_GET['stdAddNum'];
$resultId=$_GET['resultId']; 
//$classId=8;

$A=3;
$B=4;
$C=5;
$D=6;
	 
 $bankId  = System::getName('beedy_exam_result', 'resultId', $resultId,1); 
 $Score  = System::getName('beedy_exam_result', 'resultId', $resultId,5); 
 $Percentage  = System::getName('beedy_exam_result', 'resultId', $resultId,6); 
 $Date  = System::getName('beedy_exam_result', 'resultId', $resultId,7); 
 $Given  = System::getName('beedy_exam_result', 'resultId', $resultId,8); 
 $question  = System::getName('beedy_exam_result', 'resultId', $resultId,9); 
 $answer  = System::getName('beedy_exam_result', 'resultId', $resultId,10); 
 
 $questionGiven = explode(',',$Given);
 $stdViewed = explode(',',$question);
 $answers = explode(',',$answer);
 
 $questionGivenSize= count($questionGiven);

// var_dump($answers);
 $Mark = System::getName('beedygroupsub', 'bankId',$bankId,8);
 $Total_Question = System::getName('beedygroupsub', 'bankId',$bankId,7);
 $obt = $Total_Question * $Mark; 
  
$subId = System::getName('beedygroupsub', 'bankId',$bankId,1);
 ?>
 
 <div class="row" class="submitForm">
 

<div class="col-md-12">
<h1 class='pageGuide'><center>Result Table</center></h1>	
<div class="chart-container innerMain-left innerMain-right">
  
<table class="table table-bordered table-responsive">
<tr>
<th>Full Name</th>
<th>Subject</th>
<th>Score</th>
<th>Obtainable</th>
<th>Percentage(%)</th> 
</tr>
 
<tr>
<td>
<?php 
 echo $full_name = System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1)."\t".
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 2)."\t". 
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 3);  ?> </td>
<td><?php echo $js= System::getName('beedySubjectList', 'subId', $subId, 1); ?> </td>
<td><?php echo $Score; ?> </td>
<td><?php echo $obt ?> </td>
<td><?php echo $Percentage; ?> </td>
 
</tr> 

</table>
 
 <h1 class='pageGuide'><center>Answer Review</center></h1>
	
<table class="table table-bordered table-striped">
<tr>
<td>
<div id='resultView'>
<table class="table table-striped table-bordered">
<tr style="background-color: rgb(128,0,0);background: rgb(255,0,0);  color: rgb(255);">
<th>Question</th> 
<th>Viewed?</th>
<th>Selected Option</th>
<th>Right Option</th>
<th>Mark</th> 
</tr>		
	
<?php
for($i=0; $i<$questionGivenSize; $i++){
	?>
	
<tr>
<td><?php echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],1); ?> </td>

<th><?php if (in_array($questionGiven[$i], $stdViewed)): echo "YES"; else: echo "NO"; endif; ?> </th>
<th><?php  if(array_key_exists($i,$answers)): $selected = $answers[$i]; else: $selected = NULL;  endif; 

if($selected !=Null): echo "(".$selected.").\t"; endif;
switch ($selected) {
case "A":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$A);
	break;
case "B":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$B);
	break;
case "C":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$C);
	break;
case "D":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$D);
	break; 
default:
	echo "-";
	
} 
 ?>

</th>

<th><?php $rightOpt = System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],7); 
echo "(".$rightOpt.").\t";
switch ($rightOpt) {
case "A":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$A);
	break;
case "B":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$B);
	break;
case "C":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$C);
	break;
case "D":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$D);
	break;
default:
	echo null;
	
} ?> </th>
<th><?php if ($selected === $rightOpt): echo "&#10004"; else: echo "&#10060"; endif; ?></th> 	
	
	
</tr>
	<?php }

?>
 
</table>
</div>
</td>
</tr>


<tr style="background: rgb(255,0,0); color: rgb(255);">
<td colspan="2">
 <input type="hidden" name="exambankId" class="exambankId<?php echo $stdAddNum; ?>"  value="<?php echo $exambankId; ?>" />
 <input type="hidden" name="resultId" class="resultId<?php echo $stdAddNum; ?>"  value="<?php echo $resultId; ?>" />
<input type="hidden" name="genStdBatchId"  class="genStdBatchId<?php echo $stdAddNum; ?>" value="<?php echo $genStdBatchId; ?>" />
 
<span class="pull-right"> 

<button  id="filteredResultPDF"  class='demo' fn="<?php echo $head = $full_name."\t"."-".$js."\t"."-";
  $filename = $head.".doc";?>" >
<img src="images/pdfR.png" height="40px"  class="img-rounded" title="Export to PDF" />
</button>
 <button id="<?php echo $stdAddNum; ?>" class="resFilExpDoc" >
<img src="images/Word-icon.png"  height="40px" class="img-rounded" title="Export to Word Document" />
</button>
</span>
</td>
</tr>
	</div>
		
</div>

</div>
 	
 
  
<script type="text/javascript">
$(document).ready( function() { 
$('.indExpCsv').click( function() {
var stdAddNum = $(this).attr("id"); 
var genStdBatchId = $('.genStdBatchId'+stdAddNum).val();
var SchoolTermId = $('.SchoolTermId'+stdAddNum).val(); 

 window.open("templates/stdExportCsv.php?stdAddNum="+stdAddNum+'&genStdBatchId='+genStdBatchId+'&SchoolTermId='+SchoolTermId, '_blank');
 });	 
   
  
});				
</script>