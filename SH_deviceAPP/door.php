<html>
<head>
<title>Door
</title>

<link rel="stylesheet" type="text/css" href="css/new.css"/>
<link rel="stylesheet" type="text/css" href="css/door.css"/>

<script src="https://s.codepen.io/assets/libs/prefixfree.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script>
setInterval(function() {
            $.ajax({
                url:"fileread.php",
                type:"post",
                dataType:'json',
                data:{},
                success:function(result){
                    if (parseInt(result)==0) {
                        $(".thumb").removeClass("thumbOpened");
                       // var x = document.getElementById("myAudio"); 
                        //x.play(); 
                        document.getElementById("demo").innerHTML = "Door Closed"; 
                    }
                    else {
                       
                        $(".thumb").addClass("thumbOpened");
                        document.getElementById("demo").innerHTML = "Someone at the Door"; 
                    }
                        }
                    });
            
        },1000);
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
        <div class="perspective">
            <div class="thumb">
            </div>
        </div>
<h1 id="demo"></h1>
<!--<audio id="myAudio">
  <source src="image/door_creak_closing.mp3" type="audio/mpeg">
</audio>-->
</div>
</body>
</html>
