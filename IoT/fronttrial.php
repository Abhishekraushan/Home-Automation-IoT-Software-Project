<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
<script type="text/javascript">
	
	setInterval( function() {
    
    	$.ajax({
            url:"trial.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {ID:$("#username").val()},
            success:function(result){
              // alert(result);

              alert(result);
           }
        });
    
}, 5000);

</script>
</head>
<body>
<form>
 <div class="radio-group">
<input type="radio" id="option-one" name="selector"><label for="option-one">One</label><input type="radio" id="option-two" name="selector"><label for="option-two">Two</label><input type="radio" id="option-three" name="selector"><label for="option-three">Three</label>
  </div>
   </form>
</body>
</html>