<?php 
include('../../includes/system2.php');

$final = array();
$cbtReady = null;
if(!isset($_SESSION['cbtReady'])): 
 $cbtReady = $_SESSION['cbtReady'] ="cbtReady";
$conn = System::getInstance();
$bank= array();
$array= array();
$beedy_bankId=  $_SESSION['cbt']['bankId'];
$bankId=$_SESSION['cbt']['bankId'];
$Total_Question=$_SESSION['Total_Question'];
$random=  $_SESSION['random'];
$loadIntQuestion =NULL;
$loadIntQuestion =   $GetExam->loadintQuestionModeFace2($beedy_bankId);
function array_random($arr, $num = 1) {
shuffle($arr);
$r = array();
for ($i = 0; $i < $num; $i++) {
$r[] = $arr[$i];
}
return $num == 1 ? $r[0] : $r;
}
function array_random_assoc($arr, $num = 1) {
$keys = array_keys($arr);
shuffle($keys);
$r = array();
for ($i = 0; $i < $num; $i++) {
$r[$keys[$i]] = $arr[$keys[$i]];
}
return $r;
}
function bank1($arr, $num = 1) {
$keys = array_keys($arr); 
$r = array();
$j = array();
for ($i = 1; $i < $num; $i++) {
$r[$keys[$i]] = $arr[$keys[$i]];
}
for($a=1; $a<=$num; $a++){
foreach($r as $k){
$j[$a]=$k;
}
} 
return $r;
}
function bank2($arr, $num = 1) {
$keys = array_keys($arr);
shuffle($keys);
$r = array();
$j = array();
for ($i = 1; $i < $num; $i++) {
$r[$keys[$i]] = $arr[$keys[$i]];
}
for($a=1; $a<=$num; $a++){
foreach($r as $k){
$j[$a]=$k;
}
} 
return $r;
}

if(count($loadIntQuestion) > 0) {
// var_dump($loadIntQuestion); 
while($row = $loadIntQuestion->fetch())
{
$qid =$row['Question_Id'];
$array[$qid] = $qid; 
}
}
//print_r(array_random_assoc($array, 3));
//$ar = array();
$bad = array();
if($random =="Yes"): 
$ar =bank2($array, $Total_Question+1); 
else:
$ar =bank1($array, $Total_Question+1);
endif;
//var_dump($ar);
//deal with iterator_apply
// echo "#########KEYS#############";
$keys = array_keys($ar);
// var_dump($keys);
//echo "##########KEYS############";
//echo "######################";
for ($i =0; $i <= count($keys)-1; $i++) {
$bank[$i] = $keys[$i];
}
array_unshift($bank,"");
unset($bank[0]);
//echo "not ready";
$_SESSION['final']=$bank; 
$final[]=$_SESSION['final']; 
else:
$cbtReady = $_SESSION['cbtReady'];
//echo "ready";
$final[]=$_SESSION['final'];
endif;


 //var_dump($final);
//var_dump($bank);	
//echo $bank[1];


function gName($Group_Id){
$result1=$conn->db->prepare("SELECT * FROM beedygroup Where groupId=:Group_Id");
//$result=$conn->db->prepare("SELECT * FROM admin");
$result1->execute(array(':Group_Id'=>$Group_Id));
$content1 = $result1->fetch();
echo $Group_Name= $content1['groupName'];
}
?>