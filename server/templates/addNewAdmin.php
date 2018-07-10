 <?php 
include('../includes/system.php');
?>
<form id="addAdmin" class="submitForm"  enctype="multipart/form-data" role="form" action="#"> 
<div class="col-md-12"> 
<input type="hidden" name="action" value="addAdmin" />

<div class="col-md-12">
<div class="form-group">
<div id="reg_photo" role="img"><img id="previewing" src="images/nophoto.jpg" width="150px" />
</div>
<label for="photo">Photo:</label>
<input type="file" class="form-control" name="photo" id="photo" placeholder="Enter your Photo" required>
</div>	
</div>	
<div class="col-md-6">

<div class="form-group">
<label for="firstName">First Name:</label>
<input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter First Name" required>
</div>
<div class="form-group">
<label for="lastName">Last Name:</label>
<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter Last Name" required>
</div>
<div class="form-group">
<label for="lastName">Email:</label>
<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
</div>

</div>
<div class="col-md-6">

<?php $loadPermission = $GetSchool->loadPermission(); ?>
<div class="form-group">
<label for="groupId">User Type:</label>
<?php 
if(!empty($loadPermission)): 
?>
<select class="form-control" id="permitId" name="permitId" required>
<option value="">Select Type </option>
<?php
foreach($loadPermission as $PRIVILEDGE):
?>	
<option value="<?php echo $PRIVILEDGE['permitId']; ?>" ><?php echo $PRIVILEDGE['permissionGrp']; ?></option>
<?php 
endforeach;
?>
</select>
<?php
endif; 
?>
</div>

<div class="form-group">
<label for="username">Username:</label>
<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
</div>
<div class="form-group">
<label for="username">Password:</label>
<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
</div>
 

<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Save Admin</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>

</div>
</div>
</form>
  