<?php 
// include('../../includes/system.php');

 $bankId=$_GET['bankId'];
 $stdAddNum=$_SESSION['cbt']['stdAddNum'];
 $loadStdProfile = $GetStudent->loadStdProfile($stdAddNum); 
while($Profile = $loadStdProfile->fetch(PDO::FETCH_ASSOC))
{	
$stdSurname = $Profile['stdSurname']; 
$stdFirstName = $Profile['stdFirstName']; 
$stdMiddleName=$Profile['stdMiddleName'];
$stdPicture= $Profile['stdPicture'];
$stdEmail = $Profile['stdEmail'];  
$stdGender = $Profile['stdGender'];
$stdDob=$Profile['stdDob']; 

$classId=$Profile['classId']; 
$genStdBatchId=$Profile['genStdBatchId'];  
$active=$Profile['Active'];  
}
 
$className =System::getColById('beedyclasslist', 'classId', $classId, 1); 
 ?> 
 
<?php $subId = System::getName('beedygroupsub', 'bankId',$bankId,1); ?>
 <?php $exambankId = System::getName('beedygroupsub', 'bankId',$bankId, 3); ?>
<?php $Exam_Instruction = System::getName('beedygroupsub', 'bankId',$bankId,5); ?>
<?php $duration = System::getName('beedygroupsub', 'bankId',$bankId,6); ?>
<?php $random = System::getName('beedygroupsub', 'bankId',$bankId,10); ?>
<?php $examTypeId = System::getName('beedygroupsub', 'bankId',$bankId, 2); ?>
<?php $examType = System::getName('beedyexamtype', 'examTypeId', $examTypeId,1); ?>
 <?php $TotalQuestion = System::getName('beedygroupsub', 'bankId',$bankId,7); ?>
 
 <?php $loadIntQuestion =NULL;
 if($random =="Yes"): 
$loadIntQuestion =   Examination::loadIntQuestion($bankId, $TotalQuestion);
else: 
$loadIntQuestion =   Examination::loadIntQuestion2($bankId, $TotalQuestion);
endif;
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client System</title>   
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../assets/css/bootstrap-toggle.css" rel="stylesheet">
<link href="../assets/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../src/update.css" />
  <!-- include summernote css/js--> 
          <link href="../assets/css/line-icons.css" rel="stylesheet" type="text/css">
              <link href="../assets/css/elegant-icons-style.css" rel="stylesheet" type="text/css">
 	<link rel="stylesheet" href="../assets/dist/sweetalert.css">
 	<style type="text/css">
	/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
/* Hide default HTML checkbox */
.switch input {display:none; }
/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #D2322D;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "No";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #47A447;
  color: #fff;
  font-weight: bold;
}
input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
  content: "Yes";
  color: #000;
   font-weight: bold;
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
 	.black-img-white {
	background-image: url(images/bg.jpg);
	color:#FFF;
}
	.blue-img-white {
	background:#E9EAED;
	color:#00008B;
	 font-weight: bold;
}
 
    </style> 
</head>
<body>

<div class="row">
 <div class="col-lg-12">
 <div class="col-lg-12 examTitle">
   <?php echo $examType; ?>  
 </div>
 <!--exam body -->
  <div class="col-lg-12">
  
<div class="row bodyMin ">
  <div class="col-lg-3 allborder examPanelRL ">
   <!--student details -->
   <div class="col-lg-12">
  <h2 class=" ">	
<i class="fa fa-user"></i>  Student Profile	
</h2>
   <img class="img-square" src="../<?php echo $stdPicture; ?>" alt="No Image"
   width="120" height="140">	
    
   </div>
   <!--student details end-->

