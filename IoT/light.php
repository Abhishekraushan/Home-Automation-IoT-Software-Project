<?php 
$myfile = fopen("temp.txt", "r") or die("Unable to open file!");

$data = explode(" ", fgets($myfile));
$intensity=round($data[3],1);

if((int)$intensity < 25)
			$light = 100;
		   // $curtain = 100;   #open
		else if((int)$intensity >=25 && (int)$intensity < 50)
			$light = 80;
		   // $curtain = 80;
		else if((int)$intensity >=50 && (int)$intensity < 75)
			$light = 20;
		  //  $curtain = 20;    
		else if((int)$intensity >=75)
			$light = 0;

echo $light;
fclose($myfile);

// echo $id;