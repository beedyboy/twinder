<?php 
 include('dataTable.php'); 
include('../includes/system.php');	
 $loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
 
$loadSchoolTerm = $GetSchool->loadSchoolTerm();
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>Term/Semester</th>
<th>Current</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($loadSchoolTerm)): ?>
<?php 
$i = 0;
foreach($loadSchoolTerm as $SchoolTerm): 
$i++;
?>
<tr class="del<?php echo $SchoolTerm['SchoolTermId']; ?>"> 
<td align="center" class="hide"><?php echo $SchoolTerm['SchoolTermId']; ?></td>
<td> <?php echo $i; ?></td>
<td><?php echo $SchoolTerm['SchoolTermName']; ?></td>
<td><?php if($SchoolTerm['SchoolTermId'] == $schArray['CurrentSemester']): echo "Yes"; else: echo "No"; endif; ?></td>
<td> 
 <?php if (in_array("1_3a", $area_privilege)): ?>
<button class="btn btn-warning" type="button"  title="Click to Modify" id="<?php echo $SchoolTerm['SchoolTermId']; ?>" onclick="modifySemester(this.id)" ><i class="icon-edit icon-large"></i>&nbsp;Modify</button>
<?php if($SchoolTerm['SchoolTermId'] == $schArray['CurrentSemester']): echo "Current Semester "; else: ?>
<a id="setCurrentSems"  sid="<?php echo $SchoolTerm['SchoolTermId']; ?>" class="btn btn-xs btn-success">&nbsp; Set Current</a>
<?php endif; endif; 
?>
<input type="hidden" class="action<?php echo $SchoolTerm['SchoolTermId']; ?>"  name="action" value="deleteSemester" />
 <input type="hidden" name="SchoolTermId" value="<?php echo $SchoolTerm['SchoolTermId']; ?>" />
 <?php if (in_array("1_3b", $area_privilege)): ?>
 <button name="<?php echo $SchoolTerm['SchoolTermName']; ?>" id="<?php echo $SchoolTerm['SchoolTermId']; ?>" type="submit" class="btn btn-xs btn-danger deleteSemester" data-placement="right" title="Click to Delete"><i class="icon-trash icon-large"></i>&nbsp;Delete</button>
<?php endif; ?>
</td>	 </tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>

<script type="text/javascript">
$(document).ready( function() {
$('.deleteSemester').click( function() {
var SchoolTermId = $(this).attr("id");
var SchoolTermName = $(this).attr("name");
 var action = $('.action'+SchoolTermId).val();
if(confirm("Delete "+ SchoolTermName)){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({SchoolTermId: SchoolTermId,action: action}),
cache: false,
success: function(html){
alert(html);
$(".del"+SchoolTermId).fadeOut('slow'); 
} 
}); 
}
else{
return false;}
});	
});				
</script>