<table class="table table-striped table-bordered">
<tr>
<th>Student ID</th>
<td><?php echo $stdAddNum; ?></td>
</tr>
<tr>
<th>Full Name</th>
<td><a href="#"  id="<?php echo $stdAddNum; ?>"><?php echo $stdSurname." ".$stdFirstName; ?></a></td>
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
</table>
 </div>
 
 <div class="col-lg-6 examPanel allborder" id="examPanel">
 <div class="subName">  <?php echo System::getName('beedysubjectlist', 'subId', $subId, 1); ?>  </div>
 
 <!--exam-->
 <table class="table table-striped table-bordered">
    <form id="oneForm" class="submitForm form-horizontal" method="post" role="form" action="#">
	
	<input type="hidden" name="bankId" value="<?php echo $bankId; ?>" >
	<?php
 	  if(!empty($loadIntQuestion)):	
	$i = 0; 
  //foreach($loadIntQuestion as $Load): 
	while($Load = $loadIntQuestion->fetch(PDO::FETCH_ASSOC)){
	$i++; 
	$Exam_Question_Logo =$Load['Exam_Question_Logo']; $Question_Id =$Load['Question_Id']; ?>
 <tr>
   <td><?php echo $i; ?>. <?php echo $Load['Exam_Question']; ?></td>
  </tr>
 <tr>
   <td> 
  <?php   
     if($Exam_Question_Logo != ""):
		  ?>

     

<table class="table table-bordered">
<tr>
<td> 
<div id='slidepanel'>
<img src='../<?php echo $Exam_Question_Logo; ?>' width='60%' height='100' >
</div>
</td> 
<td>
  <div id='accpanel'>
<ul>
<li class='left'>Click here &raquo;</li>
<li class='right' id='toggle'><a id='slideit' href='#slidepanel' style='font-weight:bold;'>Show Diagram</a>
<a id='closeit' style='display: none;' href='#slidepanel'>Hide Diagram</a></li>
</ul>
</div> 
</td>
</tr>
</table>
    <?php endif;	  ?>
	</td>
   </tr> 
   <tr>
    <input type="hidden"  name="questionGiven[]" value="<?php echo $Question_Id; ?>">
    <td><span class="<?php if($Load['Exam_Option_A'] ==""): echo "hide"; endif; ?>">
	<input type="radio" id="options[]"  name="options[<?php echo $Question_Id; ?>]" value="A">
   <?php echo $Load['Exam_Option_A']; ?> </span>
    <span class="<?php if($Load['Exam_Option_B']==""): echo "hide"; endif; ?>">  <input type="radio" id="options[]"  name="options[<?php echo $Question_Id; ?>]" value="B">
     <?php echo $Load['Exam_Option_B']; ?></span>
      <span class="<?php if($Load['Exam_Option_C'] == " " || $Load['Exam_Option_C'] == NULL): echo "hide"; endif; ?>">
	  <input type="radio" id="options[]"  name="options[<?php echo $Question_Id; ?>]" value="C">
      <?php echo $Load['Exam_Option_C']; ?>
	  </span>
    <span class="<?php if($Load['Exam_Option_D'] == " " || $Load['Exam_Option_D'] == NULL): echo "hide"; endif; ?>"> 
	<input type="radio" id="options[]" name="options[<?php echo $Question_Id; ?>]" value="D">
      <?php echo $Load['Exam_Option_D']; ?>
	  </span>
	  </td>
</tr>
<?php // endforeach; ?> <?php } endif;  ?>
<tr>
<td align="center"> 
<button type="submit"  id="submit" class="btn btn-info  pull-right"  title="Click to Submit">
<img class="icon-small" src="images/Save.png" />&nbsp;Finish</button>
</td>
</tr>

</form>
 </table>
 <!--exam-->
 </div> 
 
  <div class="col-lg-3 allborder examPanelRL">
  <div class="col-lg-12">  
  <font color=red>Maximum duration:
  <img src="templates/interfaces/images/images (6).jpg" width="20" height="20"> <div class="badge">
  <span class="time">
  <div class="clock">
				<!-- <span class="countdown">0</span>minutes -->
 <span align="center" style="font-size:24px; background:#FFF;">
 <span style="color:black;" class="min"><?php echo $duration; ?></span>
 <span style="color:white;"> <span style="color:black"> : </span></span>
 <span style="color:black;" class="sec">00</span>
 </span>
	  </div>
    </span>  
   </font>
 </div> 

 </div> 
   <div class="col-lg-12">
   <hr class="pageGuide"/>
 
   <span class="element"><font color="red"> Date:</font></span> 
<span class="badge">
 <?php 			$Today = date('y:m:d'); $new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>
								</span> 
   <br />
  <span class="element"><font color="red"> Instruction:</font></span>   
<span style="background:#67717A;" id="num"><font color="#fff"> <?php echo $Exam_Instruction; ?> </font></span></span>
 <hr class="pageGuide"/>  
 
 <div class="questionPal">
  
 </div>
<!-- questionPal-->
<span> <button class="btn btn-warning">Profile </button> 
<button class="btn btn-info">Instruction </button>
 </span>
 </div>
  
 <!--right end-->
 </div>

 </div>
  <!--exam body -->
 
 
 </div>
 
 
 <div class="col-lg-2 lstColor footer">
 </div>
 
 
 </div>
 </div>
     <script src="assets/js/jquery.js"></script>
	 <script src="assets/dist/sweetalert-dev.js"></script>
 
		<script type="text/javascript">
	$(document).ready( function() {  	
	$('#submit').click( function(e) {
	e.preventDefault(); 
		var formdata = $("#oneForm").serialize();
			$.ajax({
			type: "POST",
			url: "templates/interfaces/markOne.php",
			data: formdata,
			cache: false,
			success: function(html){ 
				$('.clock').empty();
				$('#examPanel').empty();
				$('#examPanel').append(html);
				$('#control').empty();
			} 
			}); 
		 
			 
		});	 

		function submitOption(evt){
evt.preventDefault(); 
		var formdata = $("#oneForm").serialize();
			$.ajax({
			type: "POST", 
			url: "templates/interfaces/markOne.php",
			data: formdata,
			cache: false,
			success: function(html){
				$('.clock').empty();
				$('#examPanel').empty();
				$('#examPanel').append(html);
				$('#control').empty();
			} 
			}); 
		 
		 
	}
		
		//ends here
		});				
	 
</script>


  <script type="text/javascript">
function countdown(){

  var m = $('.min');
    var s = $('.sec');
    if(parseInt(m.html()) <=0  && parseInt(s.html()) <=0 )
    {
      submitOption();
    }
    else if(parseInt(m.html()) > 0 && parseInt(s.html()) <=0 )
    {
      m.html(parseInt(m.html()-1));
      s.html(60); 
    }
    else if(parseInt(m.html()) <= 0 && parseInt(s.html()) >0 )
    {
      s.html(parseInt(s.html()-1));
      // s.html(60); 
    }


		/*var m = $('.min');
		var s = $('.sec');
		if(m.html()==0 && parseInt(s.html()) <= 0){
			//$('.clock').html('Time UP.');
			 submitOption();
		}
		if(parseInt(s.html()) <=0 ){
			m.html(parseInt(m.html()-1));
			s.html(60);
		}
		if(parseInt(s.html()) <=0){
			$('.clock').html('<span class="sec">59</span> seconds. ');
		}
		s.html(parseInt(s.html()-1));
}*/
	 setInterval ('countdown()', 1000);	//setInterval ('countdown()', 1000);

</script> 
 