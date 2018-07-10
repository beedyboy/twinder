<?php 
$loadSchoolData = $GetSchool->loadSchoolData();
 
$_SESSION['hover'] = "";
?> 
<?php 
$i = 0;
foreach($loadSchoolData as $schoolData): 
$i++;
$beedySchoolName= $schoolData['beedySchoolName'];
$beedySchoolLogo= $schoolData['beedySchoolLogo'];
$beedySchoolMotto= $schoolData['beedySchoolMotto'];
$beedySchoolAddress= $schoolData['beedySchoolAddress'];
$beedySchoolEmail= $schoolData['beedySchoolEmail'];
$beedySchoolPhoneNum= $schoolData['beedySchoolPhoneNum'];
$beedySchoolWebsite= $schoolData['beedySchoolWebsite'];
$CurrentSession= $schoolData['CurrentSession'];
$CurrentSemester= $schoolData['CurrentTerm'];
endforeach;
?>

<div  class="row">
 
<div class="col-md-12">
 <h1 class='pageGuide'>Institution Data </h1>				

<form id="systemData" class="submitForm"  enctype="multipart/form-data" role="form" action="#">
<input type="hidden" name="action" value="updatesystemData" />
<div class="form-group">
<label for="schoolName">School Name:</label>
<input type="text" class="form-control" name="beedySchoolName" id="beedySchoolName" value="<?php echo $beedySchoolName; ?>" placeholder="Enter School Name" required>
</div>
<div class="form-group">
<label for="beedySchoolMotto">School Motto:</label>
<input type="text" class="form-control" name="beedySchoolMotto" id="beedySchoolMotto"  value="<?php echo $beedySchoolMotto; ?>" placeholder="Enter School Motto" required>
</div>
<div class="form-group">
<label for="site_Title">School Address:</label>
<input type="text" class="form-control" name="beedySchoolAddress" id="beedySchoolAddress"  value="<?php echo $beedySchoolAddress; ?>" placeholder="Enter School Address">
</div>
<div class="form-group">
<label for="schoolEmail">Email:</label>
<input type="email" class="form-control" name="beedySchoolEmail" id="beedySchoolEmail"  value="<?php echo $beedySchoolEmail; ?>" placeholder="Enter School Email" required>
</div>
<div class="form-group">
<label for="beedySchoolPhoneNum">Phone Number:</label>
<input type="text" class="form-control" name="beedySchoolPhoneNum" id="beedySchoolPhoneNum"  value="<?php echo $beedySchoolPhoneNum; ?>" placeholder="Enter School Phone Number" required>
</div>
<div class="form-group">
<label for="beedySchoolWebsite">School Website:</label>
<input type="text" class="form-control" name="beedySchoolWebsite" id="beedySchoolWebsite"  value="<?php echo $beedySchoolWebsite; ?>" placeholder="Enter School Website" >
</div>
<div class="form-group">
<label for="photo">Photo:</label>
<input type="file" class="form-control" name="photo" id="photo"  value="<?php echo $beedySchoolLogo; ?>" placeholder="Enter your Photo">
</div>
<?php if (in_array("1_1", $area_privilege)): ?>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success"><i class="icon-save icon-large"></i>&nbsp;Update Data</button>
<div id="update-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
<?php endif; ?>
</form>
 
</div>

</div>