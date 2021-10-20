<?php

// KONEKCIJA NA MYSQL

$con = mysqli_connect(
"", // HOST
"", // DATABASE USERNAME
"", // PASSWORD
""); // DATABASE



if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
function time_ago($timestamp){
	$difference = time() - $timestamp;
	if($difference < 60){
		return $difference." sekundi";
	} else {
		$difference = round($difference / 60);
		if($difference < 60){
			return $difference." minuta";
		} else {
			$difference = round($difference / 60);
			if($difference < 24){
				return $difference." sati";
			} else {
				$difference = round($difference / 24);
				if($difference < 7){
					return $difference." dana";
				} else {
					$difference = round($difference / 7);
					return $difference." nedelja";
				}
			}
		}
	}
}