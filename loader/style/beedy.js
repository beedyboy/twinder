jQuery(document).ready( function($){
window.onload = init; 
window.clicked = 0;
var pressed = false; 
var chars = [];
function init () { 
$( document ).on( "submit", "#login-form", function( e ) {loginform = $("#login-form"); loginProcess(e);} );
 $( document ).on( "submit", "#CreateLoaderGrp", function( e ) { CreateLoaderGrp(e);} ); 
$( document ).on( "change", "#BnkSchoolTermId", function( e ) { GetBnkSchTermId(e);} ); 
$( document ).on( "change", "#bankGenStdClassId", function( e ) { getBankCourses(e);} ); 
$( document ).on( "submit", "#addNewBankCourse", function( e ) { addNewBankCourse(e);} ); 
 
 $( document ).on( "change", "#classIdSelect", function( e ) { getSubjectList(e);} );
// add section here 
// alert('hey');

function loginProcess(evt){
var _this = $(evt.target);
evt.preventDefault();
var username = $(_this).find('#username').val();
var password = $(_this).find('#password').val();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Loading..');
if( username == "" || password == "" ){
$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i> Check your login credentials! Something is empty!</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Login');
}
else {
$.ajax({
	url:'loader.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
			$("#login-bottom").removeClass('hide').addClass('alert-success').html('<p>Logging in......</p>');
			 location.href='../loader/';
			 } 
		else if(result == 3) {
			$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p>You do not have access to the server .</p>');
			$(_this).find(':input').attr('disabled',false);
			$(_this).find(':button').attr('disabled',false);
			$(_this).find(':button').html('Login');
			}
			else{
			$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p>No user is registered using this credentials.</p>');
			$(_this).find(':input').attr('disabled',false);
			$(_this).find(':button').attr('disabled',false);
			$(_this).find(':button').html('Login');
		}
	}
});
}
return this;
}
 //setInterval(function() {red();}, 500);
  
$("#AddComplete").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "loader.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,     // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false ,
success: function(result)   // A function to be called if request succeeds
{ 
// alert(result);
 if(result == 1) {
			swal("Question added successfully");
			$("form").find(':input').attr('disabled',false);
			$("form").find(':button').attr('disabled',false);
			$(".submit").html('<img class="icon-small" src="images/Save.png" />&nbsp;Save Question');
		 reloadHeader();	
		 $("form").trigger("reset");		 
		 $(".summernote").summernote("reset");
		 $('#previewing').attr('src','');
		 $("#add-button").removeClass('alert-danger').addClass('hide').html('<p><i class="fa fa-exclamation-triangle"></i></p>');
	}
			 
	else  {		
$("#add-button").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new question !!! Please try again later.</p>');
	$("form").find(':input').attr('disabled',false);
	$("form").find(':button').attr('disabled',false);
	$(".submit").html('<img class="icon-small" src="images/Save.png" />&nbsp;Save Question');
		 			}  
}
});
}));
$("#AddLogical").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "loader.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,     // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false ,
success: function(result)   // A function to be called if request succeeds
{  
 if(result == 1) {
			swal("Question added successfully");
			$("form").find(':input').attr('disabled',false);
			$("form").find(':button').attr('disabled',false);
			$(".submit").html('<img class="icon-small" src="images/Save.png" />&nbsp;Save Question');
		 reloadHeader();
		 $(".summernote2").summernote("reset");
		 $("form").trigger("reset");
		 $('#previewingL').attr('src','');
		 $("#add-button").removeClass('alert-danger').addClass('hide').html('<p><i class="fa fa-exclamation-triangle"></i></p>');
	}
			 
	else  {		
$("#add-button").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new question !!! Please try again later.</p>');
	$("form").find(':input').attr('disabled',false);
	$("form").find(':button').attr('disabled',false);
	$(".submit").html('<img class="icon-small" src="images/Save.png" />&nbsp;Save Question');
		 			}  
}
});
}));
$("#normalEdit").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "../loader.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,     // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false ,
success: function(result)   // A function to be called if request succeeds
{ 
//swal(result);
 if(result == 1) {
			swal("Question updated successfully");
			$("form").find(':input').attr('disabled',false);
			$("form").find(':button').attr('disabled',false);
			$(".submit").html('<img class="icon-small" src="../images/Save.png" />&nbsp;Update Question');
		 
		 setTimeout(function() { open(location, '_self').close() }, 3000);
		  $("#add-button").removeClass('alert-danger').addClass('hide').html('<p><i class="fa fa-exclamation-triangle"></i></p>');
	}
			 
	else  {		
$("#add-button").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating this question !!! Please try again later.</p>');
	$("form").find(':input').attr('disabled',false);
	$("form").find(':button').attr('disabled',false);
	$(".submit").html('<img class="icon-small" src="../images/Save.png" />&nbsp;Update Question');
		 			}  
}
});
}));
$("#applyCompleteform").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "../loader.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,     // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false ,
success: function(result)   // A function to be called if request succeeds
{ 
//swal(result);
 if(result == 1) {
			swal("Question updated successfully");
			$("form").find(':input').attr('disabled',false);
			$("form").find(':button').attr('disabled',false);
			$(".submit").html('<img class="icon-small" src="../images/Save.png" />&nbsp;Update Question');
		 
		 setTimeout(function() { open(location, '_self').close() }, 3000);
		  
		 $("#add-button").removeClass('alert-danger').addClass('hide').html('<p><i class="fa fa-exclamation-triangle"></i></p>');
	}
			 
	else  {		
$("#add-button").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating this question !!! Please try again later.</p>');
	$("form").find(':input').attr('disabled',false);
	$("form").find(':button').attr('disabled',false);
	$(".submit").html('<img class="icon-small" src="../images/Save.png" />&nbsp;Update Question');
		 			}  
}
});
}));
$("#applyLogicalform").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "../loader.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,     // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false ,
success: function(result)   // A function to be called if request succeeds
{ 
//swal(result);
 if(result == 1) {
 	swal("Question updated successfully");
			$("form").find(':input').attr('disabled',false);
			$("form").find(':button').attr('disabled',false);
			$(".submit").html('<img class="icon-small" src="../images/Save.png" />&nbsp;Update Question');
		  //reloadHeader();	
		// $("form").trigger("reset");
	 setTimeout(function() { open(location, '_self').close(); }, 3000);
	 
		 $("#add-button").removeClass('alert-danger').addClass('hide').html('<p><i class="fa fa-exclamation-triangle"></i></p>');
	}
			 
	else  {		
$("#add-button").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating this question !!! Please try again later.</p>');
	$("form").find(':input').attr('disabled',false);
	$("form").find(':button').attr('disabled',false);
	$(".submit").html('<img class="icon-small" src="../images/Save.png" />&nbsp;Update Question');
		 			}  
}
});
}));

