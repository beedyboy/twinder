<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  


<link href="css/font-awesome.css" rel="stylesheet" media="screen">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/jquery.timepicker.css" rel="stylesheet" media="screen">
 	<link rel="stylesheet" href="packages/dist/sweetalert.css">
<link href="css/jquery-ui.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="css/font-awesome.min.css">

<link href="style/style.css" type="text/css" rel="stylesheet"  media="screen"/>
<link rel="stylesheet" type="text/css" href="style/jGrowl/jquery.jgrowl.css"/>
<link rel="stylesheet" type="text/css" href="style/custom.css"  media="screen" />
<title><?php echo $_SESSION['cbt']['schoolname']; ?> : 
<?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>
<?php
 //include CSS files
$setting_css = $_SESSION['cbt']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="css/'.$setting_css.'" rel="stylesheet" type="text/css" />';	
  }else{
  	echo '<link href="css/pink.css" rel="stylesheet" type="text/css" />';
  }
 
 // include (INCLUDES_PATH . DS . 'htmleditor.php');
?>

 
  <!-- include summernote css/js-->
<link href="dist/summernote.css" / rel="stylesheet">
          <link href="assets/css/line-icons.css" rel="stylesheet" type="text/css">
              <link href="assets/css/elegant-icons-style.css" rel="stylesheet" type="text/css">
 	<link rel="stylesheet" href="assets/dist/sweetalert.css">
<script type="text/javascript">
var popupWindow=null;
function editQuestion(bankId, qid, num)
{ 

popupWindow =window.open('templates/edit_question.php?bankId=' + bankId+'&qid='+ qid+'&num=' + num,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");
 }
</script>

  </head>
 

<?php  //include JS files
  foreach ($arr_scripts as $eachscript) {
  	echo '<script type="text/JavaScript" src="style/' . $eachscript . '"></script>' . "\n";
  }
  ?>  
  <!-- javascripts -->
     <script src="assets/dist/sweetalert-dev.js"></script>
     
 <!-- nice scroll -->
   
	    <script src="assets/js/bootstrap-toggle.js"></script>
	
	<!-- include summernote css/js-->
 
<script src="dist/summernote.min.js"></script>
         <!-- custome script for all page-->
        <script type="text/javascript">
$(document).ready(function() {
	$('.summernote').summernote({
		height: "150px"
	});
});
var postForm = function() {
	var content = $('textarea[name="content"]').html($('#summernote').code());
}
</script>
  
  <script>
	  
	   function editGroup(exambankId) {
	   
    swal({
     title: "Are you sure you want to edit this group name?", 
	text: "Type a new name:", 
	 type: "input", 
	   showCancelButton: true,
	      closeOnConfirm: false,
		     animation: "slide-from-top",
	inputPlaceholder:"Enter the new name for group here",
}, function(inputValue) {

	if (inputValue === "") {
		swal.showInputError("Group name can not be empty!");
        return false;
	}
	
	else if (inputValue != " ")
	{

	$.ajax({
 
		 url: 'loader.php?otherAction=editGroup'+'&bankName='+inputValue+'&exambankId='+exambankId,
        type: "EDIT"
	})
	
	
	.done(function(data) {
		swal({   title: "Edited!", 
		  text: data, 
		  title: "Success",
		    imageUrl: "images/thumbs-up.jpg" });
       setTimeout( function() {$("#examGrp").empty(); $("#examGrp").load("templates/examType.php");},100); 
	})
	
	.error(function(data) {
        swal.showInputError("Oops", "Group name was not changed", "error");
	});
	
	}
    });
  }
  
 
 function deleteGroup(exambankId) {
		 swal({
      title: "Are you sure?", 
      text: "Are you sure that you want to delete this group?", 
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
	  
    }, function() {
      $.ajax({
        url: 'loader.php?otherAction=deleteGroup'+'&exambankId='+exambankId,
        type: "DELETE"
      })
      .done(function(data) {
        swal("Deleted!", "Group has been deleted", "success");
		  setTimeout( function() {$("#examGrp").empty(); $("#examGrp").load("templates/examType.php");},100); 
      })
      .error(function(data) {
        swal("Oops", data.val(), "error");
      });
    });
  }
  
    function refreshList(){
		var grp=$("#exambankId").val();
		$.ajax({
			type:"POST",
			url:"templates/sub_group.php?exambankId="+grp,
			success: function(msg)
			{
				$("#bankGrp").html(msg);
		
			}
		});
		
		} 
refreshList();
	 
	 function reloadHeader(){
	//	var grpid= $("#group_id").val();
	var bankId= $("#bankId").val();
		$.ajax({
			type:"GET",
			 	
			url:'templates/progres_header.php?bankId='+bankId,
			success: function(beedy)
			{
				$("#settings_progress").html(beedy);


		
			}
		});
		
		}
		reloadHeader();
 function deleteBankGroup(bankId) {
		 swal({
      title: "Are you sure?", 
      text: "Are you sure that you want to delete this course file?", 
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
	  
    }, function() {
      $.ajax({
        url: 'loader.php?otherAction=deleteBankGroup'+'&bankId='+bankId,
        type: "DELETE"
      })
      .done(function(data) {
        swal("Deleted!", "Course file has been deleted", "success");
		refreshList(); 
      })
      .error(function(data) {
        swal("Oops", data.val(), "error");
      });
    });
  }
  
  function hidefor() {
	$("#complete").hide();
 $("#logical").hide();
	 
}
$("#type_0").click(function () {
hidefor();
$("#logical").css("display","block");     
});


$("#type_1").click(function () {
hidefor();
$("#complete").css("display","block");     
});

 

  hidefor();
 $("#complete").css("display","block");     

 
  
 
	</script>

 