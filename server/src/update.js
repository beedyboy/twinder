jQuery(document).ready(function($) {
	
	////////////////Result Log///////////////////
	function hideResultCriteria() {
	 
	$("#groupView").hide();
	$("#classView").hide();
 $("#individualView").hide();
	 
}
  
$("#groupType").click(function () {
hideResultCriteria();
$("#groupView").css("display","block");     
});


$("#classType").click(function () {
hideResultCriteria();
$("#classView").css("display","block");     
});
 

$("#individualType").click(function () {
hideResultCriteria();
$("#individualView").css("display","block");     
});

 

  hideResultCriteria();
 //$("#normal").css("display","block");    
   

	////////////////Result Log///////////////////
     
	 function hideupdate() {
	 
	$("#normal").hide();
	$("#applyComplete").hide();
 $("#applyLogical").hide();
	 
}
  	 
 
	$("#logically").click(function () {
hideupdate();
//swal('logically');
$("#applyLogical").css("display","block");     
});


$("#completely").click(function () {
hideupdate();
$("#applyComplete").css("display","block");     
});

 

  hideupdate();
 $("#normal").css("display","block");    
   


        // Expand Panel
	$("#slideit").click(function(){
		$("div#slidepanel").slideDown("slow");
	
	});	
	
	// Collapse Panel
	$("#closeit").click(function(){
		$("div#slidepanel").slideUp("slow");	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});		
		
  
  
  
 $("#form").on('submit',(function(e) {
e.preventDefault();
$("#pixReport").empty();
$('#pixReport').show();
$("#pixReport").html('Loading...');
$.ajax({
url: "update_question.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#pixReport').hide();
$("#pixReport").html(data);
swal(data);

$('#image').val('');
//$('input[name="file"]:file').val()="";
 
 
}
});
}));



//update complete here

 $("#form1").on('submit',(function(e) {
e.preventDefault();
$("#pixReport").empty();
$('#pixReport').show();
$("#pixReport").html('Loading...');
$.ajax({
url: "update_complete_question.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#pixReport').hide();
$("#pixReport").html(data);
swal(data);

$('#image').val('');
//$('input[name="file"]:file').val()="";
 
 
}
});
}));




//update lgoical here
  
$("#form2").on('submit',(function(e) {
e.preventDefault();
$("#pixReport").empty();
$('#pixReport').show();
$("#pixReport").html('Loading...');
$.ajax({
url: "update_logical_question.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#pixReport').hide();
$("#pixReport").html(data);
swal(data);
//$('#form1')[0].reset();

$('#question,#file,#image_preview,#options_1,#options_2,#LogicalA,#LogicalB,#previewing').val('');
//$('input[name="file"]:file').val()="";
 
			 

}
});
}));




	 
 });