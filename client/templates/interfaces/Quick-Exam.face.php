<?php 
// include('includes/system.php');

$duration =NULL;
$seconds = NULL;
if(!isset($_SESSION['cbt']['bankId'])): 
 $bankId = $_SESSION['cbt']['bankId'] =$_GET['bankId']; 
else:
 $bankId = $_SESSION['cbt']['bankId']; 
endif;
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
<?php
 if(!isset($_SESSION['cbt']['duration'])):
$_SESSION['cbt']['duration'] =$duration = System::getName('beedygroupsub', 'bankId',$bankId,6);
$_SESSION['cbt']['seconds'] = $seconds = '00'; 
// echo "time not set";
else:
$duration = $_SESSION['cbt']['duration'];
$seconds = $_SESSION['cbt']['seconds']; 
// echo "time  set";
endif; 
?>
<?php  
$process= $GetExam->process($stdAddNum,$bankId); 		
if($process ==1):
 echo "<script>";
echo "alert('You have already done this examination');";
echo "setTimeout( function() { window.location='log/logout.php'; },5000);";
  
 echo "</script>";

endif;

$random = $_SESSION['random']= System::getName('beedygroupsub', 'bankId',$bankId,10); ?>
<?php $examTypeId = System::getName('beedygroupsub', 'bankId',$bankId, 2); ?>
<?php $examType = System::getName('beedyexamtype', 'examTypeId', $examTypeId,1); ?>
<?php $Total_Question = System::getName('beedygroupsub', 'bankId',$bankId,7); ?>
<?php $Mark = System::getName('beedygroupsub', 'bankId',$bankId,8); ?> 
 <?php $show_result = System::getName('beedygroupsub', 'bankId',$bankId, 11); ?>
<?php

define('_BEEDY_EXAM_DETAILS', $Total_Question);

$_SESSION['Total_Question']=$Total_Question;
include_once('Quick-Exam_include.php');
?>


<div class="row">
<div class="col-lg-12">
<div class="col-lg-12 examTitle">
<?php echo $examType; ?>  
</div>
<!--exam body -->
<div class="col-lg-12">

<div class="row bodyMin" id="row-main">
<div id="stdDetails" class="col-lg-3 allborder examPanelRL ">
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

<div id="mainexamcont">
<table align="center" width='50%'  class='table table-condensed'>
<tbody>
<tr>
<td width="10%">
<input  id="total"  value="<?php echo $Total_Question; ?>"  type="hidden"/> 
</td>

<tr>
<td height="65">
<div id="question_log">



</div>

</td>
</tr>
<td width="90%">
<div id="">
 <div id="exm_right_side_bar">

<h1 align="center" id="stdnme" style="color:#666">EXAMINATION INSTRUCTION</h1>
<br>
<div id="intro" align="center" style="color:#000000; font-weight:bolder;"> <?php  echo $Exam_Instruction; ?> </div>

</div>
</div> 
</td>
<tr>
<td height="65">
<div id="right_buttons">
<span id="buttonCollection"> 

<button  type="submit" class="btn btn-warning pull-left col-lg-2 startExamd" id="startExamd" <?php if($process !=1): ?> onClick="startExam(1);" <?php endif; ?>> Start Exam</button>
<button  type="submit" class="btn btn-danger col-lg-offset-1  col-lg-4 saveExamd" id="saveExamd"  onClick="submitOption();"> Save And Exist</button>
<button  type="submit" class="btn btn-info col-lg-offset-1  nextExamd" id="nextExamd"  onClick="nextClickfunction();"> Next</button>

</span>

</div>

</td>
</tr>
</tbody>
</table>
</div>


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
<span style="color:black;" class="min"><?php if($duration > 0): echo $duration; else: echo '00'; endif; ?></span>
<span style="color:white;"> <span style="color:black"> : </span></span>
<span style="color:black;" class="sec"><?php  if($seconds > 0): echo $seconds; else: echo '00'; endif;  ?> </span>
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
<span style="background:#67717A;" ><font color="#000"> <?php echo $Exam_Instruction; ?> </font></span></span>
<hr class="pageGuide"/>  

