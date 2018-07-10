jQuery(document).ready( function($){
window.onload = init; 
window.clicked = 0;
var pressed = false;  
var chars = [];
function init () { 
$( document ).on( "submit", "#login-form", function( e ) {loginform = $("#login-form"); loginProcess(e);} );

$( document ).on( "submit", "#AddgenStdBatchForm", function( e ) { addStudentBatches(e);} );
$( document ).on( "submit", "#AddgenSchoolTermForm", function( e ) { addSchoolTerm(e);} );
$( document ).on( "submit", "#addStdGroup", function( e ) { addStdGroup(e);} );
$( document ).on( "submit", "#addClass", function( e ) { addClass(e);} );
$( document ).on( "submit", "#addClassSubject", function( e ) { addClassSubject(e);} );
$( document ).on( "submit", "#AddexamType", function( e ) { addexamType(e);} );
$( document ).on( "submit", "#AddUserType", function( e ) { NewUserType(e);} );

$( document ).on( "click", "#setCurrentSems", function( e ) { setCurrentSems(e);} );
$( document ).on( "click", "#setCurrentSess", function( e ) { setCurrentSess(e);} );
$( document ).on( "submit", "#updateBatchesYear", function( e ) { updateBatchesYear(e);} );
$( document ).on( "submit", "#updateSemester", function( e ) { updateSemester(e);} );
$( document ).on( "submit", "#updateStdGroup", function( e ) { updateStdGroup(e);} );
$( document ).on( "submit", "#updateClass", function( e ) { updateClass(e);} );
$( document ).on( "submit", "#updateClassSubject", function( e ) { updateClassSubject(e);} );
$( document ).on( "submit", "#updateAdmin", function( e ) { updateAdmin(e);} );
$( document ).on( "submit", "#UpdPersonal", function( e ) { UpdPersonal(e);} );
$( document ).on( "submit", "#UpdateAcademic", function( e ) { UpdateAcademic(e);} );
$( document ).on( "submit", "#UpdateContact", function( e ) { UpdateContact(e);} );
$( document ).on( "submit", "#updateExamType", function( e ) { updateExamType(e);} );
$( document ).on( "submit", "#updateUserPermit", function( e ) { updateUserPermit(e);} );
$( document ).on( "submit", "#viewResult", function( e ) { viewExamResult(e);} );

   
$( document ).on( "click", ".PerformanceBar", function( e ) { 
  
var bankId = $(this).attr("id");  
 $.ajax({
		url: "templates/barData.php?bankId="+bankId,
		method: "GET",
	  cache: false,
	  dataType: "json",
		success: function(data) {
			console.log(data);
			 	$("#chartdiv").empty();
			var s1 = [];
			var ticks = [];
	for(var i in data) {
				s1.push(data[i].score);
				ticks.push(data[i].stdAddNum); 
			}
	 	$.jqplot.config.enablePlugins = true; 
        
        plot1 = $.jqplot('chartdiv', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: true }
        });
  
	},
		error: function(errorThrown) {
			//swal(errorThrown);
			//swal(errorThrown);
			$("#chartdiv").html("No result found"); 
		}
	
	});
        
    });
 

$( document ).on( "submit", "#systemWindow", function( e ) { systemWindow(e);} ); 
$( document ).on( "submit", "#activateKey", function( e ) { activateKey(e);} ); 

$( document ).on( "click", "#trial", function( e ) {
	if(this.checked){
	//swal('checked');
//document.getElementById('dWeeks').style.display = "block";
		$("#dWeeks").css("display", "block");
} 
else{
		$("#dWeeks").css("display", "none");
}  } ); 
 

$( document ).on( "click", ".resFilExpDoc", function( e ) {  
var stdAddNum = $(this).attr("id"); 
var resultId = $('.resultId'+stdAddNum).val(); 
window.open('templates/stdresFilExpDoc.php?action=Examination'+'&sub=filteredResult/'+'&stdAddNum='+stdAddNum+'&resultId='+resultId,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
  } );
 
$( document ).on( "click", "#filteredResultPDF", function( e ) { 
var fn = $(this).attr("fn"); 
	var today = new Date().toISOString().slice(0, 10);
var pdf = new jsPDF('l', 'pt', 'a3')
, source = $('#resultView')[0]
, specialElementHandlers = {
    '#bypassme': function(element, renderer){      
        return true
    }
}

margins = {
    top: 40,
    bottom: 40,
    left: 40,
    width: 822
  }; 
pdf.fromHTML(
    source  
    , margins.left // x coord
    , margins.top // y coord
    , {
        'width': margins.width // max width of content on PDF
        , 'elementHandlers': specialElementHandlers
    },
    function (dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html      
        pdf.save(fn+ today +'.pdf');
      },
    margins
  )
  } ); 
 

$( document ).on( "click", "#schSetAll", function( e ) {  
  $('.schCase').prop('checked', this.checked);
  } );
	 

$( document ).on( "click", ".schCase", function( e ) { 
        if($(".schCase").length == $(".schCase:checked").length) {
		 //	swal('equal');
            $("#schSetAll").prop("checked", "checked");
        } else {
            $("#schSetAll").removeAttr("checked");
        }

    });
	 
	 
$( document ).on( "click", "#grpAll", function( e ) {  $('.grpCase').prop('checked', this.checked); });

$( document ).on( "click", ".grpCase", function(e){ 
        if($(".grpCase").length == $(".grpCase:checked").length) {
		  $("#grpAll").prop("checked", "checked");
        } else {
            $("#grpAll").removeAttr("checked");
        } 
    });

	
$( document ).on( "click", "#clsAll", function (e) {  $('.clsCase').prop('checked', this.checked); });


$( document ).on( "click", ".clsCase", function(e){

        if($(".clsCase").length == $(".clsCase:checked").length) {
 $("#clsAll").prop("checked", "checked");
        } else {
            $("#clsAll").removeAttr("checked");
        } 
    });

	
	
$( document ).on( "click", "#subAll", function (e) {  $('.subCase').prop('checked', this.checked);  });


$( document ).on( "click", ".subCase", function(e){

        if($(".subCase").length == $(".subCase:checked").length) { 
            $("#subAll").prop("checked", "checked");
        } else {
            $("#subAll").removeAttr("checked");
        } 
    });

	
$( document ).on( "click", "#stdAll", function (e) {  $('.stdCase').prop('checked', this.checked);   });


 $( document ).on( "click", ".stdCase", function(e){

        if($(".stdCase").length == $(".stdCase:checked").length) {
		//	swal('equal');
            $("#stdAll").prop("checked", "checked");
        } else {
            $("#stdAll").removeAttr("checked");
        } 
    });

	
$( document ).on( "click", "#admAll", function (e) {  $('.admCase').prop('checked', this.checked); });
 
 $( document ).on( "click", ".admCase", function(e){

        if($(".admCase").length == $(".admCase:checked").length) {
	       $("#admAll").prop("checked", "checked");
        } else {
            $("#admAll").removeAttr("checked");
        } 
    });

	
$( document ).on( "click", "#examAll", function (e) { $('.exmCase').prop('checked', this.checked);  });
 
 $( document ).on( "click", ".exmCase", function(e){ 
        if($(".exmCase").length == $(".exmCase:checked").length) { 
            $("#examAll").prop("checked", "checked");
        } else {
            $("#examAll").removeAttr("checked");
        } 
    });

		
$( document ).on( "click", "#loaderAll", function (e) { $('.ldrCase').prop('checked', this.checked); });
 
 $( document ).on( "click", ".ldrCase", function(e){ 
        if($(".ldrCase").length == $(".ldrCase:checked").length) { 
            $("#loaderAll").prop("checked", "checked");
        } else {
            $("#loaderAll").removeAttr("checked");
        } 
    });
	 
$( document ).on( "change", "#groupIdSelect", function( e ) { getClassList(e);} );
$( document ).on( "change", "#groupIdMSelect", function( e ) { getMClassList(e);} );
// add section here  

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
$("#login-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i> Check your login credentials! Something is empty!</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Login');
}
else {
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
			$("#login-bottom").removeClass('hide').addClass('swal-success').html('<p>Logging in......</p>');
			 location.href='../server/';
			 } 
		else if(result == 3) {
			$("#login-bottom").removeClass('hide').addClass('swal-danger').html('<p>You do not have access to the server .</p>');
			$(_this).find(':input').attr('disabled',false);
			$(_this).find(':button').attr('disabled',false);
			$(_this).find(':button').html('Login');
			}
			else{
			$("#login-bottom").removeClass('hide').addClass('swal-danger').html('<p>No user is registered using this credentials.</p>');
			$(_this).find(':input').attr('disabled',false);
			$(_this).find(':button').attr('disabled',false);
			$(_this).find(':button').html('Login');
		}
	}
});
}
return this;
}

