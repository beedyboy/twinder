<?php 
 include('dataTable.php'); 
include('../includes/system.php');
 $loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
$loadClassList = $GetSchool->loadClassList();
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>Group Name</th>  
<th>Class Name</th>  
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($loadClassList)): ?>
<?php 
$i = 0;
foreach($loadClassList as $classList): 
$i++;
?>
<tr class="del<?php echo $classList['classId']; ?>"> 
<td align="center" class="hide"><?php echo $classList['classId']; ?></td>
<td> <?php echo $i; ?></td>
<td><?php echo $groupName =System::getColById('beedystdgroup', 'groupId', $classList['groupId'], 1); ?></td>
<td><?php echo $classList['className']; ?></td>
 <td> 
 <?php if (in_array("3_1a", $area_privilege)): ?>
<button class="btn btn-warning btn-xs" type="button"  title="Click to Modify" id="<?php echo $classList['classId']; ?>" onclick="modifyClass(this.id)" ><i class="icon-edit icon-large"></i>&nbsp;Modify</button>
  <?php endif; ?>
<input type="hidden" class="action<?php echo $classList['classId']; ?>"  name="action" value="deleteclassList" />
 <?php if (in_array("3_1b", $area_privilege)): ?>
 <button type="submit" class="deleteclassList btn btn-xs btn-danger " name="<?php echo $classList['className']; ?>" id="<?php echo $classList['classId']; ?>"  data-placement="right" title="Click to Delete">
 <i class="icon-trash icon-large"></i>&nbsp;Delete</button>
 <?php endif; ?>
 </td>	 </tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>

<script type="text/javascript">
$(document).ready( function() {
$('.deleteclassList').click( function() { 
var classId = $(this).attr("id");
var className = $(this).attr("name");
 var action = $('.action'+classId).val();
if(confirm("Delete "+ className +" batch? ")){
	
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({classId: classId,action: action}),
cache: false,
success: function(html){
alert(html);
$(".del"+classId).fadeOut('slow'); 
} 
}); 
}
else{
return false;}
});	
});				
</script>