<div id="right_buttons">
<span id="buttonCollection"> 

<button  type="submit" class="btn btn-warning startExam" id="startExam"  <?php if($process !=1): ?> onClick="startExam(1);" <?php endif; ?>> Start Exam</button>
<button  type="submit" class="btn btn-danger saveExam" id="saveExam"  onClick="submitOption();"> Save And Exist</button>
<button  type="submit" class="btn btn-info nextExam" id="nextExam"  onClick="nextClickfunction();"> Next</button>

</span>

</div>

<div class="questionPal">
<div id="questionPal"> 
<br />
<?php


$totalNoToAnswer= $Total_Question;
$twoD[]= array();


for ($x=1; $x<=$totalNoToAnswer; $x++)
{

?>
<input  type="hidden"  class="btn btn-default" id="qnum<?php echo $x; ?>" /> 
 
<input type="hidden"  class="action<?php echo $x; ?>"   id="<?php echo $x; ?>"  value="<?php echo  $_SESSION['final'][$x]; ?>"/>


<?php

}

//echo $bank[2];
function check($pass)
{
$_SESSION['value'] = $pass;
?>
<script  type="text/javascript">

alert(<?php $_SESSION['value']; ?>);
nextfunction(<?=$_SESSION['value']; ?>);

</script>
<?php
} 

echo "<br>";

?> 
</div>
</div>
<!-- questionPal-->
 
<legend>Legend:</legend>
 <hr class="pageGuide"/> 
<span>Answered&nbsp;<button class="btn btn-lg btn-success"></button> </span>
<span>Not Answered&nbsp;<button class="btn btn-lg btn-danger"></button> </span>
<hr class="pageGuide"/>  
<span>Not Visited&nbsp;<button class="btn btn-lg btn-default"></button> </span>
 
<br />
<br />
<hr class="pageGuide"/>  
<span> <button class="btn btn-warning" id="stdProBtn">Profile </button> 
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


<script type="text/javascript"> 

function countdown()
{
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
		/*if(parseInt(m.html()) == 00 && parseInt(s.html()) == 0)
		{
			m.html('<span class="sec">0</span> ');
			h.html('<span class="sec">0</span>  ');
			//$('.clock').html('Time UP.');
			
			// $("#startExam").prop('disabled',true);  
			// $("#startExamd").attr('disabled',true);  
			submitOption();
		}
		else
		{

		if(parseInt(m.html()) > 0 && parseInt(s.html()) <=0 )
		{
			m.html(parseInt(m.html()-1));
			s.html(60); 
		}
		else
		{

		if(parseInt(s.html()) <=0)
		{
			$('.clock').html('<span class="sec">59</span> seconds. ');
		}
		s.html(parseInt(s.html()-1));	
		}
		}*/
}

</script>

<script type="text/javascript">
 var questions = new Array(<?php echo $Total_Question; ?>);
var answers = new Array(<?php echo $Total_Question-1; ?>);
var viewed = new Array(<?php echo $Total_Question; ?>);
 
var refreshDigit = 2; 
var  refreshValue = getStoredValue('refreshedStatus');
var  lastKey = parseInt(getStoredValue('lastKey'));
 
  
	document.getElementById('saveExam').disabled= true;    
	document.getElementById('nextExam').disabled= true;   
	document.getElementById('saveExamd').disabled= true;    
	document.getElementById('nextExamd').disabled= true;    
	document.getElementById('questionPal').style.display="none"; 

 var list = localStorage.getItem("list") || "[]";
 var answersList = localStorage.getItem("answersList") || "[]";
 var viewedList = localStorage.getItem("viewedList") || "[]"; 
 //questions = localStorage.getItem("list");
 questions = JSON.parse(list);
 answers = JSON.parse(answersList);
 viewed = JSON.parse(viewedList);

//var pageRefreshed = loc
function updateQuestion()
{
 //alert("seen");
 var updateQuestion = localStorage.getItem("list") || "[]";
 questions = JSON.parse(updateQuestion);
 //alert(questions);
}

function updateAnswer()
{ 
 var updateAnswer = localStorage.getItem("answersList") || "[]";
 answers = JSON.parse(updateAnswer); 
}


