<!DOCTYPE html>
<html>
<head>
	<?php require "header.php"; ?>
  
  <script type="text/javascript">
  var Id = -1;
  var Temperature;
  setInterval( function() {
    
      $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:Id,f:1},
            success:function(result){
              // alert(result);
              // $('#temp_area').html(result+"&#x2103 ");
              // alert(result);
           }
        });
    
}, 1000);
  setInterval( function() {
    
        $.ajax({
            url:"temp.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:$("#username").val()},
            success:function(result){
              // alert(result);
              Temperature = parseInt(result);
              $('#temp_area').html(result+"&nbsp&#x2103 ");
              // alert(result);
           }
        });
    
}, 1000);
  setInterval( function() {
    
        $.ajax({
            url:"light.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:$("#username").val()},
            success:function(result){
              // alert(result);
              if($('#light_power').text()=="On"){
                $('#light_area').html(result);
              }
              
              // alert(result);
           }
        });
    
}, 1000);
  setInterval( function() {
    
      $.ajax({
            url:"door.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:$("#username").val()},
            success:function(result){
              // alert(result);
              if(result==1)
              {
                $('#door_area').html("Someone at the door!!");
              }
              else
              {
                $('#door_area').html("Koi nahi hai!!");
              }
              // alert(result);
           }
        });
    
}, 1000);

  function toggle()
  {

    Id=6;
    if($('#ac_power').text()=="On")
    {
      $('#ac_power').html("Off");
      $("#ac_power_div").css("background-colour", "red");
      $('#ac_temp_area').html(0+"&nbsp&#x2103 ");

      Id=6;
    
    }
    else
    {
      $('#ac_power').html("On");
      if($('#ac_mode').text()=="Manual")
      {
        Id=7;
      }
      else
      {
        Id=8;
      }
    }
    // alert(Id);
   $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:Id},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
  
  }

  function heater_toggle()
  {

    Id=3;
    if($('#heater_power').text()=="On")
    {
      $('#heater_power').html("Off");
      $("#heater_power_div").css("background-colour", "red");
      

      Id=3;
    
    }
    else
    {
      $('#heater_power').html("On");
      if($('#heater_mode').text()=="Manual")
      {
        Id=5;
      }
      else
      {
        Id=4;
      }
    }
    // alert(Id);
   $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:Id},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
  
  }
 function fan_toggle()
  {

    Id=0;
    if($('#fan_power').text()=="On")
    {
      $('#fan_power').html("Off");
      $(".fan_power_div").css("background-colour", "red");
      

      Id=0;
    
    }
    else
    {
      $('#fan_power').html("On");
      if($('#fan_mode').text()=="Manual")
      {
        Id=1;
      }
      else
      {
        Id=2;
      }
    }
    // alert(Id);
   $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:Id},
            success:function(result){
              // alert(result);
             // alert(result);
              // alert(result);
           }
        });
  
  }
  setInterval(function(){
    var T=16;
    var HT = 100
    if(($('#ac_mode').text()=="Auto" && $('#ac_power').text()=="On"))
    {
      if(Temperature<15)
      {
        T=0;
        HT=100;
      }
      else if(Temperature>=15 && Temperature<20)
      {
        T=26;
        HT=70;
      }
      else if(Temperature>=20 && Temperature<25)
      {
        T=23;
        HT=50;
      }
      else if(Temperature>=25 && Temperature<30)
      {
        T=18;
        HT=40;
      }
      else
      {
        T=16;
        HT=0;
      }
      $('#ac_temp_area').html(T+"&nbsp&#x2103");
      
    }
    if($('#heater_mode').text()=="Auto" && $('#heater_power').text()=="On")
    {
      if(Temperature<15)
      {
        T=0;
        HT=100;
      }
      else if(Temperature>=15 && Temperature<20)
      {
        T=26;
        HT=70;
      }
      else if(Temperature>=20 && Temperature<25)
      {
        T=23;
        HT=50;
      }
      else if(Temperature>=25 && Temperature<30)
      {
        T=18;
        HT=40;
      }
      else
      {
        T=16;
        HT=0;
      }
      $('#heater_temp_area').html(HT+"&nbsp&#x2103");
    }
    if($('#fan_mode').text()=="Auto" && $('#fan_power').text()=="On")
    {
      var F=0;
      if(Temperature<15)
      {
        F=0;
      }
      else if(Temperature>=15 && Temperature<20)
      {
        F=1;
      }
      else if(Temperature>=20 && Temperature<25)
      {
        F=2
      }
      else if(Temperature>=25 )
      {
        F=3;
      }
      $('#fan_speed_area').html(F);
    }
  },1000);
  function toggle_mode()
  {
    Id=6;
    
    if($('#ac_mode').text()=="Manual")
    {
      $("#ac_mode").html("Auto");
      
      

      if($('#ac_power').text()=="On")
      {
        Id= 8;
      }
    }
    else
    {
      $('#ac_mode').html("Manual");
      if($('#ac_power').text()=="On")
      {
        Id = 7;
      }
    }
    $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:Id},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
  }
  function heater_toggle_mode()
  {
    Id=3;
     if($('#heater_mode').text()=="Manual")
    {
      $("#heater_mode").html("Auto");
      if($('#heater_power').text()=="On")
      {
        Id= 4;
      }
    }
    else
    {
      $('#heater_mode').html("Manual");
      if($('#heater_power').text()=="On")
      {
        Id = 5;
      }
    }
    $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:Id},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
  }
