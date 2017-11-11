<?php
  $file_handle = fopen("myfile", "r");
  $line="";
  while (!feof($file_handle)) {
     $lines = fgets($file_handle);
     $arr =  explode(" ", $lines);
     $line = $arr[7];
  }
  fclose($file_handle);
  echo $line;
?>