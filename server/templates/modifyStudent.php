<?php
 include('../includes/system.php');
 include('../includes/functions.cbt.php');
	 	 $stdAddNum= $_GET['stdAddNum']; 
if(!session_id()):
session_start(); 
endif;

if(isset($_SESSION['cbt']['page']) AND $_SESSION['cbt']['page']!= "logged"): 
beedy_goto('../log/logout.php');
?>
<script>
alert('You Are Not Logged In !! Please Login to access this page');
window.location='../log/logout.php';
</script>
<?php
 
 endif;
?>
 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  


<link href="../css/font-awesome.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/jquery.timepicker.css" rel="stylesheet" media="screen">
 	<link rel="stylesheet" href="../packages/dist/sweetalert.css">
<link href="../css/jquery-ui.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="../css/font-awesome.min.css">

<link href="../style/style.css" type="text/css" rel="stylesheet"  media="screen"/>
<link rel="stylesheet" type="text/css" href="../style/jGrowl/jquery.jgrowl.css"/>
<link rel="stylesheet" type="text/css" href="../style/custom.css"  media="screen" />
<title><?php  echo $_SESSION['cbt']['schoolname']; ?> : 
<?php if (isset($arr_pages[5]['title'])) echo $arr_pages[$pid]['title']; ?></title>
<?php
 //include CSS files
$setting_css = $_SESSION['cbt']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="../css/'.$setting_css.'" rel="stylesheet" type="text/css" />';	
  }else{
  	echo '<link href="../css/pink.css" rel="stylesheet" type="text/css" />';
  }
 
 // include (INCLUDES_PATH . DS . 'htmleditor.php');
?>
 
