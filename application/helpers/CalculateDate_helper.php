<?php 

function calculateDate($birth){
	$date = new DateTime($birth);
	$now = new DateTime();
	$age = $now->diff($date);
	return $age->y;
}

 ?>