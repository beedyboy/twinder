<?php 
include('../includes/system.php');
$permitId =$_POST['permitId']; 
$loadPermit = $GetSchool->loadPermit($permitId); 
 
$permissionGrp =System::getColById('permissions', 'permitId', $permitId, 1); 

?>
<p class="alert pageGuide"> Modify <?php echo $permissionGrp; ?> Information	</p>

<?php
$top_level_permissions_admin= explode(",", $loadPermit);
//var_dump($top_level_permissions_admin);
?>
<form id="updateUserPermit" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="updateUserPermit" /> 
<input type="hidden" name="permitId" value="<?php echo $permitId; ?>" /> 
<div class="form-group">
<label for="typeName">User Type:</label>
<input type="text" class="form-control" name="permissionGrp" id="permissionGrp"
 placeholder="Enter User Type" value="<?php echo $permissionGrp; ?>" required>
</div>

<div class="form-group">
<label for="username">Permissions:</label>

 
<table class="table table-bordered  table-responsive ">
<tr class="highlight">
<td> </td>
<td></td>
<td>MODULE</td>
<td>SUB-MODULE</td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td>1</td>
<td><input type="checkbox" id="schSetAll" name="schSetAll" value="1_1,1_2,1_2a,1_2b,1_3,1_3a,1_3b" 
<?php if (in_array("1_1", $top_level_permissions_admin)
	&& in_array("1_2", $top_level_permissions_admin)
&& in_array("1_2a", $top_level_permissions_admin)
 && in_array("1_2b", $top_level_permissions_admin)
	&& in_array("1_3", $top_level_permissions_admin)
&& in_array("1_3a", $top_level_permissions_admin)
 && in_array("1_3b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> </td>
<td>School Settings</td>
<td>Institution Data</td>
<td><input type="checkbox" name="schSettings[]" value="1_1" class="schCase"
  <?php if (in_array("1_1", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>  /> Edit </td>
<td></td>
<td></td>
</tr>

<tr>
<td></td>
<td> </td>
<td></td>
<td>Manage Session</td>
<td><input type="checkbox" name="schSettings[]" value="1_2" class="schCase" 
<?php if (in_array("1_2", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
<td><input type="checkbox" name="schSettings[]" value="1_2a" class="schCase" <?php if (in_array("1_2a", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="schSettings[]" value="1_2b" class="schCase" <?php if (in_array("1_2b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>
 
</tr>

<tr>
<td></td>
<td> </td>
<td></td>
<td>Manage Term</td>
<td><input type="checkbox" name="schSettings[]" value="1_3" class="schCase" <?php if (in_array("1_3", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
<td><input type="checkbox" name="schSettings[]" value="1_3a" class="schCase" <?php if (in_array("1_3a", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="schSettings[]" value="1_3b" class="schCase" <?php if (in_array("1_3b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>
 
</tr>

<tr class="highlight">
<td> </td>
<td></td>
<td></td>
<td></td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td>2</td>
<td><input type="checkbox" id="grpAll" name="grpAll"  value="2_1,2_1a,2_1b" 
<?php if (in_array("2_1", $top_level_permissions_admin)
	&& in_array("2_1a", $top_level_permissions_admin)
	&& in_array("2_1b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> </td>
<td>Group Management</td>
 <td></td>
<td><input type="checkbox" name="grpSettings[]" value="2_1" class="grpCase" <?php if (in_array("2_1", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
<td><input type="checkbox" name="grpSettings[]" value="2_1a" class="grpCase" <?php if (in_array("2_1a", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="grpSettings[]" value="2_1b" class="grpCase" <?php if (in_array("2_1b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>
</tr>
 
 
<tr class="highlight">
<td> </td>
<td></td>
<td></td>
<td></td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td>3</td>
<td><input type="checkbox" id="clsAll" name="clsAll" value="3_1,3_1a,3_1b" 
<?php if (in_array("3_1", $top_level_permissions_admin)
	&& in_array("3_1a", $top_level_permissions_admin)
	&& in_array("3_1b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> </td>
<td>Class Management</td>
 <td></td>
<td><input type="checkbox" name="clsSettings[]" value="3_1" class="clsCase" <?php if (in_array("3_1", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
<td><input type="checkbox" name="clsSettings[]" value="3_1a" class="clsCase" <?php if (in_array("3_1a", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="clsSettings[]" value="3_1b" class="clsCase" <?php if (in_array("3_1b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>
</tr>
 
 
<tr class="highlight">
<td> </td>
<td></td>
<td></td>
<td></td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td>4</td>
<td><input type="checkbox" id="subAll" name="subAll"  value="4_1,4_1a,4_1b" 
<?php if (in_array("4_1", $top_level_permissions_admin)
	&& in_array("4_1a", $top_level_permissions_admin) && in_array("4_1b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> </td>
<td>Subject Management</td>
 <td></td>
<td><input type="checkbox" name="subSettings[]" value="4_1" class="subCase" <?php if (in_array("4_1", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
<td><input type="checkbox" name="subSettings[]" value="4_1a" class="subCase" <?php if (in_array("4_1a", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="subSettings[]" value="4_1b" class="subCase" <?php if (in_array("4_1b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>
</tr>
 

<tr class="highlight">
<td> </td>
<td></td>
<td></td>
<td></td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td>5</td>
<td><input type="checkbox" id="stdAll" name="stdAll" value="5_1,5_2,5_2a,5_2b" 
<?php if (in_array("5_1", $top_level_permissions_admin)
	&& in_array("5_2", $top_level_permissions_admin)
	&& in_array("5_2a", $top_level_permissions_admin)
	&& in_array("5_2b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> </td>
<td>Student Management</td>
 <td>Add Student</td>
<td><input type="checkbox" name="stdSettings[]" value="5_1" class="stdCase" <?php if (in_array("5_1", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
 <td> </td>
<td> </td>
</tr>
 
 <tr>
<td></td>
<td></td>
<td></td>
 <td>View Student</td>
<td><input type="checkbox" name="stdSettings[]" value="5_2" class="stdCase" <?php if (in_array("5_2", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="stdSettings[]" value="5_2a" class="stdCase" <?php if (in_array("5_2a", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Ban </td>
<td><input type="checkbox" name="stdSettings[]" value="5_2b" class="stdCase" <?php if (in_array("5_2b", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>
</tr>
 

<tr class="highlight">
<td> </td>
<td></td>
<td></td>
<td></td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td>6</td>
<td><input type="checkbox" id="admAll" name="admAll"  value="6_1,6_2,6_3" 
<?php if (in_array("6_1", $top_level_permissions_admin) 
	&& in_array("6_2", $top_level_permissions_admin)&& in_array("6_3", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> </td>
<td>Admin Management</td>
 <td></td>
<td><input type="checkbox" name="admSettings[]" value="6_1" class="admCase" <?php if (in_array("6_1", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
 <td><input type="checkbox" name="admSettings[]" value="6_2" class="admCase" <?php if (in_array("6_2", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="admSettings[]" value="6_3" class="admCase" <?php if (in_array("6_3", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>

</tr>
 
 
<tr class="highlight">
<td> </td>
<td></td>
<td></td>
<td></td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td>7</td>
<td><input type="checkbox" id="examAll" name="examAll" value="7_1,7_2,7_3,7_4,7_5,7_6" 
<?php if (in_array("7_1", $top_level_permissions_admin)
	&& in_array("7_2", $top_level_permissions_admin)
&& in_array("7_3", $top_level_permissions_admin) 
&& in_array("7_4", $top_level_permissions_admin)	
&& in_array("7_5", $top_level_permissions_admin)
	&& in_array("7_6", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> </td>
<td>Examinaion</td>
 <td>Exam Type</td>
<td><input type="checkbox" name="examSettings[]" value="7_1" class="exmCase" <?php if (in_array("7_1", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
 <td><input type="checkbox" name="examSettings[]" value="7_2" class="exmCase" <?php if (in_array("7_2", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="examSettings[]" value="7_3" class="exmCase" <?php if (in_array("7_3", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>

</tr>
 
 <tr>
<td></td>
<td></td>
<td></td>
 <td>Set Exam</td>
<td><input type="checkbox" name="examSettings[]" value="7_4" class="exmCase" <?php if (in_array("7_4", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Set Exam </td>
<td></td>
<td></td> 

</tr>
 
 <tr>
<td></td>
<td></td>
<td></td>
 <td>Exam Manager</td>
<td><input type="checkbox" name="examSettings[]" value="7_5" class="exmCase" <?php if (in_array("7_5", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Manage Exam </td>
<td></td>
<td></td> 

</tr>
 
 <tr>
<td></td>
<td></td>
<td></td>
 <td>Result</td>
<td><input type="checkbox" name="examSettings[]" value="7_6" class="exmCase" <?php if (in_array("7_6", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> View Result </td>
<td></td>
<td></td> 

</tr>
  
<tr class="highlight">
<td> </td>
<td></td>
<td></td>
<td></td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td>8</td>
<td><input type="checkbox" id="loaderAll" name="loaderAll" value="8_1,8_2,8_3,8_4,8_5,8_6" 
<?php if (in_array("8_1", $top_level_permissions_admin)
	&& in_array("8_2", $top_level_permissions_admin) 
&& in_array("8_3", $top_level_permissions_admin)
	&& in_array("8_4", $top_level_permissions_admin) 
&& in_array("8_5", $top_level_permissions_admin) && in_array("8_6", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> </td>
<td>Loader</td>
 <td>Bank Group</td>
<td><input type="checkbox" name="ldrSettings[]" value="8_1" class="ldrCase" <?php if (in_array("8_1", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
 <td><input type="checkbox" name="ldrSettings[]" value="8_2" class="ldrCase" <?php if (in_array("8_2", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="ldrSettings[]" value="8_3" class="ldrCase" <?php if (in_array("8_3", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>

</tr>
 
 
<tr>
<td></td>
<td></td>
<td></td>
 <td>Exam Bank</td>
<td><input type="checkbox" name="ldrSettings[]" value="8_4" class="ldrCase" <?php if (in_array("8_4", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Add </td>
 <td><input type="checkbox" name="ldrSettings[]" value="8_5" class="ldrCase" <?php if (in_array("8_5", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Edit </td>
<td><input type="checkbox" name="ldrSettings[]" value="8_6" class="ldrCase" <?php if (in_array("8_6", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> Delete </td>

</tr>
 
   
<tr class="highlight">
<td> </td>
<td></td>
<td></td>
<td></td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td>9</td>
<td><input type="checkbox" id="permit" name="permit" value="9_1" <?php if (in_array("9_1", $top_level_permissions_admin)): ?>
  checked <?php endif; ?>   /> </td>
<td>Permissions</td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
  
</tr>
 
</table> 
  
</div>
 

<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update User Type</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form> 
  
<!--check box selection-->
