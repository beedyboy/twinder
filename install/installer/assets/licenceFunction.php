
<?php
// Generate Guid 
   function charFormat($word)
{
$output=str_replace("'", '',$word);
$output=str_replace(" ", '',$output);
$output=str_replace("-", '',$output);
$output=substr($output, 0,16);
return $output;
}
 function DemoGuid($y) { 
      $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-'.$y . 
        substr($s,8,3). '-' . 
        substr($s,11,4); 
    return $guidText;
}
 function NewGuid() { 
    $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,4) . 
        substr($s,4,4) . 
        substr($s,8,4).  
        substr($s,12,4); 
    return $guidText;
}
 function NewGuidR($s) { 
     $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-' . 
        substr($s,8,4). '-' . 
        substr($s,12,4); 
    return strtoupper($guidText);
}
// End Generate Guid 
  function beedy($beedy) {
   
          $chars = "BEEDYBOLADE";
          $pass= rtrim(base64_encode($beedy), "=");
          return strtoupper($pass);
        }
 
  function beedyCheck($beedy)
        {
          $check= base64_decode($beedy);
          return strtoupper($check); 
        }

       /* 
   function charFormat($word)
{
$output=str_replace("'", '',$word);
$output=str_replace(" ", '',$output);
$output=str_replace("-", '',$output);
$output=substr($output, 0,16);
return $output;
}
 		
function format($str){
$output=''; 
for($i=0;$i<strlen($str);$i=$i+8){
$substr1=substr($str,$i,4);
$substr2=substr($str,$i+4,4);
$output.='-'.$substr1.'-'.$substr2; 
}
$output=substr($output,1,strlen($output));
$output=substr($output,0,strlen($output)-1);
return $output;
}
 

	 function beedy($beedy) {
	 
					$chars = "BEEDYBOLADE";
					$pass= rtrim(base64_encode($beedy), "=");
					return $pass;
				}
 
  ?>
  
  <?php
	function beedyCheck($beedy)
				{
					$check= base64_decode($beedy);
 					return $check;
					
				}
// Generate Guid 
function NewGuid($y) { 
    $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-'.$y . 
        substr($s,8,3). '-' . 
        substr($s,11,4); 
    return $guidText;
}
function NewGuidR($s) { 
     $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-' . 
        substr($s,8,4). '-' . 
        substr($s,12,4); 
    return $guidText;
}
// End Generate Guid 
 */

  
?>