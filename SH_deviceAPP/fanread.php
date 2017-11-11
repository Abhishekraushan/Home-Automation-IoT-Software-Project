<?php
  $file_handle = fopen("myfile", "r");
  while (!feof($file_handle)) {
     $lines = fgets($file_handle);
     $arr =  explode(" ", $lines);
     $line = $arr[6];
  }
  fclose($file_handle);
  echo $line;
?>