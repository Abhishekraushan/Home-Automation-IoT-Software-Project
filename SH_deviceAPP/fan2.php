
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<title>
</title>
<link rel="stylesheet" type="text/css" href="css/new.css"/>
<link rel="stylesheet" type="text/css" href="css/fan2.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
  
<script>

setInterval(function() {
    $.ajax({
                url:"fanread.php",
                type:"post",
                dataType:'json',
                data:{},
                success:function(result){
                  
                    var x1 = document.getElementsByClassName("btn");
                    var x = x1[0].value;
                    var speed= "paused";
                     $("button").removeClass("current");
                     
                    if(result == 0){
                      jQuery('#paused').click();
                      speed = $('#paused').data("speed");
                      document.getElementById("demo").innerHTML = speed;
                    }
                    else if(result==1){
                      jQuery('#btn1').click();
                      $('#btn1').addClass("current");
                      var speed = $('#btn1').data("speed");
                      document.getElementById("demo").innerHTML = speed;
                    }
                    else if(result==2){
                      jQuery('#btn2').click();
                      $('#btn2').addClass("current");
                      var speed = $('#btn2').data("speed");
                        document.getElementById("demo").innerHTML = speed;
                    }
                    else{
                        jQuery('#btn3').click();
                        $('#btn3').addClass("current");
                        var speed = $('#btn3').data("speed");
                        document.getElementById("demo").innerHTML = speed;
                    }

                      if(speed == "paused") {
                            $(".circle").css("animation-play-state", "paused");
                        } else {
                            $(".circle").css({ 
                                animationPlayState: "running",
                                animationDuration: speed
                            });
                        }
                    }
                    });
            
        },1000);


/*jQuery(function(){
  var x1 = document.getElementsByClassName("btn");
  var x = x1[0].value;
  var speed= "paused";
   $("button").removeClass("current");
   
  if(x == 0){
    jQuery('#paused').click();
    speed = $('#paused').data("speed");
    document.getElementById("demo").innerHTML = speed;
  }
  else if(x==1){
    jQuery('#btn1').click();
    $('#btn1').addClass("current");
    var speed = $('#btn1').data("speed");
    document.getElementById("demo").innerHTML = speed;
  }
  else if(x==2){
    jQuery('#btn2').click();
    $('#btn2').addClass("current");
    var speed = $('#btn2').data("speed");
      document.getElementById("demo").innerHTML = speed;
  }
  else{
      jQuery('#btn3').click();
      $('#btn3').addClass("current");
      var speed = $('#btn3').data("speed");
      document.getElementById("demo").innerHTML = speed;
  }

    if(speed == "paused") {
          $(".circle").css("animation-play-state", "paused");
      } else {
          $(".circle").css({ 
              animationPlayState: "running",
              animationDuration: speed
          });
      }
});
*/


$(document).ready(function(){
  $("button").click(function() {
      $("button").removeClass("current");
      $(this).addClass("current");
      
      var speed = $(this).data("speed");
      document.getElementById("demo").innerHTML = speed; 
      if(speed == "paused") {
          $(".circle").css("animation-play-state", "paused");
      } else {
          $(".circle").css({ 
              animationPlayState: "running",
              animationDuration: speed
          });
      }
  });
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

<div id="result" style="margin-left:25%;padding:30px 16px;"> 
<div class="circle">
    <div class="sector1"></div>
    <div class="sector2"></div>
    <div class="round-middle"></div>
</div>
<div class="btn_wrap">
  <button class="btn current" id="paused" value="<?php echo $line; ?>" data-speed="paused">0</button>
  <button class="btn" id="btn1" value="<?php echo $line; ?>"  data-speed="800ms" >1</button>
  <button class="btn" id="btn2" value="<?php echo $line; ?>" data-speed="500ms" >2</button>
  <button class="btn" id="btn3" value="<?php echo $line; ?>" data-speed="300ms" >3</button>
</div>
<h1 id="demo"></h1>
<h1 id="demos"></h1>
</div>

</body>
</html>
