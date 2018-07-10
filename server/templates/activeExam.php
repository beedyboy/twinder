<?php 
include('dataTable.php'); 
include('../includes/system.php');
$loadExamList = $GetExam->loadExamList();
?> 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>Exam Name</th>
<th>Date</th> 
<th>Class</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($loadExamList)): ?>
<?php 
$i = 0;
foreach($loadExamList as $EXAM): 
$i++;
$classId = Database::getName('beedySubjectList', 'subId', $EXAM['subId'], 2);  
$subId =$EXAM['subId']; 
$className =System::getColById('beedyClassList', 'classId', $classId, 1); 
?>
<tr class="del<?php echo $EXAM['bankId']; ?>">
<td align="center" class="hide"><?php echo $EXAM['bankId']; ?></td>
<td> <?php echo $i; ?></td>
<td><?php echo $examName = Database::getName('beedySubjectList', 'subId', $subId, 1); ?>   </td>
<td> <?php echo $EXAM['Exam_Date']; ?></td>
<td> <?php echo $className; ?></td>  
<td><?php if($EXAM['Active']== "Yes"): echo "Active"; else: echo "-"; endif; ?></td>
<td> 
<button type="submit" id="<?php echo $EXAM['bankId']; ?>" 
class="btn btn-xs btn-danger PerformanceBar" data-placement="right" title="Click to check Performance">
<i class="icon-lock icon-large"></i>&nbsp;Performance</button>
<input type="hidden" name="action" class="action<?php echo $EXAM['bankId']; ?>" value="examManager" />
<input type="hidden" name="bankId" value="<?php echo $EXAM['bankId']; ?>" />
<input type="hidden" name="bankId" class="examName<?php echo $EXAM['bankId']; ?>" value="<?php echo $examName; ?>" />
<?php if($EXAM['Active']== "Yes"): ?>
<button type="submit" tid="endExam"  id="<?php echo $EXAM['bankId']; ?>"  class="btn btn-xs btn-danger disableExam" data-placement="right" title="Click to Disable"><i class="icon-lock icon-large"></i>&nbsp;Finish</button>
<?php else: ?>
<button type="submit" tid="enableExam" id="<?php echo $EXAM['bankId']; ?>"  class="btn btn-xs btn-success enableExam" data-placement="right" title="Click to Enable"><i class="icon-key icon-large"></i>&nbsp;Start</button>
<?php endif; ?> </td>	
</tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready( function() { 
$('.disableExam').click( function() {
var bankId = $(this).attr("id");
var tid = $(this).attr("tid");
var examName = $('.examName'+bankId).val();
var action = $('.action'+bankId).val();
if(confirm("End "+ examName +"  Examination")){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({bankId: bankId, action: action,tid: tid}),
cache: false,
success: function(html){
alert(html);
setTimeout( function() { $("#activeExam").load("templates/activeExam.php"); },100); 
} 
}); 
}
else{
return false;}
});	
$('.enableExam').click( function() {
var bankId = $(this).attr("id");
var tid = $(this).attr("tid");
var examName = $('.examName'+bankId).val();
var action = $('.action'+bankId).val();
if(confirm("Start "+ examName +"  Examination")){
$.ajax({
type: "POST",
url: "templates/delete.php",
data: ({bankId: bankId, action: action,tid: tid}),
cache: false,
success: function(html){
alert(html);
setTimeout( function() { $("#activeExam").load("templates/activeExam.php"); },100); 
} 
}); 
}
else{
return false;}
});	 
});				
</script>