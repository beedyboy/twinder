// JavaScript Document 
function nextfunction(exambankId){
if(exambankId == ''){
alert("Exam group can not be empty.");
}
else { 
$('#f1').empty();
$("#f1").html('loading courses');
$.ajax({
url:'templates/getCourseFile.php?exambankId='+exambankId,
cache:false, 
success:function(html){ 
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
var hh=$(html).filter("#courseId");
$('#f1').empty();
$('#f1').append(html);
}
}
});	
}
}

function myFunction(subId, exambankId){ 
 if(subId == ''){
swal("Course File can not be empty.");
}
else {  
//alert(exambankId);
$.ajax({  
url:'templates/exam_settings_fetcher.php?exambankId='+exambankId+'&subId='+subId,
cache:false,
beforeSend: function(){
var loading_text = '<img src="images/loading.gif">';
$("#no_ques1").html(loading_text);
$("#mark1").html(loading_text);
$("#datee").html(loading_text);
$("#slidepanel").html(loading_text);
$("#instruction").html(loading_text);
$("#showsorting").html(loading_text);
$("#showresult").html(loading_text);
},
success:function(html){
	 
if(html==0){
alert("something is wrong");
return false;
}
else {
	
//alert("everything is alright");	
var hh= $(html).filter("#duration");
var no_quess= $(html).filter("#no_ques");
var datee= $(html).filter("#date");
var mark1= $(html).filter("#mark");
var instruction= $(html).filter("#instruction");
var random= $(html).filter("#showsorting1");
var Show_Result= $(html).filter("#showresults");
$('#examd').empty();
$('#no_ques1').empty();
$('#mark1').empty();
$('#date1').empty();
$('#slidepanel').empty();
$('#showsorting1').empty();
$('#showresult1').empty();
$('#examd').append(hh);
$('#date1').append(datee);
$('#mark1').append(mark1);
$('#slidepanel').append(instruction);
$('#no_ques1').append(no_quess);
$('#showsorting1').append(random);
$('#showresult1').append(Show_Result);
 	

 
}
}
});	
}
}

function previewFace(faceId){
if(faceId == ''){
alert("Select Interface.");
}
else { 
var exambankId=document.getElementById('exambankId').value;
var subId=document.getElementById('subId').value;
$('#previewFaces').empty();
$("#previewFaces").html('loading preview');
$.ajax({  
url:'templates/previewFaces.php?faceId='+faceId+'&subId='+subId+'&exambankId='+exambankId,
cache:false, 
success:function(html){ 
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
var hh=$(html).filter("#courseId");
$('#previewFaces').empty();
$('#previewFaces').append(html);
}
}
});	
}
}

function showResult(classId){
  
$.ajax({
url:'check_result.php.php?classId='+classId,
cache:false,
beforeSend: function(){
var loading_text = '<img src="../images/loading.gif">';
 $("#Show_Result").html(loading_text);
},
success:function(html){
 
$('#showresult1').empty();
$('#showresult1').append(html);
 					
 
}
 
});	
}

 
function saves(){
	var re = '';
	document.getElementById('showresult').checked = false;
	if(document.getElementById('showsorting').checked)
	{ re="Yes"; }
else{
re="No";}
	alert(re);
}

function save(){
var exambankId=document.getElementById('exambankId').value;
var subId=document.getElementById('subId').value;
var no_ques=document.getElementById('no_ques').value;
var mark=document.getElementById('mark').value;
var duration=document.getElementById('duration').value;
var date=document.getElementById('date').value;
var instruction=document.getElementById('instruction').value;
var getface=document.getElementById('getface').value;
var examTypeId=document.getElementById('examTypeId').value;
var showresult= ''; 
var showsorting= ''; 
if(document.getElementById('showresult').checked)
	{ showresult="Yes"; }
else{
showresult="No"; }
if(document.getElementById('showsorting').checked)
	{ showsorting="Yes"; }
else{
showsorting="No"; }
//var showresult= $('input[name="showresult"]:checked').val();
//alert(subId+'='+ showsorting);

	//	alert(exambankId);
$.ajax({
url:'templates/save_exam_settings.php?subId='+subId+'&exambankId='+exambankId+'&no_ques='+no_ques+'&mark='+mark+'&duration='+duration+'&date='+date+'&instruction='+instruction+'&getface='+getface+'&examTypeId='+examTypeId+'&showsorting='+showsorting+'&showresult='+showresult,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}else{
//alert("everything is alright");	
alert(html);
document.getElementById('subId').reset;
document.getElementById('mark').reset;
document.getElementById('duration').reset;
document.getElementById('date').reset;
document.getElementById('instruction').reset;
document.getElementById('getface').reset;
document.getElementById('no_ques').reset;
 
}
}
});	
}
//settings for getting general Term 

function reset(){  
document.getElementById('exambankId').value= "" ;
document.getElementById('subId').value= "";
document.getElementById('mark').value= "";
document.getElementById('duration').value= "";
document.getElementById('date').value= "";
document.getElementById('instruction').value= "";
document.getElementById('getface').value= "";
document.getElementById('no_ques').value= "";
document.getElementById('examTypeId').value= "";
$('#previewFaces').empty();
}
//settings for getting general Term 

function getGroupSubject(exambankId){
//var exambankId= document.getElementById('exambankId').value;
if(exambankId ==''){
alert("Please select a group.");
}
else {
$.ajax({
url:'templates/getGroupSubject.php?exambankId='+exambankId,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#groupSubSelect').empty();
$('#groupSubSelect').append(html);
}
} 
});	
}
}