$("#beedyStudentRegForm").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "server.php",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend: function()
	{
			 $("form").find(':input').attr('disabled',true);
$("form").find(':button').attr('disabled',false);
$("form").find(':button').html('<p>connecting to the server......</p>');
	},
success: function(result)   // A function to be called if request succeeds
{  
 if(result == 1){
		swal("Student\'s data has been added successfully");
		$("form").find(':input').attr('disabled',false);
		$("form").find(':button').attr('disabled',false);
		$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Student');
	 refreshAll();
	 $("form").trigger("reset");
$('#previewing').attr('src','images/nophoto.jpg');
	 $("#add-bottom").removeClass('swal-danger').addClass('hide').html('<p><i class="fa fa-exclamation-triangle"></i></p>');
}
		else if(result == 2){
	$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: Student\'s details already exist.</p>');
$("form").find(':input').attr('disabled',false);
$("form").find(':button').attr('disabled',false);
$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Student');
			}
else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new student\'s record !!! Please try again later.</p>');
$("form").find(':input').attr('disabled',false);
$("form").find(':button').attr('disabled',false);
$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Student');
			}
}
});
}));

 $("#changepic").on('submit',(function(e) {
e.preventDefault();
var page = $('#page').val();
var options = $('#option').val();
//swal(options);
$.ajax({
url: "../server.php",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend: function()
	{
			 $("form").find(':input').attr('disabled',true);
$("form").find(':button').attr('disabled',false);
$("form").find(':button').html('<p>connecting to the server......</p>');
	},
success: function(result)   // A function to be called if request succeeds
{
 if(result == 1) {
		swal("Profile picture has been changed successfully");
		 
			 location.reload();

	 
		}

else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: Employee\'s details was not added... please try again later.</p>');
$("form").find(':input').attr('disabled',false);
		$("form").find(':button').attr('disabled',false);
		$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Change Picture');
		}
		}
});
}));

