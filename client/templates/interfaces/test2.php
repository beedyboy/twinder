<?php
 
if(!session_id()):
	ob_start();
	session_start();
endif;
//var_dump($_SESSION['arr']);
 echo $_SESSION['cbt']['duration'];
 echo $_SESSION['cbt']['username'] ;
//echo $_SESSION['Total_Question'] ;
?>

<script>
 
//var d = localStorage.getItem('list');
 var d = JSON.parse(localStorage.getItem('list'));
 var d2 = JSON.parse(localStorage.getItem('answersList'));
  
var bar =[];
var bar2 =[];
//var d = localStorage.getItem("list");
 //bar=JSON.parse(d);
 //localStorage.clear();
 bar = d.slice();
 bar2 = d2.slice();

//alert(bar);
//alert(bar2);
for(i =1; i<bar.length; i++)
{
//alert(bar[i]);
}
</script>