function updateViewed()
{ 
 var updateViewed = localStorage.getItem("viewedList") || "[]";
 viewed = JSON.parse(updateViewed); 
}

 setInterval('updateQuestion()', 1000);
 setInterval('updateAnswer()', 1000);
 setInterval('updateViewed()', 1000);
setInterval('updateDuration()', 100);

//var questions = JSON.parse(localStorage.getItem('list'));
//var questions = JSON.parse(localStorage.getItem('list'));


var queid=0;
var studentId=<?php echo $stdAddNum; ?>;
var mark=<?php echo $Mark; ?>; 
var random='<?php echo $random; ?>';
var show_result='<?php echo $show_result; ?>';
var bankId='<?php echo $bankId; ?>'; 
	//$(".questionPal").hide();

 if(refreshValue === null){ 
//alert('not set'); 
storeValue('refreshedStatus', 2);
}
else
{
 if(refreshValue >=2){
//var n =refreshValue+refreshDigit;
var n =parseInt(getStoredValue('refreshedStatus'));
	n +=refreshDigit;  
storeValue('refreshedStatus', n);  
 updateRefresh();  
}
 //alert('set'); 
}


function storeValue(key, value){
if(localStorage){
return localStorage.setItem(key, value);
}
else{
return $.cookies.set(key, value);
	}
}
function getStoredValue(key){
	if(localStorage){
return localStorage.getItem(key);
}
else{
return $.cookies.get(key);
	}
} 


function clearStorage(){
window.localStorage.clear();
}
 
  
function startExam(ban){
//the question number from the button here
queid=ban; 
var j = $('.action'+ban).val();
//alert("hello."+ j);
var total= <?php echo $Total_Question; ?>; 

if(queid == <?php echo $Total_Question + 1; ?>)
{ 
alert("You have successfully completed the test, please click End button and Logout.");
}

else {
//the question number is incremented by one here
//questionNumber++;
questions[ban] =j;
viewed[ban] =ban; 
localStorage.setItem('list', JSON.stringify(questions));  
localStorage.setItem('viewedList', JSON.stringify(viewed));  
storeValue('lastKey', queid);
//localStorage.setItem('list', JSON.stringify(questions)); 
var number=ban;
// var j= document.getElementById(ban).value;
//alert(queid);
var questionNumber=j; 

$.ajax({

url:'templates/interfaces/Quick_Exam_array.php?id='+number+'&index='+questionNumber+'&total='+total,

cache:false,

success:function(html){

if(html==0){

alert("something is wrong");
return false;
}

else {
//alert("everything is alright");	

var nn=$(html).filter("#numof");
$('#exm_right_side_bar').empty();

$('#exm_right_side_bar').append(html);

$('#num').empty();

$('#num').append(nn.val());


}


}
});	

}  
$("#startExam").attr('disabled',true);  
$("#saveExam").attr('disabled',false);      
$("#nextExam").attr('disabled',false);        
	
$("#startExamd").attr('disabled',true);  
$("#saveExamd").attr('disabled',false);      
$("#nextExamd").attr('disabled',false);        
	document.getElementById('questionPal').style.display="block"   
setInterval ('countdown()', 1000);

}

 
function nextClickfunction(){

queid++;
var	ban = queid;
var j = $('.action'+ban).val();
var total= <?php echo $Total_Question; ?>;	
//	 document.getElementsByName(ban).item(0).value;
if(queid == <?php echo $Total_Question + 1; ?>){
alert("You have successfully completed the test, please click End button and Logout.");
} 
else { 
questions[ban] =j; 
viewed[ban] =ban;
localStorage.setItem('list', JSON.stringify(questions));  
localStorage.setItem('viewedList', JSON.stringify(viewed));  
storeValue('lastKey', queid);
var number=ban; 

var questionNumber=j;
$.ajax({

url:'templates/interfaces/Quick_Exam_array.php?id='+number+'&random='+random+'&index='+questionNumber+'&total='+total,

cache:false,

success:function(html){ 
if(html==0){

alert("something is wrong");

return false;

}

else {
//alert("everything is alright");
//alert(html);
var nn=$(html).filter(".numof"); 
$('#exm_right_side_bar').empty();

answered(queid);
$('#exm_right_side_bar').append(html);
$('#num').empty();

$('#num').append(nn.val());

pickOption();	
}


}
});	

}




}

