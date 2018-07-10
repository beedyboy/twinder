<?php 
include('../includes/system.php');
$exambankId = $_REQUEST['exambankId'];
$loadBankGrp =	$GetExam->loadBankGrp($exambankId); 
$loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
?>
<div class="row">
<div class="col-md-12 ">
<?php if(!empty($loadBankGrp)): ?>
<?php 
echo "<div class='black-img-white'>". System::getName('beedyGroup', 'exambankId', $exambankId, 1). "(".count($loadBankGrp).")"."</div>";
	echo "<br /><hr style=\"margin:2px;  border-bottom:5px solid #C7E282;\">";
								$i = 0;
								foreach($loadBankGrp as $Bank): 
								$i++;
								?>
								
<div class="row">
<div class="col-md-9">	 

<a href="?pid=4&action=viewBank&Loader=<?php if (in_array("8_5", $area_privilege)): ?>loadQuestions/<?php  else: echo "error-404"; endif;  ?>&bankId=<?php echo $Bank['bankId']; ?>&exambankId=<?php echo $exambankId; ?>">
<img src="images/document-open.ico" class="img-circle" height="25" />
 
<?php $courseName= System::getName('beedySubjectList', 'subId', $Bank['subId'], 1);   
    $classId= System::getName('beedySubjectList', 'subId', $Bank['subId'], 2);   
  $className= System::getName('beedyClassList', 'classId', $classId, 1);   
echo  $courseName."\t"."-"."\t".$className; ?> 
 </a> 	</div><div class="col-md-2">	
<button type="button" id="<?php echo $Bank['bankId']; ?>" onclick="<?php if (in_array("8_6", $area_privilege)): ?>deleteBankGroup(this.id) <?php else: ?>showError() <?php endif; ?>";  class="btn btn-danger delete" data-placement="right" title="Click to Delete">
<i class="icon_trash icon-small"></i></button>
	</div>
	
</div>
<hr style="margin:2px; border-bottom:5px solid #C7E282;">
 <?php endforeach; ?> 
<?php
else:
echo "<span class='btn alert-danger'>Bank Group is empty</span>";

endif;

?>			


</div>
</div>
 