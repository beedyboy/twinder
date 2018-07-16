<?php 
 include('dataTable.php'); 
include('../includes/system.php');
$loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
$loadStudentProfile = $GetStudent->loadStudentProfile();
?> 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>Student No</th>
<th>Full Name</th>
<th>Gender</th>
	<!-- ie<th>Group</th> favicon -->
	
<th>Class</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($loadStudentProfile)): ?>
<?php 
$i = 0;
foreach($loadStudentProfile as $Profile): 
$i++;


$className =System::getColById('beedyclasslist', 'classId', $Profile['classId'], 1); 
$groupId =System::getColById('beedyclasslist', 'classId', $Profile['classId'], 2); 
?>
<tr class="del<?php echo $Profile['stdAddNum']; ?>">
<td align="center" class="hide"><?php echo $Profile['stdAddNum']; ?></td>
<td> <?php echo $i; ?></td>
<td> <?php echo $Profile['stdAddNum']; ?></td>
<td><?php echo $Profile['stdSurname']." ".$Profile['stdFirstName']." ".$Profile['stdMiddleName']; ?></td>
<td><?php echo $Profile['stdGender']; ?></td>

	<!--   
	<td><?php //echo System::getColById('beedystdgroup', 'groupId', $groupId, 1); ?></td>-->
<td><?php echo $className; ?></td>


<td><?php if($Profile['Active']== 1): echo "Active"; else: echo "Disabled"; endif; ?></td>
<td> 
<?php if (in_array("5_2", $area_privilege)): ?>
<button class="btn  btn-xs btn-warning" type="button"  title="Click to Modify"
id="<?php echo $Profile['stdAddNum']; ?>"  onclick="javascript:modifyStudent(this.id)" ><i class="icon-edit icon-large"></i>&nbsp;Modify</button>
 <?php endif; ?>
 <input type="hidden" name="action" class="action<?php echo $Profile['stdAddNum']; ?>" value="deleteBanStudent" />
<input type="hidden" name="stdAddNum" value="<?php echo $Profile['stdAddNum']; ?>" />
<input type="hidden" name="stdAddNum" class="stdName<?php echo $Profile['stdAddNum']; ?>" value="<?php echo $Profile['stdSurname']; ?>" />

<?php if (in_array("5_2b", $area_privilege)): ?>
<button type="submit" tid="deleteStudent"   id="<?php echo $Profile['stdAddNum']; ?>"  class="btn btn-xs btn-danger deleteStudent" data-placement="right" title="Click to Delete"><i class="icon-trash icon-large"></i>&nbsp;Delete</button>
<?php endif; ?>
<?php if (in_array("5_2a", $area_privilege)): 
if($Profile['Active']== 1): ?>
<?php ?>
<button type="submit" tid="disableStudent"  id="<?php echo $Profile['stdAddNum']; ?>"  class="btn btn-xs btn-info disableStudent" data-placement="right" title="Click to Disable"><i class="icon-lock icon-large"></i>&nbsp;Disable</button>
<?php else: ?>
<button type="submit" tid="enableStudent" id="<?php echo $Profile['stdAddNum']; ?>"  class="btn btn-xs btn-success enableStudent" data-placement="right" title="Click to Enable"><i class="icon-key icon-large"></i>&nbsp;Enable</button>
<?php endif;    endif; ?> </td>	
</tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>


<script type="text/javascript">
$(document).ready( function() {
$('.deleteStudent').click( function() {
var stdAddNum = $(this).attr("id");
var tid = $(this).attr("tid");
var stdName = $('.stdName'+stdAddNum).val();
var action = $('.action'+stdAddNum).val();
if(confirm("Confirm "+ stdName +"  deleted? ")){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({stdAddNum: stdAddNum,action: action,tid: tid}),
cache: false,
success: function(html){
alert(html);
$(".del"+stdAddNum).fadeOut('slow'); 
} 
}); 
}
else{
return false;}
});	 

$('.disableStudent').click( function() {
var stdAddNum = $(this).attr("id");
var tid = $(this).attr("tid");
var stdName = $('.stdName'+stdAddNum).val();
var action = $('.action'+stdAddNum).val();
if(confirm("Confirm "+ stdName +"  to be disabled")){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({stdAddNum: stdAddNum, action: action,tid: tid}),
cache: false,
success: function(html){
alert(html);
setTimeout( function() { $("#viewAllStudent").load("templates/viewAllStudent.cbt.php"); },100); 
} 
}); 
}
else{
return false;}
});	 
$('.enableStudent').click( function() {
var stdAddNum = $(this).attr("id");
var tid = $(this).attr("tid");
var stdName = $('.stdName'+stdAddNum).val();
var action = $('.action'+stdAddNum).val();
if(confirm("Confirm "+ stdName +"  to be enabled")){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({stdAddNum: stdAddNum, action: action,tid: tid}),
cache: false,
success: function(html){
alert(html);
setTimeout( function() { $("#viewAllStudent").load("templates/viewAllStudent.cbt.php"); },100); 
} 
}); 
}
else{
return false;}
});	 
 
});				
</script>