$("#addAdmin").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "server.php",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend: function()
	{
			 $("form").find(':input').attr('disabled',true);
$("form").find(':button').attr('disabled',false);
$("form").find(':button').html('<p>connecting to the server......</p>');
	},
success: function(result)   // A function to be called if request succeeds
{
	
 if(result == 1) {
		swal("Admin has been added successfully");
		$("form").find(':input').attr('disabled',false);
		$("form").find(':button').attr('disabled',false);
		$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Admin');
	 refreshAll();
	 $("form").trigger("reset");
$('#previewing').attr('src','images/nophoto.jpg');
	 $("#add-bottom").removeClass('swal-danger').addClass('hide').html('<p><i class="fa fa-exclamation-triangle"></i></p>');
 }
		else if(result == 2){
	$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This username already exist!!!</p>');
$("form").find(':input').attr('disabled',false);
		$("form").find(':button').attr('disabled',false);
		$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Admin');
				}
else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: Admin\'s details was not added... please try again later.</p>');
$("form").find(':input').attr('disabled',false);
		$("form").find(':button').attr('disabled',false);
		$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Admin');
		}
		}
});
}));
 
function updateAdmin(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Update done successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Admin');
	 }
else if(result == 2)  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error username already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Admin');
			}
			else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating admin details!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Admin');
			}
			}
});
return this;
}

function addStudentBatches(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("New Batch/Session has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Batch/Session');
	 refreshAll();
	 $(_this).trigger("reset");
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This Batch/Session already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Batch/Session');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new Batch/Session!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Batch/Session');
			}
			}
});
}

function addSchoolTerm(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("New Term/Semester has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Term/Semester');
	 refreshAll();
	 $(_this).trigger("reset");
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This Term/Semester already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Term/Semester');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new Term/Semester!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Term/Semester');
			}
			}
});
}

function addStdGroup(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("New Group has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Group');
	 refreshAll();
	 $(_this).trigger("reset");
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This Group already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Group');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new Group!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Group');
			}
			}
});
}

function addClass(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Class has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Class');
	 refreshAll();
	 $(_this).trigger("reset");
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This Class already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Class');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new Class!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Class');
			}
			}
});
}

function addClassSubject(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Subject has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Subject');
	 refreshAll();
	 $(_this).trigger("reset");
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This Subject already exist under this group class.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Subject');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new Subject!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Subject');
			}
			}
});
}

function addexamType(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Exam Type has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Exam Type');
	 refreshAll();
	 $(_this).trigger("reset");
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This Exam Type already exist under this group class.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Exam Type');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new Exam Type!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save Exam Type');
			}
			}
});
}

function NewUserType(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){ 
		 if(result == 1) {
		swal("User Type has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save User Type');
	 refreshAll();
	 $(_this).trigger("reset");
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This User Type already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save User Type');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new Us\ Type!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Save User Type');
			}
			}
});
}

