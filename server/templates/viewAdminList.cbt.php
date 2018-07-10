<?php 
include('dataTable.php'); 
include('../includes/system.php'); 
$loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
$loadAdmin = $GetSchool->loadAdmin();
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable submitForm">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>User Tpe</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($loadAdmin)): ?>
<?php
$i = 0;
foreach($loadAdmin as $Admin):
$i++;
?>
<tr class="del<?php echo  $Admin['adminId']; ?>">
<form id="deleteAdmin">
<td align="center" class="hide"><?php echo $Admin['adminId']; ?></td>
<td> <?php echo $i; ?></td>
<td><?php echo $Admin['firstName']; ?></td>
<td><?php echo $Admin['lastName']; ?></td>
<td><?php echo $Admin['email']; ?></td>
<td><?php echo System::getColById('permissions', 'permitId',  $Admin['area_privilege'], 1);  ?></td>
<td>
<input type="hidden" class="action<?php echo $Admin['adminId']; ?>"  name="action" value="deleteAdmin" />
<input type="hidden"  class="firstName<?php echo $Admin['adminId']; ?>" name="AdminTitle" value="<?php echo $Admin['firstName']; ?>" />
<?php if (in_array("6_2", $area_privilege)): ?>
<button class="btn btn-warning btn-xs" type="button"  title="Click to modify" id="<?php echo $Admin['adminId']; ?>"  onclick="modifyAdmin(this.id)"><i class="icon-edit icon-small"></i>&nbsp;Modify</button>
<?php endif; ?>
<?php if (in_array("6_3", $area_privilege)): ?>
<button class="btn btn-danger delete-Admin btn-xs" type="button"  title="Click to Delete" id="<?php echo $Admin['adminId']; ?>"><i class="icon-trash icon-small"></i>&nbsp;Delete</button>
<?php endif; ?>
</td>
</form>		</tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready( function() {
$('.delete-Admin').click( function() {
var adminId = $(this).attr("id");
var firstName = $('.firstName'+adminId).val();
var action = $('.action'+adminId).val();
if(confirm("Confirm "+ firstName +" details to be deleted? ")){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({adminId: adminId,action: action}),
cache: false,
success: function(html){
alert(html);
$(".del"+adminId).fadeOut('slow');
}
});
}
else{
return false;}
});
});
</script>