function getSubjectClass(subId){
//var exambankId= document.getElementById('exambankId').value;
if(subId ==''){
alert("Please select a subject.");
}
else {
$.ajax({
url:'templates/getSubjectClass.php?subId='+subId,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#classSelect').empty();
$('#classSelect').append(html);
}
} 
});	
}
}

function getGroupBatch(bankId){
//var exambankId= document.getElementById('bankId').value;
if(bankId ==''){
alert("Please select a subject.");
}
else {
$.ajax({
url:'templates/getGroupBatch.php?bankId='+bankId,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#sessionselect').empty();
$('#sessionselect').append(html);
}
} 
});	
}
}

function getStudentBatch(stdAddNum){
//var exambankId= document.getElementById('bankId').value;
if(stdAddNum ==''){
alert("Please select a student.");
}
else {
$.ajax({
url:'templates/getStudentBatch.php?stdAddNum='+stdAddNum,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#sessionselect').empty();
$('#sessionselect').append(html);
}
} 
});	
}
}
//settings for gettng general classes and subjects
//settings for getting general Term 

function getGeneralTerm(genStdBatchId){
var session= document.getElementById('genStdBatchId').value;
if(session ==''){
alert("Please select a session.");
}
else {
$.ajax({
url:'templates/getGeneralTerm.php?genStdBatchId='+genStdBatchId,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#termselect').empty();
$('#termselect').append(html);
}
} 
});	
}
}
//settings for gettng general classes and subjects

function getGeneralClassSubject()
{
getGeneralClass();
getGeneralSubject();
}
//settings for getting class 

function getGeneralClass(){
var session= document.getElementById('session').value;
var term= document.getElementById('term').value;
$.ajax({
url:'getGeneralClass.php?session='+session+'&term='+term,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#classselect').empty();
$('#classselect').append(html);
}
} 
});	
}
//general class ends up here

//settings for getting general results 
function getGeneralSubject(){
var session= document.getElementById('session').value;
var term= document.getElementById('term').value;
$.ajax({
url:'getGeneralSubject.php?session='+session+'&term='+term,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#subjectselect').empty();
$('#subjectselect').append(html);
}
} 
});	
}
//settings for getting studentName
function getGeneralStudent(){
var session= document.getElementById('session').value;
var term= document.getElementById('term').value;
$.ajax({
url:'getGeneralStudent.php?session='+session+'&term='+term,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#studentName').empty();
$('#studentName').append(html);
}
} 
});	
}
//**********get result sheet starts down here$#####
function getGeneralResult()
{
var session= document.getElementById('session').value;
var term= document.getElementById('term').value;
if(session ==''){
alert("Please select a session.");
}
else { 
$.ajax({
url:'getGeneralResult.php?session='+session+'&term='+term,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#resultsheet').empty();
$('#resultsheet').append(html);
}
} 
});	
}													 
}
//result sheet ends up
//get generalClassResult function'
function getGeneralClassResult()
{
var session= document.getElementById('session').value;
var term= document.getElementById('term').value;
var generalclass=document.getElementById('generalclass').value;
if(generalclass ==''){
alert("Please select a class.");
}
else { 
$.ajax({
url:'getGeneralClassResult.php?session='+session+'&term='+term+'&generalclass='+generalclass,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#resultsheet').empty();
$('#resultsheet').append(html);
}
} 
});	
}													 
}
//getgeneral subject result function
//**********get result sheet starts down here$#####
function getGeneralSubjectResult()
{
var session= document.getElementById('session').value;
var term= document.getElementById('term').value;
var subjectname=document.getElementById('subjectname').value;
if(subjectname ==''){
alert("Please select a subject name.");
}
else { 
$.ajax({
url:'getGeneralSubjectResult.php?session='+session+'&term='+term+'&generalclass='+generalclass+'&subjectname='+subjectname,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#resultsheet').empty();
$('#resultsheet').append(html);
}
} 
});	
}													 
}
//get generalStudentResult function'
function getGeneralStudentResult()
{
var session= document.getElementById('session').value;
var term= document.getElementById('term').value;
var name=document.getElementById('name').value;
if(getGeneralStudentResult ==''){
alert("Please select a Student.");
}
else { 
$.ajax({
url:'getGeneralStudentResult.php?session='+session+'&term='+term+'&name='+name,
cache:false,
success:function(html){
if(html==0){
alert("something is wrong");
return false;
}
else {
//alert("everything is alright");	
$('#resultsheet').empty();
$('#resultsheet').append(html);
}
} 
});	
}		 
}
//start exam function here
function startExam(exam_id)
{ 
$.ajax({
type:"GET",
//url:'mark.php?answers='+answers+'&questions='+questions,
url:'startExam.php?exam_id='+exam_id,
success: function(msg)
{
//  $('#stopExam').prop('disabled', false);
//  $('#startExam').prop('disabled', true);
refreshExamProgress();
alert(msg);
}
});		 
}
//stop exam function here
function stopExam(exam_id)
{ 
// alert('hi');
$.ajax({
type:"GET",
//url:'mark.php?answers='+answers+'&questions='+questions,
url:'stopExam.php?exam_id='+exam_id,
success: function(msg)
{
refreshExamProgress();	
alert(msg);
// $('#startExam').prop('disabled', false);
//$('#stopExam').attr("disabled", true);
//  $('#status').html('Inactive');
}
});		 
}