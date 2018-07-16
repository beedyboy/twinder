<?php

$days = 31;
	$from=date('Y-m-d');
	$dateFrom=date('Y-m-d');
echo $dateTo= date('Y-m-d', strtotime($dateFrom. '+'. $days.' days'));

?>