<?php
include('../includes/system.php');
	$loadExamType =	$GetSchool->loadBankGroup();
$loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
?>
<div class="row">
<div class="col-md-12 ">
<?php if(!empty($loadExamType)): ?>
<?php 
echo "Groups(".count($loadExamType).")";
	echo "<br /><hr style=\"margin:2px;  border-bottom:5px solid #C7E282;\">";
								$i = 0;
								foreach($loadExamType as $Grp): 
								$i++;
								?>
								
<div class="row">
<div class="col-md-6">	
  				
<a href="?pid=3&action=viewGrp&exambankId=<?php echo $Grp['exambankId']; ?>">
<img src="images/db.ico" class="img-circle" height="25" /><?php echo $Grp['bankName']; ?> 
 </a> 	</div>
<div class="col-md-2"> 
<button class="btn btn-warning" type="button"  title="Click to Edit Group name" id="<?php echo $Grp['exambankId']; ?>" onclick="<?php if (in_array("8_2", $area_privilege)): ?>editGroup(this.id) <?php else: ?>showError() <?php endif; ?>;" ><i class="icon_pencil"></i>&nbsp;</button>

</div><div class="col-md-2">	
<button type="button" id="<?php echo $Grp['exambankId']; ?>" onclick="<?php if (in_array("8_3", $area_privilege)): ?>deleteGroup(this.id)<?php else: ?>showError() <?php endif; ?>;"  class="btn btn-danger delete" data-placement="right" title="Click to Delete <?php echo $Grp['bankName']; ?>">
<i class="icon_trash icon-small"></i>&nbsp;</button>
	</div>
	
</div>
<hr style="margin:2px; border-bottom:5px solid #C7E282;">
 <?php endforeach; ?> 
<?php
else:
echo "Exam bank group is empty";

endif;

?>			

 
</div>
</div>
 