<script type="text/javascript">
var popupWindow=null;
function modifyStudent(stdAddNum)
{  // window.location = 'test.php?stdAddNum=' + stdAddNum ;
popupWindow =window.open('templates/modifyStudent.php?stdAddNum=' + stdAddNum,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
}
function modifyStaff(empId)
{
popupWindow =window.open('modifyStaff.php?empId=' + empId,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
}
function printFinStatement(DateFrom,DateTo)
{
popupWindow =window.open('printFinStatement.php?DateFrom=' + DateFrom+'&DateTo='+DateTo,"_blank","directories=no,  status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
 popupWindow.print();
 }
</script>

  </head>
<body class="body_class">

<div class="container-90">

<div class="mainBeedyContainer"> 

<?php $loadStdProfile = $GetStudent->loadStdProfile($stdAddNum); 
while($Profile = $loadStdProfile->fetch(PDO::FETCH_ASSOC))
{	
$stdSurname = $Profile['stdSurname']; $stdFirstName = $Profile['stdFirstName']; $stdMiddleName=$Profile['stdMiddleName'];
$stdPicture= $Profile['stdPicture'];
$stdEmail = $Profile['stdEmail'];  
$stdGender = $Profile['stdGender'];
$stdDob=$Profile['stdDob']; 
$username=$Profile['username']; 
$password=$Profile['password']; 
$classId=$Profile['classId']; 
$genStdBatchId=$Profile['genStdBatchId'];  
$active=$Profile['Active'];  
}
 
$className =System::getColById('beedyclasslist', 'classId', $classId, 1); 
$groupId =System::getColById('beedyclasslist', 'classId', $classId, 2); 

 $loadStudentBatches = $GetSchool->loadStudentBatches();  
?>
 <aside>
<ul class="breadcrumb"><li><a href="?pid=5&action=student/&sub=Add-Student/"><i class="fa fa-dashboard"></i> Manage Students</a></li>
<li><a href="?pid=5&action=student/&sub=View-Student/">Student</a></li>
<li class="active"><a href="#"  id="<?php echo $stdAddNum; ?>"  onclick="javascript:modifyStudent(this.id)"><?php echo $stdSurname." ".$stdFirstName; ?></a></li>
</ul>

<section class="content-header">
<div class="row">
<div class="col-xs-12">
<h2 class="pageGuide">	
<i class="fa fa-user"></i>  Student Profile		<div class="pull-right">
<a id="export-pdf" class="btn-sm btn btn-warning" href="#" target="blank"><i class="fa fa-file-pdf-o"></i> Generate PDF</a>				</div>
</h2>
</div>
<!-- /.col -->
</div>
</section>
<div class="row">
<div class="col-lg-4 table-responsive border-right no-padding" style="margin-bottom:15px">
<div class="col-md-12 text-center">
<img class="img-circle" src="../../<?php echo $stdPicture; ?>" alt="No Image" width="140" height="140">	
<div class="photo-edit">
<a class="photo-edit-icon" href="#" title="Change Profile Picture" data-toggle="modal" data-target="#photoup">
<i class="fa fa-pencil"></i></a>					</div>
</div>

<table class="table table-striped table-bordered">
<tr>
<th>Student ID</th>
<td><?php echo $stdAddNum; ?></td>
</tr>
<tr>
<th>Full Name</th>
<td><?php echo $stdSurname." ".$stdFirstName; ?></td>
</tr>
<tr>
<th>Class</th>
<td><?php echo  $className; ?></td>
</tr>
<tr>
<th>Email ID</th>
<td> <?php echo $stdEmail; ?> </td>
</tr>
 
<tr>
<th>Gender</th>
<td><?php echo $stdGender; ?> </td>
</tr>
<tr>
<th>Status</th>
<td>
<span class="label label-success"><?php  if($active==1): echo "Active"; else: echo "Disabled"; endif; ?></span>
</td>
</tr>
</table>

</div>

<div class="col-lg-8 table-responsive border-left no-padding" style="margin-bottom:15px">
<ul id="myTab" class="nav nav-tabs"> 
<li class="active"> <a href="#Personal" data-toggle="tab"><i class="fa fa-street-view"></i> Personal</a> </li> 
<li><a href="#Academic" data-toggle="tab"><i class="fa fa-graduation-cap"></i> Academic</a></li>
<li><a href="#Contact" data-toggle="tab"><i class="beedy-login-details"></i>;&nbsp;&nbsp;&nbsp;&nbsp; Login Details</a></li> 
</ul> 

<div id="myTabContent" class="tab-content">

<div class="tab-pane fade in active" id="Personal">
<h2 class="pageGuide"><i class="fa fa-info-circle"></i> Personal Details</h2>

<form id="UpdPersonal" class="submitForm"  role="form" action="#">

<input type="hidden" name="action" value="stdUpdate" />
<input type="hidden" name="type" value="UpdPersonal" />
<input type="hidden" name="stdAddNum" value="<?php echo $stdAddNum; ?>" >

<div class="row">
 
<div class="col-xs-5 col-md-5 col-lg-5">
<div class="form-group">
<label for="stdSurname">First Name:</label>
<input type="text" class="form-control" name="stdSurname" value="<?php echo $stdSurname; ?>" placeholder="Enter First Name" required>
</div>
<div class="form-group">
<label for="stdFirstName">Last Name:</label>
<input type="text" class="form-control" name="stdFirstName" value="<?php echo $stdFirstName; ?>" placeholder="Enter Last Name" required>
</div>
<div class="form-group">
<label for="stdMiddleName">Middle Name:</label>
<input type="text" class="form-control" name="stdMiddleName" value="<?php echo $stdMiddleName; ?>" placeholder="Enter Last Name" required>
</div>
</div>

<div class="col-xs-5 col-md-5 col-lg-5">
<div class="form-group">
<label for="stdGender">Gender:</label>
<select class="form-control" id="stdGender" name="stdGender" required>
<option value="">Select Gender</option>
<option value="Male" <?php if($stdGender=="Male"): echo "Selected"; endif; ?>>Male</option>
<option value="Female"  <?php if($stdGender=="Female"): echo "Selected"; endif; ?>>Female</option>
</select>
</div> 

<div class="form-group">
<label for="stdDob">Date of Birth:</label>
<input type="date" class="form-control" name="stdDob" value="<?php echo $stdDob; ?>" placeholder="Enter Date of Birth" required>
</div> 
<div class="form-group">
<button type="submit" class="btn  btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Personal Details</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</div> 

</div> 

</form>  
       
</div> 

<div class="tab-pane fade" id="Academic"> 

<h2 class="pageGuide"> <i class="fa fa-info-circle"></i> Academic Details</h2>

<form id="UpdateAcademic" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="stdUpdate" />
<input type="hidden" name="type" value="UpdateAcademic" />
<input type="hidden" name="stdAddNum" value="<?php echo $stdAddNum; ?>" >

<div class="row">  
<div class="col-xs-6 col-md-6 col-lg-6">
  	
<?php $loadStudentGroup = System::loadDistinct('groupId','beedystdgroup'); ?>
<div class="form-group">
<label for="groupId">Group Name:</label>
<?php 
if(!empty($loadStudentGroup)): 
?>
<select class="form-control" id="groupIdMSelect" name="groupId" required>
<option value="">Select Group </option>
<?php
foreach($loadStudentGroup as $Group):
?>	
<option value="<?php echo $Group['groupId']; ?>" <?php
if($groupId == $Group['groupId']) { echo 'Selected';} ?>  ><?php echo System::getColById('beedystdgroup', 'groupId', $Group['groupId'], 1); ?></option>
<?php 
endforeach;
?>
</select>
<?php
endif; 
?>
</div>
<div class="form-group">
<label for="classList">Class Name:</label>
<div id="classList">
<select class="form-control" id="classId" name="classId" required> 
<option value="<?php echo $classId; ?>" selected><?php echo System::getColById('beedyclasslist', 'classId', $classId, 1);   ?></option>
</select>
</div>
</div>
 <div class="form-group">
<label for="genStdBatchId">Batch:</label>
<?php if(!empty($loadStudentBatches)): ?>
<select class="form-control" id="genStdBatchId" name="genStdBatchId" required>
<option value="">Select Batch</option>
<?php $i = 0; foreach($loadStudentBatches as $stdBatch): 
$i++; ?>
<option value="<?php echo $stdBatch['genStdBatchId']; ?>" <?php if($stdBatch['genStdBatchId']==$genStdBatchId): echo "Selected"; endif; ?>><?php echo $stdBatch['genStdBatchesYear']; ?></option>
<?php endforeach; ?> 
</select>
<?php endif; ?>
</div>
<br />
<div class="form-group">
<button type="submit" class="btn  btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Academic Details</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>	

</div> 

</div>
 
</form>  
</div>   
      


<div class="tab-pane fade" id="Contact"> 
<h2 class="pageGuide"> <i class="fa fa-info-circle"></i> Login Details</h2>

<form id="UpdateContact" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="stdUpdate" />
<input type="hidden" name="type" value="UpdateContact" />
<input type="hidden" name="stdAddNum" value="<?php echo $stdAddNum; ?>" >
<div class="row"> 
<div class="col-xs-6 col-md-6 col-lg-6">
 
<div class="form-group">
<label for="stdEmail">Email:</label>
<input type="email" class="form-control" name="stdEmail" value="<?php echo $stdEmail; ?>" placeholder="Enter Email" required>
</div>
 
<div class="form-group">
<label for="stdEmail">Username:</label>
<input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Enter Username" required>
</div>
 
<div class="form-group">
<label for="stdEmail">Password:</label>
<input type="text" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Enter Password" required>
</div>

<div class="form-group">
<button type="submit" class="btn  btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Login Details</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>

</div>
</div> 
</form>  
</div> 
       
</div>

 </div>
 
 
</div> 
</aside>

</div>

</div>
   <!-- change photo Modal -->
              <div aria-hidden="true" aria-labelledby="photoup" role="dialog" tabindex="-1" id="photoup" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Change Picture ?</h4>
                          </div>
                          <div class="modal-body">
                             <form id="changepic" class="submitForm" role="form" action="#">
							 <input type="hidden" id="stdAddNum"  name="stdAddNum" class="form-control" value="<?php echo $stdAddNum; ?>" />
							   <input type="hidden"  name="option"  id="option" class="form-control" value="studentPanel" />
							 <input type="hidden"  name="action" class="form-control" value="changeProfPic" />
							  <div class="form-group">
							<label for="password">Photo:</label>
							<input type="file" id="photo"  name="photo" class="form-control" value="" required />
								</div>
    
   
             <div class="form-group">
              <button class="btn btn-success col-md-6" type="submit">Change Picture</button> 
			  </div>
                      </form>  
            
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-warning" type="button">Close</button>
                              </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->
   
   
<?php  //include JS files
  foreach ($arr_scripts as $eachscript) {
  	echo '<script type="text/JavaScript" src="../style/' . $eachscript . '"></script>' . "\n";
  }
  ?>  
 