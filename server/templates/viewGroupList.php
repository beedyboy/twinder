<?php 
include('dataTable.php'); 
include('../includes/system.php');
$loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
$viewGroupList = $GetSchool->loadStudentGroup();
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>Group Name</th>  
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($viewGroupList)): ?>
<?php 
$i = 0;
foreach($viewGroupList as $stdGroup): 
$i++;
?>
<tr class="del<?php echo $stdGroup['groupId']; ?>"> 
<td align="center" class="hide"><?php echo $stdGroup['groupId']; ?></td>
<td> <?php echo $i; ?></td>
<td><?php echo $stdGroup['groupName']; ?></td>
<td> 
<?php if (in_array("2_1a", $area_privilege)): ?>
<button class="btn btn-warning btn-xs" type="button"  title="Click to Modify" id="<?php echo $stdGroup['groupId']; ?>" onclick="modifyStdGroup(this.id)" ><i class="icon-edit icon-large"></i>&nbsp;Modify</button>
<?php endif; ?>
<input type="hidden" class="action<?php echo $stdGroup['groupId']; ?>"  name="action" value="deleteStdGroup" />
<?php if (in_array("2_1b", $area_privilege)): ?>
<button type="submit" class="deleteStdGroup btn btn-xs btn-danger " name="<?php echo $stdGroup['groupName']; ?>" id="<?php echo $stdGroup['groupId']; ?>"  data-placement="right" title="Click to Delete">
<i class="icon-trash icon-large"></i>&nbsp;Delete</button>
<?php endif; ?>
</td>	 </tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready( function() {
$('.deleteStdGroup').click( function() { 
var groupId = $(this).attr("id");
var groupName = $(this).attr("name");
var action = $('.action'+groupId).val();
if(confirm("Delete "+ groupName +" batch? ")){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({groupId: groupId,action: action}),
cache: false,
success: function(html){
alert(html);
$(".del"+groupId).fadeOut('slow'); 
} 
}); 
}
else{
return false;}
});	
});				
</script>