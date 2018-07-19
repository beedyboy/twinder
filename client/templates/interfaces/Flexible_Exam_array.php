 
<style>
#slidepanel{
display:none;
position:relative;
width:100%;
overflow:hidden;
color:#E3DFD2;

}


/* ----------------------------------------------Tab Panel-------------------------------------*/
.clear{clear:both;}
br.clear{clear:both; margin-top:-15px;}
a{outline:none; text-decoration:none;}
#accpanel{
display:block;
position:relative;
top:0;
}

#accpanel ul{
display:block;
float:right;
width:250px;
height:25px;
margin:0;
padding:0 0 10px 0;
text-align:center;
color:#E3DFD2;
background-color:#4A5155;
}

#accpanel li{
display:block;
height:25px;
margin:0;
padding:0;
}

#accpanel li.left{
float:left;
text-align:right;
padding-left:10px;
background:url("../images/tab_l.gif") no-repeat bottom left;
}

#accpanel li.right{
float:right;
text-align:left;

background:url("../images/tab_r.gif") no-repeat bottom right;
}

#accpanel a{
display:block;
width:150px;
}
#whole{
background:#999999;

color:#FFF;

font-weight:bold;
border-radius:5px;
border:2px;
border:3px solid #0080FF;

}
#whole1 {
font-family:Tahoma, Geneva, sans-serif;
background-color:#4A5155;
border-radius:5px;
border:2px;
border-bottom:3px solid #0080FF;
color:#FFF;
}
</style>
<?php 
include('../../includes/system2.php');


$conn = $GetSystem->getInstance();

date_default_timezone_set("Etc/GMT-8");  
$index = $_GET['index'];  
$get = $_GET['id']; 
$total = $_GET['total'];


$member1 =$GetExam->getQuestion($index); 

$queid=$member1['Question_Id'];
$quetitle=$member1['Exam_Question'];
@$Exam_Question_Logo=$member1['Exam_Question_Logo'];
$ch1=$member1['Exam_Option_A'];
$ch2=$member1['Exam_Option_B'];
$ch3=$member1['Exam_Option_C'];
$ch4=$member1['Exam_Option_D'];

$_SESSION['Question_Id'] = $index;

?>
<input type="hidden" class="numof" id="numof" value="<?php echo "Question"." ".$get; ?> <?php echo "of"; ?> <?php echo $total; ?>" />


<table id="whole"  class='table table-condensed' cellspacing="5" cellpadding="5">
<tr>
<td> 
<div >  
<table id="whole1"  class='table table-condensed' >

<tr>
<td> <?php  echo $get; ?>.
</td> 

<td > <?php  echo $quetitle; ?>
</td>

</tr>



</table>
</div> 

<?php   
if($Exam_Question_Logo == "")
{

}

else

{

?>
<table  width="600px" border="0" cellspacing="5" cellpadding="5">

<tr>
<td> 

<div id='slidepanel'>
<img src='../<?php echo $Exam_Question_Logo; ?>' width='60%' height='100' >
</div>
</td> 

<td>  <div id='accpanel'>
<ul>
<li class='left'>Click here &raquo;</li>
<li class='right' id='toggle'><a id='slideit' href='#slidepanel' style='font-weight:bold;'>Show Diagram</a><a id='closeit' style='display: none;' href='#slidepanel'>Hide Diagram</a></li>
</ul>
</div> 
</td>

</tr>


</table>




<?php
}	
?>
<table align='center' border="0" style="margin-right:100px;" width="600px"  cellspacing="5" cellpadding="5">
	
<tr>
		
<td>A&nbsp;
<input type='radio' class="A"  name='options' value='A' id='A' onclick='optionClicked()' />&nbsp;&nbsp;&nbsp;<span style='color:black;font-size:22px;'>
<?php echo $ch1; ?></span> </td>
</tr>
<tr>					
<td>B&nbsp;&nbsp;<input type='radio' class="B" name='options' value='B' id='B' onclick='optionClicked()' />&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:black;font-size:22px;'><?php echo $ch2; ?></span> </td>
			
</tr>
		
<tr  <?php if($ch3=="")
{ ?>  hidden="hidden" 

<?php
}
?> >
			
<td>C&nbsp;&nbsp;<input type='radio' class="C" name='options' value='C' id= 'C'onclick='optionClicked()' />&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;font-size:22px;"><?php echo $ch3; ?></span> </td>
</tr>
<tr  <?php if($ch4=="")
{ ?>  hidden="hidden" 

<?php
}
?>>				
<td>D&nbsp;&nbsp;<input type='radio'  class="D" name='options' value='D' id='D' onclick='optionClicked()' />&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;font-size:22px;"><?php echo $ch4; ?></span> </td>
			
</tr>


	
</table>
<table align='center' style="margin-right:100px;" width="600px"  cellspacing="5" cellpadding="5">
<tr>
<td colspan="3">
<hr />
</td>

</tr>   
	<tr>
	
		<td width="33%" align="left">  </td>
		
	  <td width="33%" align="center"><input type="button" name="end" value="" id="end" style="background:url(images/END.png);border:0px; height:30px; width:75px" onClick="submitOption()"/></td>
				
	  <td width="33%" align="right"></td>

	</tr>
	
</table>		

</div>
</td>
</tr>
</table>
 
<script type="text/javascript">
jQuery(document).ready(function($) {

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



});



</script>
