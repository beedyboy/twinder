jQuery(document).ready( function($){
	function disableF5(e){
		if((e.which || e.keyCode)  == 116 || (e.which || e.keyCode)  == 82)
			e.preventDefault();
	}
// $(document).on("keydown", disableF5);
//window.onbeforeunload = null;
$("body").keydown(function(e){ 
	if(e.which == 116 || e.which == 17 || e.which == 82) {
		inFormorLink = true; 
		window.onbeforeunload = null;
	}
});
 
window.open("", "", "status=1, toolbar=0"); 
history.pushState({ page: 1}, "Title 1", "#no-back");
window.onhashchange = function (event){
	window.location.hash = "no-back";
}
 


window.onload = init; 
window.clicked = 0;
var pressed = false; 
var chars = []; 

function init () { 
$( document ).on( "submit", "#login-form", function( e ) {loginform = $("#login-form"); loginProcess(e);} ); 
 $( document ).on( "change", "#classIdSelect", function( e ) { getSubjectList(e);} );
 $( document ).on( "click", "#stdProBtn", function( e ) { 	
 $('#stdDetails').toggleClass("collapsed");
 $('#examPanel').toggleClass("col-lg-9 col-lg-6 ");
 //alert('hy'); 
 } );
// add section here 
 //alert('hey');

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
	url:'client.php',
	type: 'POST',
	data: formdata,
	success: function( result ){ 
		 if(result == 1) {
			$("#login-bottom").removeClass('hide').addClass('alert-success').html('<p>Logging in......</p>');
			 location.href='../client/';
			 } 
		else if(result == 3) {
			$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p>You do not have access to the client system.</p>');
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

 
function client(){
setTimeout( function() { $("#examGrp").load("templates/examType.php");},100); 
	
}
client();



 
}

  
  
  
//	 beedy.babe(access);
// Function to preview image after validation
$(function() {
$("#photo").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','../images/No_Picture.jpg');
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
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewingL').attr('src','../images/No_Picture.jpg');
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
});
function imageIsLoadedL(e) {
$("#photoL").css("color","green");
$('#reg_photoL').css("display", "block");
$('#previewingL').attr('src', e.target.result);
$('#previewingL').attr('width', '150px');
$('#previewingL').attr('height', '130px');
};

});	