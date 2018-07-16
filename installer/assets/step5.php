<?php 
 session_start(); 
error_reporting(E_ALL);
		ini_set('display_errors', 1);



 include_once('licenceFunction.php');

 $db = $_SESSION['db'];  
 
$dbhost = $_SESSION['host'];
   $dbusername = $_SESSION['username'];
   $dbpassword = $_SESSION['password'];
   
 
define('_HOST_NAME_', $dbhost);
	define('_USER_NAME_', $dbusername);
	define('_DB_PASSWORD', $dbpassword);
	define('_DATABASE_NAME_', $db);
	
	//PDO Database Connection
	try {
		$link = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
 
	 	
	 $firstName= $_POST['firstName'];
	$lastName= $_POST['lastName'];
	$adminUsername= $_POST['username'];
	$email= $_POST['email'];
	$email2= $_POST['email'];
	$area_privilege= $_POST['area_privilege'];
	$adminPassword= md5($_POST['password']);
		 	 $adminLevel=1;
		 	
 
 
	 $query = $link->prepare("INSERT INTO systemadmin (firstName, lastName, email, area_privilege, username, password)
 VALUES (:firstName, :lastName, :email, :permitId, :username, :password)"); 
		
	 $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
	$query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
	 $query->bindParam(':email', $email, PDO::PARAM_STR); 
	 $query->bindParam(':permitId', $area_privilege, PDO::PARAM_INT);
	 $query->bindParam(':username', $adminUsername, PDO::PARAM_STR); 
	  $query->bindParam(':password', $_POST['password'], PDO::PARAM_STR);  
	$query->execute();
	$adminId = $link->lastInsertId();
	 
		
		
$loginQuery = $link->prepare("INSERT INTO login (adminId,firstname,lastname, email,  username, password, level)
 VALUES (:adminId, :firstName, :lastName, :email,  :username, :password, :level)"); 
		
	 $loginQuery->bindParam(':adminId', $adminId, PDO::PARAM_INT);
	$loginQuery->bindParam(':firstName', $firstName, PDO::PARAM_STR);
	$loginQuery->bindParam(':lastName', $lastName, PDO::PARAM_STR);
	 $loginQuery->bindParam(':email', $email, PDO::PARAM_STR); 
	 $loginQuery->bindParam(':username', $adminUsername, PDO::PARAM_STR); 
	  $loginQuery->bindParam(':password', $adminPassword, PDO::PARAM_STR); 
	   $loginQuery->bindParam(':level', $adminLevel, PDO::PARAM_STR); 
	
	if($loginQuery->execute())
	{ 
  
			$A=0;  $B=0; $C=3; $D=1; 
			  
			  $charFormat =NewGuid(); 
		 
			$id = 1;
		 $c1 = substr_replace($charFormat,$A,0,1); 
		 
		 $c2 = substr_replace($c1,$B,5,1); 
		 
		  $c3 = substr_replace($c2,$C,10,1);  
		  
		 $c4 = substr_replace($c3,$D,15,1);  
		 
		 $Guid= NewGuidR($c4); 
		 $mode ="Trial";
		$b=beedy($Guid); 
		  $foruser = NewGuidR(beedy($b));
		  $system=NewGuidR(beedy($foruser));  
		  
			
		$updateClass = $link->prepare("INSERT INTO systemwindow (code1, code2, codekey, active) VALUES (:code1, :code2, :codekey, :active)"); 
		$updateClass->bindParam(':code1', $foruser, PDO::PARAM_STR);  
		$updateClass->bindParam(':code2', $system, PDO::PARAM_STR);  
		$updateClass->bindParam(':codekey', $Guid, PDO::PARAM_STR);  
		$updateClass->bindParam(':active', $mode, PDO::PARAM_STR);  
		$updateClass->execute();
		 
						
			$days = 31;
	$from=date('Y-m-d');
	$dateFrom=date('Y-m-d');
  $dateTo= date('Y-m-d', strtotime($dateFrom. '+'. $days.' days'));

			$active='Trial';
				
			$school = $link->prepare("INSERT INTO beedysystem (code1, code2, codekey, dateFrom, dateTo, active)
			 VALUES (:code1, :code2, :codekey, :dateFrom, :dateTo, :active)"); 
					
				 $school->bindParam(':code1', $foruser, PDO::PARAM_STR);
				$school->bindParam(':code2', $system, PDO::PARAM_STR);
				$school->bindParam(':codekey', $Guid, PDO::PARAM_STR);
				 $school->bindParam(':dateFrom', $dateFrom, PDO::PARAM_STR); 
				  $school->bindParam(':dateTo', $dateTo, PDO::PARAM_STR); 
				   $school->bindParam(':active', $active, PDO::PARAM_STR); 
			 $school->execute();
			  
					
					
				 $file = $_FILES['photo'];
				$name1 = $file['name'];
				$type = $file['type'];
				$size = $file['size'];
				$tmppath = $file['tmp_name']; 

				if($name1!="")
				{
						if(move_uploaded_file($tmppath, '../../uploads/admin/'.$name1))//image is a folder in which you will save image
						{


									$pic = $link->prepare("UPDATE systemadmin SET image=:name1 "); 
									$pic->bindParam(':name1', $name1, PDO::PARAM_STR); 
									if($pic->execute())
									{
										echo 1;
									}
									else
									{
										echo 2;
									}

									
						}
						 

				}
 
}
  
unset($_POST);
	// echo json_encode($data); 

?>
                    