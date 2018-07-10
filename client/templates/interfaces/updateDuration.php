<?php 
include('../../includes/system2.php');

$m = $_GET['m'];

$s = $_GET['s'];
$_SESSION['cbt']['duration'] = $m;
$_SESSION['cbt']['seconds'] = $s;
?>