//---------------------------//submit option here-----------------------//
function optionClicked(){
if (queid >= 0){

if($("input:radio[class='A']").is(":checked"))
{
answered(queid);
answers[queid]='A'; 
localStorage.setItem('answersList', JSON.stringify(answers));  
}

else if($("input:radio[class='B']").is(":checked"))
{
answered(queid);
answers[queid]='B';
localStorage.setItem('answersList', JSON.stringify(answers));  
}

else if($("input:radio[class='C']").is(":checked"))
{
answered(queid);
answers[queid]='C';
localStorage.setItem('answersList', JSON.stringify(answers));  
}

else if($("input:radio[class='D']").is(":checked"))
{
answered(queid);
answers[queid]='D';
localStorage.setItem('answersList', JSON.stringify(answers));  
}

else{
answers[queid]='';
localStorage.setItem('answersList', JSON.stringify(answers));  
}

}
}

//---------------------------//pick option here-----------------------//

function pickOption(){ 
if(queid >= 0){
answered(queid);
if(answers[queid]=='A'){
$(".A").attr('checked','checked');
//document.getElementById('A').checked = true; 
answered(queid);
}
else if(answers[queid]=='B'){
$(".B").attr('checked','checked'); 
answered(queid);
} 

else if(answers[queid]=='C'){
$(".C").attr('checked','checked'); 
answered(queid);
} 

else if(answers[queid]=='D'){
$(".D").attr('checked','checked'); 
answered(queid);
} 

}

}
 

function answered(sid){
	var myClassName = 'btn-info';
var d;
var u;
   //updateViewed(); 
 if(viewed[sid]==sid){
u = document.getElementById('qnum'+sid);
u.className = u.className.replace("btn-default"," btn-danger"); 

	  if(answers[sid]!=null){
	 
d = document.getElementById('qnum'+sid);
d.className = d.className.replace("btn-danger"," btn-success"); 
} 
 }

	
}
answered(queid);
//document.getElementByClassName('status2')[0].setAttribute("class","btn-success");
  setInterval ('answered(queid)', 100);
//---------submit funnction----------//

function submitOption(){
// alert('f');
$.ajax({
url:'templates/interfaces/beedy_free_mark.php?answers='+answers+'&questions='+questions+'&bankId='+bankId,

cache:false,

success:function(html){
// alert(html);
if(html==0){

alert("something is wrong");

return false;

}else{
//alert("everything is alright");	
 localStorage.clear();
 $('.clock').empty();

$('#exm_right_side_bar').empty(); 
$('#num').empty();
$('#examPanel').empty();

$('#examPanel').append(html); 
$('#control').empty();
document.getElementById('questionPal').style.display="none";
document.getElementById('nextExam').disabled= true; 
document.getElementById('saveExam').disabled= true;  
document.getElementById('nextExamd').disabled= true; 
document.getElementById('saveExamd').disabled= true; 
 }
}
});	
}
//ends here


function updateDuration(){ 
var m = $('.min');
var s = $('.sec'); 
var min = parseInt(m.html());
var sec = parseInt(s.html());
 
$.ajax({
url:'templates/interfaces/updateDuration.php?m='+min+'&s='+sec, 
cache:false, 
success:function(html){
 //alert("everything is alright"); 
}
});	
 
}
 
function updateRefresh(){
   //updateViewed(); 
	var myClassName = 'btn-info';
var d;
var u;
for(i=0; i<=viewed.length; i++)
{
var pick = viewed[i];
if(pick !=null){
 //alert(pick);
u = document.getElementById('qnum'+pick);
u.className = u.className.replace("btn-default"," btn-danger"); 

	  if(answers[pick]!=null){ 
d = document.getElementById('qnum'+pick);
d.className = d.className.replace("btn-danger"," btn-success"); 


}  
 }
}
}

 //updateRefresh();

</script>      