// update section here 

$("#systemData").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "server.php",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend: function()
	{
			 $("form").find(':input').attr('disabled',true);
$("form").find(':button').attr('disabled',false);
$("form").find(':button').html('<p>connecting to the server......</p>');
	},
success: function(result)   // A function to be called if request succeeds
{ 

if(result == 1) {
		swal("School Data updated successfully");
		//$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Data');
		  location.href='?pid=1&action=SchoolSettings/&sub=Institution-Details/';
		}

	 else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: School data was not updated... please try again later.</p>');
$("form").find(':input').attr('disabled',false);
$("form").find(':button').attr('disabled',false);
$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Data');
			}
}
});
}));


 function setCurrentSess(evt){
var _this = $(evt.target);
evt.preventDefault();
var sid = $(_this).attr("sid");
var schId = $(_this).attr("schId");
var action = "setCurrentSess";
//swal(sid);
var formdata = $(_this).serialize();
$.ajax({
	url:'server.php',
	type: 'POST',
	data: ({genStdBatchId: sid, schId:schId, action:action}),
	success: function( result ){
		 if(result == 1) {
		swal("Current Session set successfully");
	refreshAll();
					 }
else  {
swal("Error setting new Session!!! Please try again later");
$(_this).find(':button').html('Set Current');
	 }
			}
});
 return this;
}

function setCurrentSems(evt){
var _this = $(evt.target);
evt.preventDefault();
var sid = $(_this).attr("sid");
var schId = $(_this).attr("schId");
var action = "setCurrentSems"; 
//swal(sid);
var formdata = $(_this).serialize();
$.ajax({
	url:'server.php',
	type: 'POST',
	data: ({SchoolTermId: sid, schId:schId, action:action}),
	success: function( result ){
		 if(result == 1) {
		swal("Current Term/Semester set successfully");
	refreshAll();
					 }
else  {
swal("Error setting new Term/Semester!!! Please try again later");
$(_this).find(':button').html('Set Current');
	 }
			}
});
 return this;
}

 function updateBatchesYear(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
var classType = $(_this).find('#classType').val();
if( classType == ""){
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i> Check your form details! Something is empty!</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Batch/Session');
}
else {
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Batch/Session updated successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Batch/Session');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating Batch/Session!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Batch/Session');
			}
			}
});
}
return this;
}
function updateSemester(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
var genSchTerm = $(_this).find('#genSchTerm').val(); 
if( genSchTerm == ""){
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i> Check your form details! Something is empty!</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Term/Semester');
}
else {
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Term/Semester updated successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Term/Semester');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating Term/Semester!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Term/Semester');
			}
			}
});
}
return this;
}

function updateStdGroup(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();

$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Group updated successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Group');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating Group!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Group');
			}
			}
});
 
}

function updateClass(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();

$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Class updated successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Class');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating Class!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Class');
			}
			}
});
 
}

function updateClassSubject(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();

$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){ 
		 if(result == 1) {
		swal("Subject updated successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Subject');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating Subject!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Subject');
			}
			}
});
 
}
function UpdPersonal(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'../server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){ 
		 if(result == 1) {
		swal("Update done successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Personal Details');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating Personal Details!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Personal Details');
			}
			}
});
return this;
}
function UpdateAcademic(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'../server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Update done successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Academic Details');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating Academic Details!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Academic Details');
			}
			}
});
return this;
}
function UpdateContact(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'../server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		swal("Update done successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Contact Details');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating Contact Details!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Contact Details');
			}
			}
});
return this;
}

function updateExamType(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		  if(result == 1) {
		swal("Update done successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update Exam Type');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating Exam Type!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update Exam Type');
			}
			}
});
return this;
}

function updateUserPermit(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'server.php',
	type: 'POST',
	data: formdata,
	success: function( result ){ 
		  if(result == 1) {
		swal("Update done successfully");
			refreshAll();
	$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Update User Type');
	 }
else  {
$("#update-button").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating User Type!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Update User Type');
			}
			}
});
return this;
}


// ######update section ends up here  ###


// ######get section ends up here  ###

function getClassList(evt){
var _this = $(evt.target);
evt.preventDefault();
var groupId = $(_this).serialize();
$("#classList").empty();
$("#classList").html('<p>connecting to the servers......</p>');
$.ajax({
	url:'templates/getClassList.php',
	type: 'POST',
	data: groupId,
	success: function( result ){
	$("#classList").empty();
	$("#classList").append(result);
			}
});
}

