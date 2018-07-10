<?php 
 include('dataTable.php'); 
include('../includes/system.php');
	 	 $loadPermit = $GetSchool->loadPermit($_SESSION['cbt']['area_privilege']);
$area_privilege= explode(",", $loadPermit);
 
$loadStudentBatches = $GetSchool->loadStudentBatches();
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>Batch/Session</th>
<th>Current</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($loadStudentBatches)): ?>
<?php 
$i = 0;
foreach($loadStudentBatches as $stdBatch): 
$i++;
?>
<tr class="del<?php echo $stdBatch['genStdBatchId']; ?>"> 
<td align="center" class="hide"><?php echo $stdBatch['genStdBatchId']; ?></td>
<td> <?php echo $i; ?></td>
<td><?php echo $stdBatch['genStdBatchesYear']; ?></td>
<td><?php if($stdBatch['genStdBatchId'] == $schArray['CurrentSession']): echo "Yes"; else: echo "No"; endif; ?></td>
<td> 
<?php if (in_array("1_2a", $area_privilege)): ?>
<button class="btn btn-warning btn-xs" type="button"  title="Click to Modify" id="<?php echo $stdBatch['genStdBatchId']; ?>" onclick="modifySession(this.id)" ><i class="icon-edit icon-large"></i>&nbsp;Modify</button>
<?php if($stdBatch['genStdBatchId'] == $schArray['CurrentSession']): echo "Current Session &nbsp;"; else: ?>
<a id="setCurrentSess" sid="<?php echo $stdBatch['genStdBatchId']; ?>"  class="btn btn-xs btn-success">&nbsp; Set Current</a>
<?php 
endif; 
endif; 
?>
<input type="hidden" class="action<?php echo $stdBatch['genStdBatchId']; ?>"  name="action" value="deleteSession" />
 <?php if (in_array("1_2b", $area_privilege)): ?>
 <button type="submit" class="deleteSession btn btn-xs btn-danger " name="<?php echo $stdBatch['genStdBatchesYear']; ?>" id="<?php echo $stdBatch['genStdBatchId']; ?>"  data-placement="right" title="Click to Delete">
 <i class="icon-trash icon-large"></i>&nbsp;Delete</button>
 <?php   endif; ?>
</td>	 </tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>

<script type="text/javascript">
$(document).ready( function() {
$('.deleteSession').click( function() { 
var genStdBatchId = $(this).attr("id");
var genStdBatchesYear = $(this).attr("name");
 var action = $('.action'+genStdBatchId).val();
if(confirm("Delete "+ genStdBatchesYear +" batch? ")){
	
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({genStdBatchId: genStdBatchId,action: action}),
cache: false,
success: function(html){
alert(html);
$(".del"+genStdBatchId).fadeOut('slow'); 
} 
}); 
}
else{
return false;}
});	
});				
</script>