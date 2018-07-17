
 <?php

// echo php_uname();
 $version=phpversion();
 $version_allow='5.3.0';
 $ver_comp = false;
 if(version_compare(PHP_VERSION, $version_allow, '>='))
 {  
 	 $ver_comp= true;
 }
 else
 {
    $ver_comp = false;
 }

  $dbFile = "../db.php";
  $dummyFile = "../uploads/dummy.txt";
   $dummy2File = "../uploads/admin/dummy.txt";
 ?>
  <div class="grid mobile ">

<div class="column  column-12">
<center>Beginning new TWINDER installation</center>

<div id="divAlert" style="display:none; height:270px;">
 <?php
/* $fh1 = fopen($dbFile, 'w');

    if ($fh1 == FALSE):
    
        echo '<br />';
        echo '<br />This install has no rights to create or update file db.php.';
        echo '<br />';
        echo '<br />You may proceed with this installation, but dbbase access information will not be saved and ';
        echo '<br />the install process will restart when trying to use this system again.';
     else:
    
        unlink($dbFile);
   
    fclose($fh1);

    endif;*/
    $fh2 = fopen($dummyFile, 'w');

    if ($fh2 == FALSE):
    
        echo '<br />';
        echo '<br />Unable to write inside uploads/students directory.';
        echo '<br />Student photos will fail to be saved until this permission issue is solved';
    
    else:
    
        unlink($dummyFile);
   
    fclose($fh2);
    endif;
    $fh3 = fopen($dummy2File, 'w');

    if ($fh2 == FALSE):
    
        echo '<br />';
        echo '<br />Unable to write inside uploads/admin directory.';
        echo '<br />User photos will fail to be saved until this permission issue is solved';
    
    
    else:
    
        unlink($dummy2File);
   
    fclose($fh3);
    endif;
    echo '<br />';
    echo '<br />';
    echo '<br />It is recommended to solve all permission issue before performing the installation.';
    echo '<br />';
    echo '<br />';
    echo '<input type="button" value="Continue" class="btn_wide" onclick="hideAlert()" />';
     
   ?>
</div>

<div class="grid mobile"  id="divConnInfo" style="display: <?php if (!($fh2 && fh3)): echo 'none'; endif; ?>">

<div class="column column-12">

<div style="border: 1px solid #000; border-radius: 15px; height: 50px;"  class="column offset-3 column-6">

<div style="border: 1px solid #000;  margin-top: 8px;" >
<div class="progressBar"  style="width: 25%; background: forestgreen; border: 1px solid #000;  ">
<span style="color: #FFF;">25%</span>
</div>
</div>
		 <span style="margin-bottom: 0px; left:30%; width: 40%; text-align: center; position: absolute;">Step 1 of 4</span>
</div>


<div  class="column offset-2 column-10">
  <?php   if($ver_comp=='true'):
                 echo "<p style='padding-top:1px; color:green; font-weight:bold;'>Your php version is ".$version.". You can install this system</p>";
                else:
                    echo "<p style='padding-top:1px; color:red; font-weight:bold;'>Your php version is ".$version.".<br>But your system must have php version ".$version_allow." to install this system</p>";
                endif;
                ?>

</div>

<!-- every other thing-->
 
<div class="column column-12">
<center><strong>Please Enter MySQL Connection Information</strong></center>

<div id="alert_message_mod"> 
	 	 
	 </div>
<form  class="formTag <?php if (!($fh2 && fh3)): echo 'install-step2'; else: echo "install-step2"; endif; ?> form-horizontal" data-parsley-validate=''>
	
	
 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Server:</label> 
<input type="text"  name="server" size="20" value="localhost" class="form-control  column-1" required="">
 </div>

 </div>

	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Port:</label> 
<input type="text"  name="port" size="20" value="3306" class="form-control  column-1" required="">
 </div> 
 </div>
 
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Admin Username:</label> 
<input type="text"  name="addusername" size="20" value="root" class="form-control  column-1" required="">
 </div> 
 </div>
  
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Admin Password:</label> 
<input type="password" id="addpassword" name="addpassword" size="20"  class="form-control  column-1">
 </div> 
 </div>
  
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Confirm Password:</label> 
<input type="password"   size="20"  class="form-control  column-1" data-parsley-equalto="#addpassword">
 </div> 
 </div>
 
<div class="form-group">
 
 <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Save & Next</button>
 </div>

 
</form>
  
</div>
 

</div>




</div>


</div>
</div>

<script src="public/js/parsley.min.js"></script>
<script type="text/javascript">
<?php
if ($fh2 && fh3)
    echo 'hideAlert();';
else
    echo 'showAlert();';
?> 
  </script>
 