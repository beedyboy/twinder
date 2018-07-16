
 <?php

session_start();
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
<center>Your Institution has been created</center>

 

<div class="grid mobile" >

<div class="column column-12">

<div style="border: 1px solid #000; border-radius: 15px; height: 50px;"  class="column offset-3 column-6">

<div style="border: 1px solid #000;  margin-top: 8px;" >
<div class="progressBar"  style="width: 95%; background: forestgreen; border: 1px solid #000;  ">
<span style="color: #FFF; left: 50%;">95%</span>
</div>
</div>
		 <span style="margin-bottom: 0px; left:30%; width: 40%; text-align: center; position: absolute;">Step 4 of 4</span>
</div>


 

<!-- every other thing-->
 
<div class="column column-12">
<center><strong>Please create Admin Username and Password.<br />
          (All fields are important) </strong></center>

<div id="alert_message_mod"> 
	 	 
	 </div>
<form method="post" class="formTag install-step5 form-horizontal" enctype="multipart/form-data" role="form" data-parsley-validate=''>
	 <input type="hidden" name="area_privilege" value="1"/>
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">First Name:</label> 
<input type="text"  name="firstName"  placeholder="Enter First Name" class="form-control  column-1" data-parsley-maxlength="50" required="">
 </div>

 </div>

  
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Last Name:</label> 
<input type="text"  name="lastName"  placeholder="Enter Last Name" class="form-control  column-1" data-parsley-maxlength="50" required="">
 </div>

 </div>

  
 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Email:</label> 
<input type="text"  class="form-control  column-1"  name="email" id="email" placeholder="Enter Email" data-parsley-type="email" required="">
 </div>

 </div>


  
 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Username:</label> 
<input type="text"  class="form-control  column-1"  name="username" id="username" placeholder="Enter Username" required="">
 </div>

 </div>


 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Password:</label> 
<input type="password"  class="form-control  column-1"  name="password" id="password" placeholder="Enter Password"  autocomplete="off" onkeyup="passwordStrength(this.value);" data-parsley-minlength="7" data-parsley-pattern="(?=.*[a-z])(?=.*[A-Z]).*"  required=""> 
 </div>

 </div>


 
	
<div class="form-group" id="StrengthDiv" style="display: none;">
<div class="row"> 
<label class="column  column-3">Password Strength:</label>  
<div id="passwordStrength" style="font-weight:bold;"></div>
 </div>

 </div>


 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Confirm Password:</label> 
<input type="password"  class="form-control  column-1"   data-parsley-equalto="#password" placeholder="Confirm Password" required="">
 </div>

 </div>

 
 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Profile Photo:</label> 
<input type="file"  class="form-control  column-1" name="photo" id="photo" placeholder="Enter your Photo" required="">
 </div>

 </div>

  
 
<div class="form-group">
 
 <button type="submit"  id="submitBtn" class="btn btn-primary"><span class="fas fa-save"></span> Save & Next</button>
 </div>

 
</form>
  
</div>
 

</div>




</div>


</div>
</div>

<script src="public/js/jquery.js"></script>
<script src="public/js/parsley.min.js"></script> 
 
 	<script language="JavaScript" type="text/javascript">
		 
		  

		  
function passwordStrength(password)
{
  document.getElementById("passwordStrength").style.display = "none";
  document.getElementById("StrengthDiv").style.display = "none";

	  var desc = new Array();

	  desc[0] = "Very Weak";

	  desc[1] = "Weak";

	  desc[2] = "Good";

	  desc[3] = "Strong";

	  desc[4] = "Strongest";


	  //if password bigger than 7 give 1 point

	  if (password.length > 0) 
	  {   
		  document.getElementById("StrengthDiv").style.display = "block" ;
		  document.getElementById("passwordStrength").style.display = "block" ;
		  document.getElementById("passwordStrength").style.color = "#ff0000" ;
		  document.getElementById("passwordStrength").innerHTML = desc[0] ;
		  
		  
	  }


	  //if password has at least one number give 1 point

	  if (password.match(/\d+/) && password.length > 5) 
	  {
		  document.getElementById("StrengthDiv").style.display = "block" ;
		  document.getElementById("passwordStrength").style.display = "block" ;
		  document.getElementById("passwordStrength").style.color = "#ff0000" ;
		  document.getElementById("passwordStrength").innerHTML = desc[1] ;
	  }



	  //if password has at least one special caracther give 1 point

	  if (password.match(/\d+/) && password.length > 7 && password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )
	  {
		  document.getElementById("StrengthDiv").style.display = "block" ;
		  document.getElementById("passwordStrength").style.display = "block" ;
		  document.getElementById("passwordStrength").style.color = "#8ed087" ;
		  document.getElementById("passwordStrength").innerHTML = desc[2] ;
	  }

	  
	  //if password has both lower and uppercase characters give 1 point      

	  if (password.match(/\d+/) && password.length > 10 && password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) && ( password.match(/[A-Z]/) ) ) 
	  {
		  document.getElementById("StrengthDiv").style.display = "block" ;
		  document.getElementById("passwordStrength").style.display = "block" ;
		  document.getElementById("passwordStrength").style.color = "#84b756" ;
		  document.getElementById("passwordStrength").innerHTML = desc[3] ;
	  }


	  //if password bigger than 12 give another 1 point

	  if (password.match(/\d+/) &&  password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) && ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) && password.length > 12)
	  {
		  document.getElementById("StrengthDiv").style.display = "block" ;
		  document.getElementById("passwordStrength").style.display = "block" ;
		  document.getElementById("passwordStrength").style.color = "#43820b" ;
		  document.getElementById("passwordStrength").innerHTML = desc[4] ;
	  }

}

</script>