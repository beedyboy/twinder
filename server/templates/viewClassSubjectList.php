<?php 
include('dataTable.php'); 
include('../includes/system.php');
$loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
$loadSubjectList = $GetSchool->loadSubjectList();
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>Group Name</th>  
<th>Class Name</th>  
<th>Subject Name</th>  
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($loadSubjectList)): ?>
<?php 
$i = 0;
foreach($loadSubjectList as $subjectList): 
$className =System::getColById('beedyclasslist', 'classId', $subjectList['classId'], 1); 
$groupId =System::getColById('beedyclasslist', 'classId', $subjectList['classId'], 2); 
$i++;
?>
<tr class="del<?php echo $subjectList['subId']; ?>"> 
<td align="center" class="hide"><?php echo $subjectList['classId']; ?></td>
<td> <?php echo $i; ?></td>
<td><?php echo   System::getColById('beedystdgroup', 'groupId', $groupId, 1); ?></td>
<td><?php echo $className; ?></td>
<td><?php echo $subjectList['subjectName']; ?></td>
<td> 
<?php if (in_array("4_1a", $area_privilege)): ?>
<button class="btn btn-warning btn-xs" type="button"  title="Click to Modify" id="<?php echo $subjectList['subId']; ?>" onclick="modifySubject(this.id)" ><i class="icon-edit icon-large"></i>&nbsp;Modify</button>
<?php endif; ?>
<input type="hidden" class="action<?php echo $subjectList['subId']; ?>"  name="action" value="deleteSubjectList" />
<?php if (in_array("4_1b", $area_privilege)): ?>
<button type="submit" class="deletesubjectList btn btn-xs btn-danger " name="<?php echo $subjectList['subjectName']; ?>" id="<?php echo $subjectList['subId']; ?>"  data-placement="right" title="Click to Delete">
<i class="icon-trash icon-large"></i>&nbsp;Delete</button>
<?php endif; ?>
</td>	 </tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready( function() {
$('.deletesubjectList').click( function() { 
var subId = $(this).attr("id");
var subjectName = $(this).attr("name");
var action = $('.action'+subId).val();
if(confirm("Delete "+ subjectName +" subject? ")){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({subId: subId,action: action}),
cache: false,
success: function(html){
alert(html);
$(".del"+subId).fadeOut('slow'); 
} 
}); 
}
else{
return false;}
});	
});				
</script>