function getMClassList(evt){
var _this = $(evt.target);
evt.preventDefault();
var groupId = $(_this).serialize();
$("#classList").empty();
$("#classList").html('<p>connecting to the servers......</p>');
$.ajax({
	url:'getClassList.php',
	type: 'POST',
	data: groupId,
	success: function( result ){
	$("#classList").empty();
	$("#classList").append(result);
			}
});
}

function viewExamResult(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$("#resultViewer").empty();
$("#resultViewer").html('<p>connecting to result server......</p>');
$.ajax({
	url:'templates/getResultLog.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
	$("#resultViewer").empty();
	$("#resultViewer").append(result);
			}
});
}

function systemWindow(evt){
var _this = $(evt.target);
evt.preventDefault();
var url = $(_this).find('#url').val();
var formdata = $(_this).serialize(); 
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url: url,
	type: 'POST',
	data: formdata,
	success: function( result ){  
		if(result == 1) { 
		swal('Serial Key generated successfully');
				  location.href='?pid=17&action=Activation'; 
	 }  
			else  {
swal('Error generating key!!! Please try again later.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Generate Key');
			}
			 }
});
}
 
function newAlert(msg){
swal({
 title: "Twinder Message swal",
 text: msg,
 timer: 5000,
 showConfirmButton: true
});
};

function activateKey(evt){ 
var _this = $(evt.target);
evt.preventDefault();
var url = $(_this).find('#url').val();
var formdata = $(_this).serialize();  
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url: url,
	type: 'POST',
	data: formdata,
	success: function( result ){   
		if(result == 1) { 
		newAlert("License activated successfully.. Please use the log out button above to access your software");
			  location.href='?pid=17&action=Activation';
	 } 
else if(result == 2) {
newAlert("Twinder License Error !!! Key do not match. Please enter your license number again.");
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Activate');
			} 
				else  {
newAlert('Error !!! Please try again later.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Activate');
			}
			 }
});
}
 
 function refreshAll(){	 
var refreshSessBatch = setTimeout( function() {  $("#viewBatchSession").load("templates/viewSession.php"); },100);
var refreshSemester = setTimeout( function() { $("#viewTermSession").load("templates/viewSemester.php"); },100);
var refreshStudentGroup = setTimeout( function() { $("#viewGroupList").load("templates/viewGroupList.php"); },100);
var refreshClassList = setTimeout( function() { $("#viewClassList").load("templates/viewClassList.php"); },100);
var refreshClassSubjectList = setTimeout( function() { $("#viewClassSubjectList").load("templates/viewClassSubjectList.php"); },100);
var refreshViewAllStudent = setTimeout( function() { $("#viewAllStudent").load("templates/viewAllStudent.cbt.php"); },100);
var refreshViewAdminList = setTimeout( function() { $("#viewAdminList").load("templates/viewAdminList.cbt.php"); },100);
var refreshviewExamType = setTimeout( function() { $("#viewExamType").load("templates/viewExamType.php"); },100);
var refreshactiveExam = setTimeout( function() { $("#activeExam").load("templates/activeExam.php"); },100);

}
refreshAll();
}

function softwareMode(){  
$.ajax({
	url:'softfile.php',
	type: "GET", 
	  dataType: "json",
	success: function( data ){  
	var beedyData = [];
		 for(var i in data) {
				beedyData.push(data[i].active);
				beedyData.push(data[i].bdLast); 
			}
	 var active =  data[i].active;
var daysLeft= parseInt(data[i].bdLast);  
// var daysLeft=  data[i].bdLast; 
  
 	// if(active=="Trial" || active=="Time-Based" || active=="active")
 if(daysLeft > 30 && daysLeft <= 41){
	   
  }
  else if(daysLeft > 0 && daysLeft <= 4){
	  
already("You have " + daysLeft + " days left");  
  }
  else if(daysLeft <= 0 ){ 
 already("Your demo period has expired!!! We hope you enjoyed it");
  
 setTimeout( function() { window.location='app/'; },8000);
   
    }
  
    },
	error: function(){
		softwareMode2();
	}
	  
});
}
 
function softwareMode2(){ 
$.ajax({
	url:'softfile.php',
	type: "GET",
	  cache: false,
	  dataType: "json",
	success: function( data ){  
	
swal('f2');
  swal(data);
	var player = [];
			var score = [];

		
    } 
	  
});
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

 softwareMode();
function already(msg){
swal({
 title: "Twinder License swal",
 text: msg,
 timer: 8000,
 showConfirmButton: true
});
};

//already('hello');
});	