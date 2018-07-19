
<?php 
include('../includes/system.php');

$bankId=$_GET['bankId']; 

 
$loadSession = System::loadDistinctCond1('genStdBatchId', 'beedy_exam_result', 'bankId', $bankId);  
  ?>
  <select class="form-control" id="genStdBatchId" name="genStdBatchId" onChange="getGeneralTerm(this.value)" required>
<?php 
if(!empty($loadSession)): 
?>
<option value="">Select Batch/Session</option>
<?php
foreach($loadSession as $Session): 
 
?>	
<option value="<?php echo $Session['genStdBatchId']; ?>" ><?php echo System::getColById('genstudentbatches', 'genStdBatchId', $Session['genStdBatchId'], 1);  ?></option>
<?php 
endforeach;
?>

<?php
else:
?>
<option value="">Not available</option>
<?php
endif; 
?>
</select>