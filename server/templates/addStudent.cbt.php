
<div class="row"> 
<div class="col-md-12" id="activate">
<h1 class='pageGuide'>Add Student</h1>				

<form id="beedyStudentRegForm" class="submitForm"  enctype="multipart/form-data" role="form" action="#">
  
<input type="hidden" name="action" value="addStudent" /> 
<div class="col-md-6">

<h2 class="pageGuide">
<i class="fa fa-info-circle"></i> Personal Details	</h2>
<div class="form-group">
<div id="reg_photo" role="img"><img id="previewing" src="images/nophoto.jpg" width="150px" />
</div>
<label for="photo">Photo:</label>
<input type="file" class="form-control" name="photo" id="photo" placeholder="Enter your Photo" required>
</div>	
<div class="form-group">
<label for="stdSurname">Surname:</label>
<input type="text" class="form-control" name="stdSurname" id="stdSurname" placeholder="Enter Surname" required>
</div>
<div class="form-group">
<label for="stdFirstName">First Name:</label>
<input type="text" class="form-control" name="stdFirstName" id="stdFirstName" placeholder="Enter First Name" required>
</div>
<div class="form-group">
<label for="stdMiddleName">Middle Name:</label>
<input type="text" class="form-control" name="stdMiddleName" id="stdMiddleName" placeholder="Enter Middle Name" required>
</div>
<div class="form-group">
<label for="stdDob">DOB:</label>
<input type="date"  class="form-control" name="stdDob" id="stdDob" placeholder="Enter Date of Birth" required>
</div>

<div class="form-group">
<label for="stdGender">Gender:</label>
<select class="form-control" id="stdGender" name="stdGender" required>
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>

<div class="col-md-6">	

<h2 class="pageGuide">
<i class="fa fa-info-circle"></i> School Details	</h2>
<?php $loadStudentGroup = System::loadDistinct('groupId','beedyStdGroup'); ?>
<div class="form-group">
<label for="groupId">Group Name:</label>
<?php 
if(!empty($loadStudentGroup)): 
?>
<select class="form-control" id="groupIdSelect" name="groupId" required>
<option value="">Select Group </option>
<?php
foreach($loadStudentGroup as $Group):
?>	
<option value="<?php echo $Group['groupId']; ?>" ><?php echo System::getColById('beedystdgroup', 'groupId', $Group['groupId'], 1); ?></option>
<?php 
endforeach;
?>
</select>
<?php
endif; 
?>
</div>
<div class="form-group">
<label for="classList">Class Name:</label>
<div id="classList">
<select class="form-control" id="classId" name="classId" required>
<option value="">Select Group First</option>
</select>
</div>
</div>
 
<div class="form-group">
<label for="gender">Session/Batch:</label>
<?php 
$loadStudentBatches = $GetSchool->loadStudentBatches();
if(!empty($loadStudentBatches)): ?>
<select class="form-control" id="genStdBatchId" name="genStdBatchId" required>
<option value="">Select Batch</option>
<?php $i = 0; foreach($loadStudentBatches as $stdBatch): 
$i++; ?>
<option value="<?php echo $stdBatch['genStdBatchId']; ?>"><?php echo $stdBatch['genStdBatchesYear']; ?></option>
<?php endforeach; ?> 
</select>
<?php endif; ?>
</div>

<h2 class="pageGuide">
<i class="fa fa-info-circle"></i> Login Details	</h2> 
<div class="form-group">
<label for="stdEmail">Email:</label>
<input type="email"  class="form-control" name="stdEmail" id="stdEmail" placeholder="Enter Email" required>
</div>

<div class="form-group">
<label for="username">Usename:</label>
<input type="text"  class="form-control" name="username" id="username" placeholder="Enter Usename" required>
</div>
<div class="form-group">
<label for="password">Password:</label>
<input type="password"  class="form-control" name="password" id="password" placeholder="Enter Password" required>
</div>


<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Save Student</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</div>

</form>
</div> 
 
</div>
