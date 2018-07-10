<?php 
include('../includes/system.php');
$adminId =$_POST['adminId'];
?>
<p class="alert pageGuide"> Modify Admin
<a class="btn btn-info"  data-placement="right" title="Click to Add New" href="?pid=6&action=admin/">
<i class="icon-plus-sign icon-large"></i>Add Admin</a>		</p>
<?php 
$firstName =System::getColById('systemAdmin', 'adminId', $adminId, 1);
$lastName =System::getColById('systemAdmin', 'adminId', $adminId, 2);
$email =System::getColById('systemAdmin', 'adminId', $adminId, 3);
$username =System::getColById('systemAdmin', 'adminId', $adminId, 4);
$password =System::getColById('systemAdmin', 'adminId', $adminId, 5); 
$permitId =System::getColById('systemAdmin', 'adminId', $adminId, 7); 
?>
<div  class="row">
<div class="col-md-12">
<!--Update part -->
<form id="updateAdmin" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="updateAdmin" />
<input type="hidden" name="adminId" id="adminId" value="<?php echo $adminId ?>" />
 
<div class="col-md-6">
<div class="form-group">
<label for="firstName">First Name:</label>
<input type="text" class="form-control" value="<?php echo $firstName; ?>" name="firstName" id="firstName" placeholder="Enter First Name" required>
</div>
<div class="form-group">
<label for="lastName">Last Name:</label>
<input type="text" class="form-control" value="<?php echo $lastName; ?>" name="lastName" id="lastName" placeholder="Enter Last Name" required>
</div>

<div class="form-group">
<label for="lastName">Email:</label>
<input type="email" class="form-control" value="<?php echo $email; ?>" name="email" id="email" placeholder="Enter Email" required>
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
<option value="<?php echo $PRIVILEDGE['permitId']; ?>"
<?php if($PRIVILEDGE['permitId']== $permitId): echo "selected"; endif; ?>
 ><?php echo $PRIVILEDGE['permissionGrp']; ?></option>
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
<input type="text" class="form-control" value="<?php echo $username; ?>" name="username" id="username" placeholder="Enter Username" required>
</div>
<div class="form-group">
<label for="username">Password:</label>
<input type="text" class="form-control" value="<?php echo $password; ?>" name="password" id="password" placeholder="Enter Password" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Admin </button>
<div id="update-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>

</div>
</form>
</div>
</div>