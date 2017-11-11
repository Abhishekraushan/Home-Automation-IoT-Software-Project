<?php header('Refresh:1; url=ac.php' ); ?>
<?php
  $file_handle = fopen("myfile", "r");
  while (!feof($file_handle)) {
     $lines = fgets($file_handle);
     $arr =  explode(" ", $lines);
     $line1 = $arr[3];
     $line2 = $arr[4];
     
  }
  fclose($file_handle);
?>
<html>
<head>
<title>AC and Heater
</title>
<link rel="stylesheet" type="text/css" href="css/new.css"/>
<link rel="stylesheet" type="text/css" href="css/ac.css"/>
</head>
<body>

 <ul>
  <li><a class="active" href="home.php">Smart Home</a></li>
  <li><a href="bulb.php">Smart Light</a></li>
  <li><a href="temp.php">Thermostat</a></li>
  <li><a href="ac.php">AC & Heater</a></li>
  <li><a href="door.php">Smart Door</a></li>
  <li><a href="fan2.php">Smart Fan</a></li>
  <li><a href="curtain.php">Smart Curtain</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;">
<div class="container" id="ac">
    <div class="de">
        <div class="den">
          <div class="dene">
            <div class="denem">
              <div class="deneme">
                <?php echo $line1; ?><strong>&deg;</strong>
              </div>
            </div>
          </div>
        </div>
    </div>
   <h1>AIR CONDITIONER</h1> 
</div>


<div class="container" id="heater">
    <div class="de">
        <div class="den">
          <div class="dene">
            <div class="denem">
              <div class="deneme">
                <?php echo $line2; ?><strong>&deg;</strong>
              </div>
            </div>
          </div>
        </div>
    </div>
    <h1>HEATER</h1> 
</div>

</div>
</body>
</html>
