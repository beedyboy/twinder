 <?php 
include('../includes/system.php'); 
?>
 	<div class="span10">
	 
 
 <a rel="facebox" href="licenceKey.php">
 <Button type="submit" class="btn btn-info" style="float:left; width:230px; height:35px;" />
 <i class="icon-plus-sign icon-large"></i> Insert License Key</button></a> 
 
 <a rel="facebox" href="systemWindow.php">
 <Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" />
 <i class="icon-plus-sign icon-large"></i> Renew License</button></a><br><br>
 
 
 
 <div class="submitForm">
 <div class="row">
 <div class="col-md-10">
 
 <hr />
 <?php $systemWindow =System::loadTable('systemWindow');
while($det = $systemWindow->fetch(PDO::FETCH_ASSOC)){
$code1 = $det['code1'];
$code2 = $det['code2'];
$codeKey = $det['codekey'];
$active = $det['active']; 
}
if($codeKey !="beedy"):
 ?>
 <table class="table table-bordered">
 <tr>
 <th>Serial Number</th> <td ><span class="btn btn-danger">  <?php echo $code1; ?> </span> </td>
 </tr>
  
  <tr>
 <th>Mode</th> <td class="text-success"><span class="btn btn-success"> <?php echo $active;  ?></span></td>
 </tr>


 </table> 
<br > <br/>
<?php
endif;
?>
 <table class="table table-striped">
 <tr>
 <th>Licensed to</th> <td ><span class="badge ">  <?php print _SCHOOL_NAME_; ?> </span> </td>
 </tr>

  <tr>
 <th>Expiry Date</th> <td class="badge">
 <?php  
 $datestr = new DateTime(dateTo);
echo $timestamp =$datestr->format('l jS F (Y-m-d)'); ?>
 </td>
 </tr>

 <tr>
 <th>Day(s) Left</th> <td> <span class="badge"> <?php if(bdLast > 0 ): print bdLast; else: echo 0; endif;  
 
 ?></span>  </td>
 </tr>
  <tr>
 <th>Status</th> <td  class="btn alert <?php  if(bdLast >= 0): echo " alert-success"; 
 else: echo " alert-danger"; endif; ?>"> <?php  if(bdLast >= 0): echo "Active"; else: echo "Expired"; endif;   ?>
 
 </tr>


 </table>
 </div>

</div>


</div>


	</div>
</div> 
<?php include('footer.php'); ?>
</body>
</html>
