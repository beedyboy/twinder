<?php 
include('../includes/system.php');

$exambankId=$_GET['exambankId'];  

$loadSubject = System::loadTblCond('beedygroupsub', 'exambankId', $exambankId);  
  ?>
  <select class="form-control" id="bankId" name="gbankId" onChange="getGroupBatch(this.value)" required>
<?php 
if(!empty($loadSubject)): 
?>
<option value="">Select Subject/Course</option>
<?php
foreach($loadSubject as $Subject): 
 
?>	
<option value="<?php echo $Subject['bankId']; ?>" ><?php echo System::getColById('beedysubjectlist', 'subId', $Subject['subId'], 1);  ?></option>
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