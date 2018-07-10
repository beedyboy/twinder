<?php
 
	 	 spl_autoload_register(function ($class_name){
		$file_name =  "../classes/" . $class_name . '.php';
		if(file_exists($file_name)){
			require $file_name;
		}
	});
	
	ob_start();
	session_start();
  
$GetSession  = new my_Session();
$GetDatabase  = new Database();
$GetSchool  = new school(); 
$GetStudent  = new student();

$GetExam  = new Examination();
 
 
$loadSystem = $GetSchool->loadSchoolData(); 
//$loadSchool = System::loadSchool();
$i = 0;
foreach($loadSystem as $Data):
$i++; 

$beedySchoolName=  $_SESSION['cbt']['schoolname']= $Data['beedySchoolName'];
$beedySchoolLogo= $Data['beedySchoolLogo'];
$beedySchoolMotto= $Data['beedySchoolMotto'];
$beedySchoolAddress= $Data['beedySchoolAddress'];
$beedySchoolEmail= $Data['beedySchoolEmail'];
$beedySchoolPhoneNum= $Data['beedySchoolPhoneNum'];
$beedySchoolWebsite= $Data['beedySchoolWebsite'];
$CurrentSession= $Data['CurrentSession'];
$CurrentSemester= $Data['CurrentTerm'];
$theme= $_SESSION['cbt']['user_theme'] = $Data['theme'];
endforeach;
$i = 0; 
/* foreach($loadSchool as $Beedy):
$i++;
$active= $Beedy['active'];
$dateTo= $Beedy['dateTo'];
$dateFrom= $Beedy['dateFrom']; 
endforeach;



$schArray['dateFrom'] = $dateFrom;
$schArray['dateTo'] = $dateTo; 
$schArray['active'] = $active;
 */

 
$schArray['beedySchoolName'] = $beedySchoolName;
$schArray['beedySchoolMotto'] = $beedySchoolMotto;
$schArray['beedySchoolLogo'] = $beedySchoolLogo;
$schArray['beedySchoolAddress'] = $beedySchoolAddress;
$schArray['beedySchoolEmail'] = $beedySchoolEmail;
$schArray['beedySchoolPhoneNum'] = $beedySchoolPhoneNum;
$schArray['beedySchoolWebsite'] = $beedySchoolWebsite;
$schArray['CurrentSession'] = $CurrentSession;
$schArray['CurrentSemester'] = $CurrentSemester;

define('_SCHOOL_ADDRESS_',$schArray['beedySchoolAddress']);
define('_SCHOOL_NAME_', $schArray['beedySchoolName']);
define('_SCHOOL_MOTTO_', $schArray['beedySchoolMotto']);
define('_SCHOOL_LOGO', $schArray['beedySchoolLogo']);
define('_CURRENT_TERM_', $schArray['CurrentSemester']);

/* 
$now= time();
	 $dateTo=strtotime($dateTo);
	 $dateFrom=strtotime($dateFrom);
	$today=date('Y-m-d');
	  $dateDiff=  $dateTo- $dateFrom;
$bdLast = strtotime($schArray['dateTo']) - strtotime($today);
	   $date= floor($dateDiff/(60*60*24));
 $bdLast= floor($bdLast/(60*60*24));


define('dateFrom',$schArray['dateFrom']);
define('dateTo', $schArray['dateTo']); 
define('active', $schArray['active']);
define('lastDay', $date);
define('dateDiff', $date);
define('today', $today);
define('bdLast', $bdLast);


	if(strtotime($dateTo) < strtotime($today))
	{
	//	echo "Date 2 is greater than date 1";
	}


  if(active=="Trial" || active=="active"):

  if(bdLast > 5 && bdLast <= 8):

    ?>
    <script type="text/javascript">

    var daysLeft= <?php echo dateDiff; ?>;
      //alert("You have " + daysLeft + " days left");

  </script>
   
  <?php
  elseif(bdLast > 0 && bdLast <= 4):

      ?>
	  
      <script type="text/javascript">
 var daysLeft= <?php echo bdLast; ?>;
function already(msg){
swal({
 title: "Kayla Demo Alert",
 text: msg,
 timer: 8000,
 showConfirmButton: true
});
};
already("You have " + daysLeft + " days left");
     
     // alert("You have " + daysLeft + " days left");

    </script>
    <?php
  endif;

   if(bdLast <= 0 ):
    // header("location: ../log/logout.php");
		 ?>
          <script type="text/javascript">
  function already(msg){
swal({
 title: "Kayla Demo Alert",
 text: msg,
 timer: 8000,
 showConfirmButton: true
});
};
already("Your demo period has expired!!! We hope you enjoyed it");
  setTimeout( function() { window.location='../log/logout.php'; },8000);
  
 </script>

 <?php
  endif;
endif;
 */

?>

   