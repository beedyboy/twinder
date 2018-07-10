<?php 
 $loadPermission = $GetSchool->loadPermission();
?>
<div class="row">

 <div class="col-md-10">
<div class="beedyTemplate2">
<div class="col-md-12">
<h1 class='pageGuide'>User Type</h1>	

<table class="table table-responsive table-condensed">
<thead>
<tr>
<th class="hide">abc</th>
<th>#</th>
<th>Type</th> 
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($loadPermission)): ?>
<?php 
$i = 0;
foreach($loadPermission as $Permission): 
$i++;
?>
<tr class="del<?php echo $Permission['permitId']; ?>"> 
<td align="center" class="hide"><?php echo $Permission['permitId']; ?></td>
<td> <?php echo $i; ?></td>
<td><?php echo $Permission['permissionGrp']; ?></td>
 <td> 
<button class="btn btn-warning" type="button"  title="Click to Modify" id="<?php echo $Permission['permitId']; ?>" onclick="modifyPermission(this.id)" ><i class="icon-edit icon-large"></i>&nbsp;Modify</button>
 
<input type="hidden" class="action<?php echo $Permission['permitId']; ?>"  name="action" value="deleteSemester" />
 <input type="hidden" name="permitId" value="<?php echo $Permission['permitId']; ?>" />
 </td>	 </tr>
<?php endforeach; ?> <?php endif; ?>
</tbody>
</table>
		
</div>
 
 <div class="col-md-12" id="activate">
 
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
