<?php
  $file_handle = fopen("myfile", "r");
  while (!feof($file_handle)) {
     $lines = fgets($file_handle);
     $arr =  explode(" ", $lines);
     $line1 = $arr[3];
     $line2 = $arr[4];
     
  }
  fclose($file_handle);
  $cars = {0:$line1,1:$line2);
  echo $cars;
?>