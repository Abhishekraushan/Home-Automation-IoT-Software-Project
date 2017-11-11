<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Curtain animation</title>

	<link rel="stylesheet" type="text/css" href="css/new.css"/>
	<link rel="stylesheet" type="text/css" href="css/curtain.css"/>	

	<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" charset="utf-8">
	setInterval(function() {
		$.ajax({
                url:"fileread1.php",
                type:"post",
                dataType:'json',
                data:{},
                success:function(result){
                    if (parseInt(result)==0) {
                    	
						//...animate the 2 curtain images to width of 50px with duration of 2 seconds...
						$("img.curtain").animate({ width: 200 },{duration: 1000});
						//...show the content behind the curtains with fadeIn function (2 seconds)
						//$(".content").fadeIn(2000);
                        document.getElementById("demo").innerHTML = "Window closed"; 
                    }
                    else {     
                       
						//...animate the 2 curtain images to width of 50px with duration of 2 seconds...
						$("img.curtain").animate({ width: 50 },{duration: 1000});
						//...show the content behind the curtains with fadeIn function (2 seconds)
						//$(".content").fadeIn(2000);
						document.getElementById("demo").innerHTML = "Window Open"; 
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

<div style="margin-left:25%;padding:50px 100px;"> 	
<!--START THE WRAPPER-->
<div class='curtain_wrapper'>
    
	<!-- 2 CURTAIN IMAGES START HERE  -->
	<img class='curtain curtainLeft' src='image/curtainLeft.jpg' />
    <img class='curtain curtainRight' src='image/curtainRight.jpg' />
    <!-- END IMAGES -->

</div>
<h1 id="demo"></h1>
<!--END THE WRAPPER-->

</div>
	<div style="margin-left:90%;margin-top:-25%;padding:1px 16px;"> 
  <div class="portrait"></div>
</div>
</body>
</html>