<?php
 
	 	 spl_autoload_register(function ($class_name){
		$file_name =  "classes/" . $class_name . '.php';
		if(file_exists($file_name)){
			require $file_name;
		}
	});
	ob_start();
	session_start();
$GetDatabase  = new Database();
$System  = new System();
$GetSchool  = new school();
$GetStudent  = new student();
$GetBeedyTips  = new BeedyTips();
$GetExam  = new Examination();
$beedy = new beedy();

$conn = $GetDatabase->getInstance();
date_default_timezone_set("Etc/GMT-8");
if(isset($_GET['otherAction'])){ 

if($_GET['otherAction'] == "editGroup"){echo $GetExam->updateBnkGroup($_REQUEST['bankName'],$_REQUEST['exambankId']);} 
if($_GET['otherAction'] == "deleteGroup"){echo $GetExam->deleteteBnkGroup($_REQUEST['exambankId']);} 


}

if(isset($_POST['action'])){ 

 
//started here  
if($_POST['action'] == "login"){ $feedbck = 0; $email =  $username = $_POST['username']; $password = md5($_POST['password']);
$stmt = $conn->db->prepare("SELECT * FROM login WHERE (username = ? || email = ?) AND password = ? ");
$stmt->execute( array($username,$email,$password) );
$row = $stmt->fetch(); 
if(!empty($row)){

$feedbck =  1;
if($row['level'] == 1):
$fetchInfo = $conn->db->prepare("SELECT * FROM systemadmin WHERE adminId = ?");
$fetchInfo->execute( array($row['adminId']) );
$info = $fetchInfo->fetch();
$_SESSION['cbt']['page'] = "logged";	
$_SESSION['cbt']['uid'] = $row['uid']; 
$_SESSION['cbt']['username'] = $row['username'];
$_SESSION['cbt']['level'] = $row['level'];
$_SESSION['cbt']['firstname'] = $info['firstName'];
$_SESSION['cbt']['lastname'] = $info['lastName'];
$_SESSION['cbt']['area_privilege'] = $info['area_privilege'];
$_SESSION['cbt']['adminId'] = $info['adminId'];
$_SESSION['cbt']['image'] = $info['image'];
echo $feedbck =  1;
else:
 echo $feedbck = 3;
  endif;
} 
else {
echo $feedbck;
}	
}


if($_POST['action'] == "addSession"){echo $GetSchool->addStudentBatches($_POST);}
if($_POST['action'] == "addSemester"){echo $GetSchool->addSchoolTerm($_POST);}
if($_POST['action'] == "addStdGroup"){echo $GetSchool->addStdGroup($_POST);}
if($_POST['action'] == "addClass"){echo $GetSchool->addToClass($_POST);}
if($_POST['action'] == "addClassSubject"){echo $GetSchool->addClassSubject($_POST);}
if($_POST['action'] == "addStudent"){echo $GetStudent->addStudent($_POST, $_FILES);}
if($_POST['action'] == "addAdmin"){echo $GetSchool->addAdmin($_POST, $_FILES);}
if($_POST['action'] == "NewExamType"){echo $GetSchool->addNewExamType($_POST);}
if($_POST['action'] == "NewUserType"){echo $GetSchool->addNewUserType($_POST);}

if($_POST['action'] == "setCurrentSess"){echo $GetSchool->setCurrentSess($_POST);}
if($_POST['action'] == "setCurrentSems"){echo $GetSchool->setCurrentSems($_POST);}
if($_POST['action'] == "updateBatchesYear"){echo $GetSchool->updateBatchesYear($_POST);} 
if($_POST['action'] == "updateSemester"){echo $GetSchool->updateSemester($_POST);}
if($_POST['action'] == "updateStdGroup"){echo $GetSchool->updateStdGroup($_POST);}
if($_POST['action'] == "updateClass"){echo $GetSchool->updateClass($_POST);}
if($_POST['action'] == "updateClassSubject"){echo $GetSchool->updateClassSubject($_POST);}
if($_POST['action'] == "updateAdmin"){echo $GetSchool->updateAdmin($_POST);}
if($_POST['action'] == "updatesystemData"){ echo  $GetSchool->updateSchoolData($_POST, $_FILES); }
if($_POST['action'] == "stdUpdate"){ echo $GetStudent->stdUpdateProcess($_POST); }
if($_POST['action'] == "changeProfPic"){  echo $GetStudent->changeProfPic($_POST, $_FILES); }
if($_POST['action'] == "updateExamType"){  echo $GetSchool->updateExamType($_POST); }
if($_POST['action'] == "updateUserPermit"){  echo $GetSchool->updateUserPermit($_POST); } 
if($_POST['action'] == "systemWindow"){ echo $GetSchool->systemWindow();}
 if($_POST['action'] == "activateKey"){ echo $GetSchool->activateKey();}

if($_POST['action'] == "getResultLog"){  echo $GetSchool->getResultLog($_POST); }
  //all ends here;
}
?>