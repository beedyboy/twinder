<?php 
include('../includes/system.php');
$faceId=$_GET['faceId'];
$subId=$_GET['subId']; 
$exambankId=$_GET['exambankId']; 

$bankId =	$GetExam->getName2('beedyGroupSub', 'subId', 'exambankId', $subId, $exambankId, 0);
 $_SESSION['bankId'] = $bankId;
 if($faceId==1): ?>
 <img src="templates/interfaces/face22.png" class="img-responsive" />
 <?php elseif($faceId==2):?>
  <img src="templates/interfaces/face22.png" class="img-responsive" />

  <?php elseif($faceId==3): ?>
 <img src="templates/interfaces/face33.png" class="img-responsive" />

  <?php
 endif;
 
 ?>