<?php 
include('../includes/system.php');
$exambankId=$_GET['exambankId'];
$loadBankGrp =	$GetExam->loadBankGrp($exambankId); 

//$loadClsList = System::loadTblCond('beedyclasslist', 'exambankId', $exambankId); ?>

<select class="form-control" id="subId" name="subId" onChange="myFunction(this.value, <?php echo $exambankId; ?>);" required>
<?php 
if(!empty($loadBankGrp)): 
 
?>
<option value="">Select Course File</option>
<?php
 $i = 0;
								foreach($loadBankGrp as $Bank): 
								$i++;
							
$courseName= System::getName('beedySubjectList', 'subId', $Bank['subId'], 1);   
    $classId= System::getName('beedySubjectList', 'subId', $Bank['subId'], 2);   
  $className= System::getName('beedyClassList', 'classId', $classId, 1);  
?>	
<option value="<?php echo $Bank['subId']; ?>" ><?php echo $courseName."\t"."-"."\t".$className; ?></option>
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