<?php
 

class BeedyTips extends Database{
public function __construct(){
parent::__construct();
}
public static function loadBeedyTips(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedyapptips ORDER BY Rand() Limit 1");
$select->execute();
return $select;
}

//$randId = mt_rand($smallest,$biggest);

}
?>