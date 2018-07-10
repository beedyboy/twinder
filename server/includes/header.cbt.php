<?php 
 
$loadSchoolData = $GetSchool->loadSchoolData();
 
?>
 	 
<?php 
	$i = 0;
	foreach($loadSchoolData as $schoolData): 
	$i++;
	
 
?>
	<div class="topviewtab"> 
 
<div class="row">
<div class="col-md-2">
<img src="../<?php echo $schoolData['beedySchoolLogo']; ?>" alt="<?php echo $schoolData['beedySchoolName']; ?>" class="img-rounded" width="140" height="140" >
</div>
<div class="col-offset-2 col-md-8">
<div class="row">
<div class="col-md-12">
<?php echo $schoolData['beedySchoolName']; ?>
</div>
<div class="col-offset-2 col-md-10">
<?php  echo $schoolData['beedySchoolMotto'];   ?>
</div>
</div>
</div>
</div>

</div> 

  <?php endforeach; ?> 