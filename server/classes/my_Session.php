<?php
 
class my_Session
{
	
	public $loggedin=false;
	public $name;
	public $lastname;
	public $position; 
	public $user_id = 0;
	public $user_name="Beedy";
	public $user_image;
	public $area_privilege;
	public $adminId;
	public $TransactionCode;
	
	 
	
	 function __construct()
	{ if(!isset($_SESSION)){
	session_start();
}	
		$this->check_login(); 
		}
	
 public static function test()
 {
 return "hello buddy";
 }
	
	public function is_logged_in()
	{
		return $this->loggedin;
		
		}
	
	
	 public  function Login($user, $user_name, $name, $user_id,$user_image)
	{
			 if($user)
			 {
				 $this->user_name = $_SESSION['user_name'] = $user_name;
				$this->name = $_SESSION['name'] = $name; 
				 $this->user_id = $_SESSION['user_id'] = $user_id;	 
			
			if(empty($user_image)): 
			$this->user_image = $_SESSION['user_image'] = "images/no_image.jpg";
			else: 
			$this->user_image = $_SESSION['user_image'] = $user_image;
			endif; 
			}
				 $this->loggedin =  true;
				 
			 }
 		 
	
	
	public  function UserPosition($user, $position)
	{
			 if($user)
			 {
				 $this->position = $_SESSION['position'] = $position;
				
 		 }
	}
	
		public  function setTransactionCode($user, $number)
	{
			 if($user)
			 {
				 $this->TransactionCode = $_SESSION['TransactionCode'] = $number;
				
 		 }
	}
	
	 
	
	
	private function check_login()
	
	{
		if(isset($_SESSION['user_name']))
		{
			$this->user_name = $_SESSION['user_name'];
			 $this->position = $_SESSION['position'];
			 $this->TransactionCode = $_SESSION['TransactionCode'];
			 $this->user_id = $_SESSION['user_id']; 
			$this->name = $_SESSION['name']; 
			$this->user_image = $_SESSION['user_image'];	
			 $this->loggedin = true;
			 
			}
		
		else
		{
		$this->user_name = "guest";
		 $this->loggedin = false;
			 	}
		
		}
	  
	
	public function logout()
	{
		unset($_SESSION['user_name']);
		unset($this->user_name);
		
		unset($_SESSION['user_id']);
		unset($this->user_id);
			
			unset($_SESSION['TransactionCode']);
		unset($this->TransactionCode);
		 
		unset($_SESSION['name']);
		unset($this->name); 
		
		unset($_SESSION['user_image']);
		unset($this->user_image); 
		 
		$this->loggedin = false;
		return true;
		}
	
	
	
	
	
	
	
	
	
	
	}


?>