function GetBnkSchTermId(evt){
 var _this = $(evt.target);
evt.preventDefault();
var SchoolTermId = $(_this).serialize();
$("#classCourseName").empty();
$("#classCourseName").html('<p>connecting to the server......</p>');
$.ajax({
		url:'getClsCrsType.php',
		type: 'POST',
		data: SchoolTermId,
		success: function( result ){
		$("#classCourseName").empty();
		$("#classCourseName").append(result);
				}
	});
}
function getBankCourses(evt){
var _this = $(evt.target);
evt.preventDefault();
var genStudentClassId = $(_this).serialize();
$("#bankCourseName").empty();
$("#bankCourseName").html('<p>connecting to the server......</p>');
$.ajax({
		url:'getBankCourses.php',
		type: 'POST',
		data: genStudentClassId,
		success: function( result ){
		$("#bankCourseName").empty();
		$("#bankCourseName").append(result);
				}
	});
}
function CreateLoaderGrp(evt){
var _this = $(evt.target);
evt.preventDefault();
 var formdata = $(_this).serialize();
 $(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');

  $.ajax({
		url:'loader.php',
		type: 'POST',
		data: formdata,
		success: function( result ){ 
	 		if(result == 1) {
 swal("Exam Group has been created successfully");
			loader();
			$(_this).find(':input').attr('disabled',false);
	$(_this).find(':button').attr('disabled',false);
	$(_this).find(':button').html('<img class="icon-small" src="images/Save.png" />&nbsp; Save Group');
	 $(_this).trigger("reset");
						}
	else if(result == 2) {
			swal("Exam Group already exist");
		$(_this).find(':button').html('<img class="icon-small" src="images/Save.png" />&nbsp; Save Group');
		$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
 
 }
	else  {
$("#add-button").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error saving exam group!!! Please try again later.</p>');
	$(_this).find(':input').attr('disabled',false);
	$(_this).find(':button').attr('disabled',false);
	$(_this).find(':button').html('<img class="icon-small" src="images/Save.png" />&nbsp; Save Group');
				}  
				}
	});			 
}
 function addNewBankCourse(evt){
var _this = $(evt.target);
evt.preventDefault();
 var formdata = $(_this).serialize();
 $(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');

  $.ajax({
		url:'loader.php',
		type: 'POST',
		data: formdata,
		success: function( result ){  
		if(result == 1) {
			swal("New Bank Course File has been added successfully");
			refreshList();
			$(_this).find(':input').attr('disabled',false);
	$(_this).find(':button').attr('disabled',false);
	$(_this).find(':button').html('<img class="icon-small" src="images/Save.png" />&nbsp; Save Group');
	 $(_this).trigger("reset");
						}
	else if(result == 2) {
			swal("This Bank Course File already exist under this group");
		$(_this).find(':button').html('<img class="icon-small" src="images/Save.png" />&nbsp; Save Group');
		$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
 
 }
	else  {
$("#add-button").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new Bank Course File!!! Please try again later.</p>');
	$(_this).find(':input').attr('disabled',false);
	$(_this).find(':button').attr('disabled',false);
	$(_this).find(':button').html('<img class="icon-small" src="images/Save.png" />&nbsp; Save Group');
				}  
				}
	});			 
}
 
function setCurrentSems(evt){
var _this = $(evt.target);
evt.preventDefault();
var sid = $(_this).attr("sid");
var action = "setCurrentSems";
//alert(sid);
var formdata = $(_this).serialize();
$.ajax({
		url:'../actions.php',
		type: 'POST',
		data: ({SchoolTermId: sid, action:action}),
		success: function( result ){
			 if(result == 1) {
			alert("Current Term/Semester set successfully");
		refreshAll();
						 }
	else  {
alert("Error setting new Term/Semester!!! Please try again later");
 $(_this).find(':button').html('Set Current');
		 } 
				}
	});
	 return this;
}
 
 

function getSubjectList(evt){
var _this = $(evt.target);
evt.preventDefault();
var classId = $(_this).serialize();
$("#bankCourseName").empty();
$("#bankCourseName").html('<p>connecting to the servers......</p>');
$.ajax({
	url:'templates/getSubjectList.php',
	type: 'POST',
	data: classId,
	success: function( result ){
	$("#bankCourseName").empty();
	$("#bankCourseName").append(result);
			}
});
}

 
function loader(){
setTimeout( function() { $("#examGrp").load("templates/examType.php");},100); 
	
}
loader();



 
}

  
  
  
//	 beedy.babe(access);
// Function to preview image after validation
$(function() {
	
$("#photo").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg","image/gif"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3])))
{
$('#previewing').attr('src','images/NO-IMAGE-AVAILABLE.jpg');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});


});

function imageIsLoaded(e) {
$("#photo").css("color","green");
$('#reg_photo').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '150px');
$('#previewing').attr('height', '130px');
};
// Function to preview image after validation
$(function() {
$("#photoL").change(function() {  
$("#messageL").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg","image/gif"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3])))
{
$('#previewingL').attr('src','images/NO-IMAGE-AVAILABLE.jpg');
$("#messageL").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoadedL;
reader.readAsDataURL(this.files[0]);
}
});

$("#photoC").change(function() {  
$("#messageC").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg","image/gif"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3])))
{
$('#previewingC').attr('src','images/NO-IMAGE-AVAILABLE.jpg');
$("#messageC").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoadedC;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoadedL(e) {
$("#photoL").css("color","green");
$('#reg_photoL').css("display", "block");
$('#previewingL').attr('src', e.target.result);
$('#previewingL').attr('width', '150px');
$('#previewingL').attr('height', '130px');

};

function imageIsLoadedC(e) {
$("#photoC").css("color","green");
$('#reg_photoC').css("display", "block");
$('#previewingC').attr('src', e.target.result);
$('#previewingC').attr('width', '150px');
$('#previewingC').attr('height', '130px');

};

});	