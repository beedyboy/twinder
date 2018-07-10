<?php 
include('dataTable.php'); 
include('../includes/system.php');
$loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
$loadExamTypeList = $GetSchool->loadExamTypeList();
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>Term/exmType</th> 
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($loadExamTypeList)): ?>
<?php 
$i = 0;
foreach($loadExamTypeList as $examType): 
$i++;
?>
<tr class="del<?php echo $examType['examTypeId']; ?>"> 
<td align="center" class="hide"><?php echo $examType['examTypeId']; ?></td>
<td> <?php echo $i; ?></td>
<td><?php echo $examType['typeName']; ?></td>
<td> 
<?php if (in_array("7_2", $area_privilege)): ?>
<button class="btn  btn-xs btn-warning" type="button"  title="Click to Modify" id="<?php echo $examType['examTypeId']; ?>" onclick="modifyExamType(this.id)" ><i class="icon-edit icon-large"></i>&nbsp;Modify</button>
<?php endif; ?>
<input type="hidden" class="action<?php echo $examType['examTypeId']; ?>"  name="action" value="deleteexmType" />
<input type="hidden" name="examTypeId" value="<?php echo $examType['examTypeId']; ?>" />
<?php if (in_array("7_3", $area_privilege)): ?>
<button name="<?php echo $examType['typeName']; ?>" id="<?php echo $examType['examTypeId']; ?>" type="submit" class="btn btn-xs btn-danger deleteexmType" data-placement="right" title="Click to Delete"><i class="icon-trash icon-large"></i>&nbsp;Delete</button>
<?php endif; ?></td>	 </tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready( function() {
$('.deleteexmType').click( function() {
var examTypeId = $(this).attr("id");
var typeName = $(this).attr("name");
var action = $('.action'+examTypeId).val();
if(confirm("Delete "+ typeName+ "examination type")){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({examTypeId: examTypeId,action: action}),
cache: false,
success: function(html){
alert(html);
$(".del"+examTypeId).fadeOut('slow'); 
} 
}); 
}
else{
return false;}
});	
});				
</script>