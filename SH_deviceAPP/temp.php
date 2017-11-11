<?php header('Refresh:2; url=temp.php' ); ?>
<?php
  $file_handle = fopen("myfile", "r");
  while (!feof($file_handle)) {
     $lines = fgets($file_handle);
      $arr =  explode(" ", $lines);
      $line = $arr[2];
  }
  fclose($file_handle);
?>

<html>
<head>
<title>Temperature</title>
<link rel="stylesheet" type="text/css" href="css/new.css"/>
<link rel="stylesheet" type="text/css" href="css/temp.css"/>
<style>
h1 {
    text-align: center;
    text-transform: uppercase;
    text-shadow:
    0 1px 2px rgba(255,255,255,1),
    0 -1px 2px rgba(0,0,0,.55);
    color: #b19d92;
}
</style>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/jquery.tempgauge.js"></script>

  <script type="text/javascript">
      $(function(){
        if(!(/^\?noconvert/gi).test(location.search)){
          $(".tempGauge0").tempGauge({width:200, borderWidth:2, showLabel:true, showScale : true});
          $(".tempGauge1").tempGauge({width:40, borderWidth:3, showLabel:false});
          $(".tempGauge2").tempGauge({width:50, borderWidth:4, borderColor:"#adadad", fillColor:"#dcdcdc", showLabel:true});
          $(".tempGauge3").tempGauge({width:60, borderWidth:2, fillColor:"green"});
        }
      });
  </script>

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
<div style="margin-left:-30%;padding:1px 16px;">
<div class="button">
  <div class="dial">
    <div class="outer">
      <b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b><b></b>
    </div>
  </div>
  <div class="knob">
    <?php echo $line; ?>°
  </div>
</div>

<h1>ROOM TEMPERATURE</h1>
</div>
</div>
<div style="margin-left:80%;margin-top:-25%;padding:1px 16px;"> 
  <div class="tempGauge0"><?php echo $line; ?>&deg;C</div>
</div>
</body>
</html>