function fan_toggle_mode()
  {
    Id=0;
     if($('#fan_mode').text()=="Manual")
    {
      $("#fan_mode").html("Auto");
      if($('#fan_power').text()=="On")
      {
        Id= 2;
      }
    }
    else
    {
      $('#fan_mode').html("Manual");
      if($('#fan_power').text()=="On")
      {
        Id = 1;
      }
    }
    // alert("Ye wala"+Id);
    $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:Id},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });

  }
  function ac_temp_low(){
    var temp = $('#ac_temp_area').text().split(" ");
    if(parseInt(temp[0])>16&&$('#ac_mode').text()=="Manual")
    {
      var t = parseInt(temp[0])-1;
      $("#ac_temp_area").html(t+"&nbsp&#x2103");
      $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:7,ac_temp:t},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
  
    }
  }
  
  function ac_temp_up(){
    var temp = $('#ac_temp_area').text().split(" ");
    if(parseInt(temp[0])<30&&$('#ac_mode').text()=="Manual")
    {
      var t = parseInt(temp[0])+1;
      $("#ac_temp_area").html(t+"&nbsp&#x2103");
      $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:7,ac_temp:t},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
    }
  }
  function heater_temp_low(){
    var temp = $('#heater_temp_area').text().split(" ");
    if(parseInt(temp[0])>16 && $('#heater_mode').text()=="Manual")
    {
      var t = parseInt(temp[0])-1;
      $("#heater_temp_area").html(t+"&nbsp&#x2103");
      $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:5,heater_temp:t},
            success:function(result){
              // alert(result);
              //alert(result);
              // alert(result);
           }
        });
    }
    
  }

  function heater_temp_up(){
    var temp = $('#heater_temp_area').text().split(" ");
    if(parseInt(temp[0])<100 && $('#heater_mode').text()=="Manual")
    {
      var t = parseInt(temp[0])+1;
      $("#heater_temp_area").html(t+"&nbsp&#x2103");
      $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:5,heater_temp:t},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
    }
    
  }
  function fan_up()
  {
    var temp = $('#fan_speed_area').text();
    if(parseInt(temp)<3)
    {
      var t = parseInt(temp)+1;
      $("#fan_speed_area").html(t);
      $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:1,fan:t},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
    }
  }
  function fan_down()
  {
    var temp = $('#fan_speed_area').text();
    if(parseInt(temp)>0)
    {
      var t = parseInt(temp)-1;
      $("#fan_speed_area").html(t);
      $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:1,fan:t},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
    }
  }

  function light_toggle()
  {

    Id=11;
    if($('#light_power').text()=="On")
    {
      $('#light_power').html("Off");
      $(".light_power_div").css("background-colour", "red");
      

      Id=11;
      $('#light_area').html("Lights Off!");
    
    }
    else
    {
      $('#light_power').html("On");
      if($('#light_mode').text()=="Manual")
      {
        Id=-1;
      }
      else
      {
        Id=13;

      }
    }
  alert(Id);
   $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:Id},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
  
  }
  function door_toggle()
  {

    Id=0;
    if($('#door_power').text()=="On")
    {
      $('#door_power').html("Off");
      $(".door_power_div").css("background-colour", "red");
      

      Id=0;
    
    }
    else
    {
      $('#door_power').html("On");
      if($('#door_mode').text()=="Manual")
      {
        Id=1;
      }
      else
      {
        Id=2;
      }
    }
  // alert(Id);
   // $.ajax({
   //          url:"interface_to_result.php", //the page containing php script
   //          type: "post", //request type,
   //          dataType: 'json',
   //          data: {ID:Id},
   //          success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
   //         }
   //      });
  
  }
  function curtain_toggle()
  {

    Id=9;
    if($('#curtain_power').text()=="On")
    {
      $('#curtain_power').html("Off");
      $(".curtain_power_div").css("background-colour", "red");
      

      Id=9;
      $('#curtain_area').html("Curtains Closed");
    
    }
    else
    {
      $('#curtain_power').html("On");
      if($('#door_mode').text()=="Manual")
      {
        Id=1;
      }
      else
      {
        Id=10;
        $('#curtain_area').html("Curtains Open");
      }
    }
  // alert(Id);
   $.ajax({
            url:"interface_to_result.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:Id},
            success:function(result){
              // alert(result);
              // alert(result);
              // alert(result);
           }
        });
  
  }

