<html>
<head>
<title>TubeLight</title>
<link rel="stylesheet" type="text/css" href="css/new.css"/>
<link rel="stylesheet" type="text/css" href="css/bulb.css"/>
<style>
h2 {
    text-align: center;
    text-transform: uppercase;
    
    color: #b19d92;
}
</style>

  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" charset="utf-8">
  setInterval(function() {
    $.ajax({
                url:"bulbread.php",
                type:"post",
                dataType:'json',
                data:{},
                success:function(result){
                  
                    if (parseInt(result)>0) {
                        document.getElementsByClassName("bl")[0].setAttribute("value", "on");
                        document.getElementById("footer").innerHTML = "Hello there!";
                        document.getElementById("demo").innerHTML = "Intensity:"+result +"%";
                    }
                    else {     
                        document.getElementsByClassName("bl")[0].setAttribute("value", "off");
                        document.getElementById("shadow").innerHTML = "Hello there!";
                        document.getElementById("demo").innerHTML = "Intensity:"+result +"%";
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
  <div id="lampadario">
          <input type="radio" name="switch" class="bl" checked="checked"/>
            
         <!-- <input type="radio" name="switch" value="off" checked="checked"/> -->
         
            <label for="switch"></label>
            <div id="filo"></div>
            <div id="lampadina">             
              <div id="sorpresa">
              
                <div id="footer">
                    
                </div>
               
                <div id="shadow">
                    
                </div>
                
                
              </div>
            </div>
        </div>
</div>

<div style="margin-left:65%;padding:1px 16px;">
<h2 id="demo"></h2>
</div>

</body>
</html>


