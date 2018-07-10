<div class="row">

 <div class="col-md-10">
<div class="beedyTemplate2">
<div class="col-md-12" id="activate">
<h1 class='pageGuide'>User Type</h1>				

<form id="AddUserType" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="NewUserType" /> 
<div class="form-group">
<label for="typeName">User Type:</label>
<input type="text" class="form-control" name="permissionGrp" id="permissionGrp" placeholder="Enter User Type" required>
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
<td><input type="checkbox" id="schSetAll" name="schSetAll" value="1_1,1_2,1_2a,1_2b,1_3,1_3a,1_3b" checked /> </td>
<td>School Settings</td>
<td>Institution Data</td>
<td><input type="checkbox" name="schSettings[]" value="1_1" class="schCase" checked /> Edit </td>
<td></td>
<td></td>
</tr>

<tr>
<td></td>
<td> </td>
<td></td>
<td>Manage Session</td>
<td><input type="checkbox" name="schSettings[]" value="1_2" class="schCase" checked /> Add </td>
<td><input type="checkbox" name="schSettings[]" value="1_2a" class="schCase" checked /> Edit </td>
<td><input type="checkbox" name="schSettings[]" value="1_2b" class="schCase" checked /> Delete </td>
 
</tr>

<tr>
<td></td>
<td> </td>
<td></td>
<td>Manage Term</td>
<td><input type="checkbox" name="schSettings[]" value="1_3" class="schCase" checked /> Add </td>
<td><input type="checkbox" name="schSettings[]" value="1_3a" class="schCase" checked /> Edit </td>
<td><input type="checkbox" name="schSettings[]" value="1_3b" class="schCase" checked /> Delete </td>
 
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
<td><input type="checkbox" id="grpAll" name="grpAll"  value="2_1,2_1a,2_1b" checked /> </td>
<td>Group Management</td>
 <td></td>
<td><input type="checkbox" name="grpSettings[]" value="2_1" class="grpCase" checked /> Add </td>
<td><input type="checkbox" name="grpSettings[]" value="2_1a" class="grpCase" checked /> Edit </td>
<td><input type="checkbox" name="grpSettings[]" value="2_1b" class="grpCase" checked /> Delete </td>
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
<td><input type="checkbox" id="clsAll" name="clsAll" value="3_1,3_1a,3_1b" checked /> </td>
<td>Class Management</td>
 <td></td>
<td><input type="checkbox" name="clsSettings[]" value="3_1" class="clsCase" checked /> Add </td>
<td><input type="checkbox" name="clsSettings[]" value="3_1a" class="clsCase" checked /> Edit </td>
<td><input type="checkbox" name="clsSettings[]" value="3_1b" class="clsCase" checked /> Delete </td>
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
<td><input type="checkbox" id="subAll" name="subAll"  value="4_1,4_1a,4_1b" checked /> </td>
<td>Subject Management</td>
 <td></td>
<td><input type="checkbox" name="subSettings[]" value="4_1" class="subCase" checked /> Add </td>
<td><input type="checkbox" name="subSettings[]" value="4_1a" class="subCase" checked /> Edit </td>
<td><input type="checkbox" name="subSettings[]" value="4_1b" class="subCase" checked /> Delete </td>
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
<td><input type="checkbox" id="stdAll" name="stdAll" value="5_1,5_2,5_2a,5_2b" checked /> </td>
<td>Student Management</td>
 <td>Add Student</td>
<td><input type="checkbox" name="stdSettings[]" value="5_1" class="stdCase" checked /> Add </td>
 <td> </td>
<td> </td>
</tr>
 
 <tr>
<td></td>
<td></td>
<td></td>
 <td>View Student</td>
<td><input type="checkbox" name="stdSettings[]" value="5_2" class="stdCase" checked /> Edit </td>
<td><input type="checkbox" name="stdSettings[]" value="5_2a" class="stdCase" checked /> Ban </td>
<td><input type="checkbox" name="stdSettings[]" value="5_2b" class="stdCase" checked /> Delete </td>
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
<td><input type="checkbox" id="admAll" name="admAll"  value="6_1,6_2,6_3" checked /> </td>
<td>Admin Management</td>
 <td></td>
<td><input type="checkbox" name="admSettings[]" value="6_1" class="admCase" checked /> Add </td>
 <td><input type="checkbox" name="admSettings[]" value="6_2" class="admCase" checked /> Edit </td>
<td><input type="checkbox" name="admSettings[]" value="6_3" class="admCase" checked /> Delete </td>

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
<td><input type="checkbox" id="examAll" name="examAll" value="7_1,7_2,7_3,7_4,7_5,7_6" checked /> </td>
<td>Examinaion</td>
 <td>Exam Type</td>
<td><input type="checkbox" name="examSettings[]" value="7_1" class="exmCase" checked /> Add </td>
 <td><input type="checkbox" name="examSettings[]" value="7_2" class="exmCase" checked /> Edit </td>
<td><input type="checkbox" name="examSettings[]" value="7_3" class="exmCase" checked /> Delete </td>

</tr>
 
 <tr>
<td></td>
<td></td>
<td></td>
 <td>Set Exam</td>
<td><input type="checkbox" name="examSettings[]" value="7_4" class="exmCase" checked /> Set Exam </td>
<td></td>
<td></td> 

</tr>
 
 <tr>
<td></td>
<td></td>
<td></td>
 <td>Exam Manager</td>
<td><input type="checkbox" name="examSettings[]" value="7_5" class="exmCase" checked /> Manage Exam </td>
<td></td>
<td></td> 

</tr>
 
 <tr>
<td></td>
<td></td>
<td></td>
 <td>Result</td>
<td><input type="checkbox" name="examSettings[]" value="7_6" class="exmCase" checked /> View Result </td>
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
<td><input type="checkbox" id="loaderAll" name="loaderAll" value="8_1,8_2,8_3,8_4,8_5,8_6" checked /> </td>
<td>Loader</td>
 <td>Bank Group</td>
<td><input type="checkbox" name="ldrSettings[]" value="8_1" class="ldrCase" checked /> Add </td>
 <td><input type="checkbox" name="ldrSettings[]" value="8_2" class="ldrCase" checked /> Edit </td>
<td><input type="checkbox" name="ldrSettings[]" value="8_3" class="ldrCase" checked /> Delete </td>

</tr>
 
 
<tr>
<td></td>
<td></td>
<td></td>
 <td>Exam Bank</td>
<td><input type="checkbox" name="ldrSettings[]" value="8_4" class="ldrCase" checked /> Add </td>
 <td><input type="checkbox" name="ldrSettings[]" value="8_5" class="ldrCase" checked /> Edit </td>
<td><input type="checkbox" name="ldrSettings[]" value="8_6" class="ldrCase" checked /> Delete </td>

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
<td><input type="checkbox" id="permit" name="permit" value="9_1" checked /> </td>
<td>Permissions</td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
  
</tr>
 
</table> 
 
</div>
 

<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Save User Type</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
</div>
 
<div class="clearfix"></div>

</div>
</div>

<div class="col-md-2" >
<div class="rightContainer cbt-2-right">
<?php
include( TEMPLATES_PATH . DS . 'layouts' . DS . "rightContent.php");
	
?>
</div> 
</div>

</div>


 