</script>
</head>
<body class="indigo darken-4">
 <!-- Note that "m8 l9" was added -->

     
      <div class="row">
        <div class="col l4 m4 s12">
          <div class="card horizontal">
     <!--  <div class="card-image">
        <img src="images/temp.png" style="width: 100%;">
      </div> -->
      <div class="card-stacked">
        <div class="card-content">
          <h3 class="flow-text" align="center" style="font-size: 200%">Temperature</h3>
          <div class="row">
          <div class="col s12">
          <h2 class="flow-text" id="temp_area" align="center" style="font-size: 400%">16 &nbsp&#x2103</h2>
          </div>
          </div>
        </div>
        <div class="card-action"></div>
      </div>
    </div>
      </div>
      <div class="col l4 m4 s12">
        <div class="card horizontal" style="height: 100%">
      <!-- <div class="card-image">
        <img src="images/door.svg" style="width: 100%">
      </div> -->
      <div class="card-stacked">
        <div class="card-content">
        <h3 class="flow-text" style="font-size: 200%">Door Bell</h3>
        <div class="row">
        <div class="col s12">
          <h2 class="flow-text" id="door_area" style="font-size: 200%" align="center">No one's at the door!</h2>
          </div>
          </div>
        </div>
        <div class="card-action row">
         
         
        </div>
      </div>
    </div>
      </div>
      <div class="col l4 m4 s12">
        <div class="card horizontal">
      
      <div class="card-stacked">
        <div class="card-content">
          <h3 class="flow-text" id="door_area" style="font-size: 200%">AC</h3>
          <div class="row">
            <div class="col s2"><a href="#" id="ac_down" onclick="ac_temp_low()"><i class="material-icons">chevron_left</i></a></div>
            <div class="col s8">
              <h3 class="" align="center" id="ac_temp_area">16 &nbsp&#x2103</h3>
            </div>
            <div class="col s2"><a href="#" id="ac_up" onclick="ac_temp_up()"><i class="material-icons">chevron_right</i></a></div>
          </div>
        </div>
        <div class="card-action row">
          <div class="col s6" class="ac_power_div"><a  href="#" id="ac_power" onclick="toggle()">On</a></div>
          <div class="col s6"><a  href="#" id="ac_mode" onclick="toggle_mode()">Manual</a></div>
          
        </div>
      </div>
    </div>
      </div>
    </div>
    <div class="row">
            <div class="col l4 m4 s12">
        <div class="card horizontal">
      
      <div class="card-stacked">
        <div class="card-content">
          <h3 class="flow-text" id="door_area" style="font-size: 200%">Heater</h3>
          <div class="row">
            <div class="col s2"><a href="#" id="heater_down" onclick="heater_temp_low()"><i class="material-icons">chevron_left</i></a></div>
            <div class="col s8">
              <h3 class="" align="center" id="heater_temp_area">26 &nbsp&#x2103</h3>
            </div>
            <div class="col s2"><a href="#" id="heater_up" onclick="heater_temp_up()"><i class="material-icons">chevron_right</i></a></div>
          </div>
        </div>
        <div class="card-action row">
          <div class="col s6" class="heater_power_div"><a  href="#" id="heater_power" onclick="heater_toggle()">On</a></div>
          <div class="col s6"><a  href="#" id="heater_mode" onclick="heater_toggle_mode()">Manual</a></div>
          
        </div>
      </div>
    </div>
      </div>

      <div class="col l4 m4 s12">
        <div class="card horizontal">
      
      <div class="card-stacked">
        <div class="card-content">
          <h3 class="flow-text" id="door_area" style="font-size: 200%">Fan</h3>
          <div class="row">
            <div class="col s2"><a href="#" id="fan_low_control" onclick="fan_down()"><i class="material-icons">chevron_left</i></a></div>
            <div class="col s8">
              <h3 class="" align="center" id="fan_speed_area">0</h3>
            </div>
            <div class="col s2"><a href="#" id="fan_up_control" onclick="fan_up()"><i class="material-icons">chevron_right</i></a></div>
          </div>
        </div>
        <div class="card-action row">
          <div class="col s6" class="fan_power_div"><a  href="#" id="fan_power" onclick="fan_toggle()">On</a></div>
          <div class="col s6"><a href="#" id="fan_mode" onclick="fan_toggle_mode()">Manual</a></div>
          
        </div>
      </div>
    </div>
      </div>

      <div class="col l4 m4 s12">
        <div class="card horizontal" style="height: 100%">
      <!-- <div class="card-image">
        <img src="images/door.svg" style="width: 100%">
      </div> -->
      <div class="card-stacked">
        <div class="card-content">
        <h3 class="flow-text" style="font-size: 200%">Smart Lights</h3>
        <div class="row">
        <div class="col s12">
          <h2 class="flow-text" id="light_area" style="font-size: 200%" align="center"></h2>
          </div>
          </div>
        </div>
        <div class="card-action row">
          <div class="col s12" class="light_power_div"><a  href="#" id="light_power" onclick="light_toggle()">On</a></div>
         
        </div>
      </div>
    </div>
      </div>

    </div>
    <div class="row">
      <div class="col l4 m4 s12">
        <div class="card horizontal" style="height: 100%">
      <!-- <div class="card-image">
        <img src="images/door.svg" style="width: 100%">
      </div> -->
      <div class="card-stacked">
        <div class="card-content">
        <h3 class="flow-text" style="font-size: 200%">Smart Curtains</h3>
        <div class="row">
        <div class="col s12">
          <h2 class="flow-text" id="curtain_area" style="font-size: 200%" align="center"></h2>
          </div>
          </div>
        </div>
        <div class="card-action row">
          <div class="col s12" class="curtain_power_div"><a  href="#" id="curtain_power" onclick="curtain_toggle()">On</a></div>
         
        </div>
      </div>
    </div>
      </div>
    </div>
      </div>
    </div>
  
  <script type="text/javascript">
  	$( document ).ready( function() {
  		$(".button-collapse").sideNav();
});
    $( document ).ready( function() {
      $("#ac_power").attr("background-color", "red");
});
  </script>
  <script src="js/index.js"></script>
</body>
</html>