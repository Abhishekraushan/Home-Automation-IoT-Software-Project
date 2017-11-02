<?php
session_start();
function send_value($btn_vals){
		// echo "Aaya!!";

		$file = fopen("temp.txt", "r");
		$line = fgets($file);

		fclose($file);
		if(!isset($_SESSION['fan']))
		{
			$_SESSION['fan']=1;
			$_SESSION['heater']=4;
			$_SESSION['ac']=8;
			$_SESSION['morteen']=9;
			$_SESSION['light']=2;
		}
		if(isset($_POST['ac_temp']))
		{
			$_SESSION['ac_temp']=$_POST['ac_temp'];
		}
		if(isset($_POST['heater_temp']))
		{
			$_SESSION['heater_temp']=$_POST['heater_temp'];
		}
		if(isset($_POST['fan']))
		{
			$_SESSION['fan_speed']=$_POST['fan'];
		}
		$value = explode(" ", $line);
		
		$temp = (int)$value[0];
		$bell = (int)$value[1];
		//$garrage = (int)$value[2];
		$intensity = (int)$value[3];
		// $morteen = 0;
		$light = 0;
		// $curtain = 0;
	
		 $Fan = 0;
		$Heater = 0;


		# for AC, Heater and Fan
		

		# For Curtain and light
		
		   // $curtain = 0;
		
	if(isset($_POST['f']))
	{

	}
	else{
		$VAL = $btn_vals;
		if($VAL==0 || $VAL==1 || $VAL==2)
		{
			$_SESSION['fan']=$VAL;
		}
		else if($VAL==3 || $VAL==4 || $VAL==5)
		{
			$_SESSION['heater']=$VAL;
		}
		else if($VAL==6 || $VAL==7 || $VAL==8)
		{
			$_SESSION['ac']=$VAL;
		}
		else if($VAL==9 || $VAL==10)
		{
			$_SESSION['morteen']=$VAL;
		}
		else if($VAL==11 || $VAL==12 || $VAL==13)
		{
			$_SESSION['light']=$VAL;
		}
	}

	$state = array($_SESSION['fan'],$_SESSION['heater'],$_SESSION['ac'],$_SESSION['morteen'],$_SESSION['light']);




		foreach($state as $btn_val)
		{

			switch ($btn_val) {
				case 0: 
					$_SESSION['fan'] = 0;
		    		$Fan = 0;
		    		break;
		    	case 1:
		    		$_SESSION['fan']=1;
		    		$Fan = $_POST['fan'];
		    		break;
		    	case 2:
		    		$_SESSION['fan']=2;
		    		if((int)$temp < 15)
					{	
							   $Fan = 0;}
					else if((int)$temp >=15 && (int)$temp < 20)
					{	
							    $Fan = 1;}
					else if((int)$temp >=20 && (int)$temp < 25)
					{	
							    $Fan = 2;
					}
					
					else if((int)$temp >=25)
					{	
							    $Fan = 3;
					}  //fixed we can change
		    		break;
		    	case 3:
		    		$_SESSION['heater'] = 3;
		    		$Heater = 0;
		    		break;
		    	case 4:
		    		$_SESSION['heater'] = 4;  //fixed we can change
		    		if((int)$temp < 15)
					{	
							   $Heater = 100;}
					else if((int)$temp >=15 && (int)$temp < 20)
					{	
							    $Heater = 70;}
					else if((int)$temp >=20 && (int)$temp < 25)
					{	
							    $Heater = 50;}
					else if((int)$temp >=25 && (int)$temp < 30)
					{	
							    $Heater = 40;}
					else if((int)$temp >=30)
					{	
							    $Heater = 0;
					}
		    		break;	
		    	case 5:
		    		$_SESSION['heater'] = 5;
		    		$Heater = $_POST['heater_temp'];  //fixed we can change

		    		break;
		    	case 6:
		    		$_SESSION['ac'] = 6;
		    		$Ac = 0;
		    		break;
		    	case 7:
		    		$_SESSION['ac'] = 7;
		    		$Ac = $_POST['ac_temp'];   //fixed we can change
		    		break;
		    	case 8:
		    		$_SESSION['ac'] = 8;
		    		if((int)$temp < 15)
					{	$Ac = 0;
							   }
					else if((int)$temp >=15 && (int)$temp < 20)
					{	$Ac = 26;
							    }
					else if((int)$temp >=20 && (int)$temp < 25)
					{	$Ac = 23;
							    }
					else if((int)$temp >=25 && (int)$temp < 30)
					{	$Ac = 18;
							    }
					else if((int)$temp >=30)
					{	$Ac = 16;
							    
					}

		    		break;
		    	case 9:
		    		$morteen = 0;
		    		break;
		    	case 10:
		    		$morteen = 1;
		    		break;
		    	case 11:
		    		$light = 0;
		    		break;
		    	case 13:
		    		if((int)$intensity < 25)
						$light = 100;
					   // $curtain = 100;   #open
					else if((int)$intensity >=25 && (int)$intensity < 50)
						$light = 80;
					   // $curtain = 80;
					else if((int)$intensity >=50 && (int)$intensity < 75)
						$light = 20;
					  //  $curtain = 20;    
					else if((int)$intensity >=75)
						$light = 0;
		    		break;
		    								
		    	default:
		    		# code...
		    		break;
		    }    
		}
		//     //$val = (str)$temp." ".(str)$bell." ".(str)$garrage." ".(str)$intensity." ".(str)$morteen." ".(str)$light." ".(str)$curtain." ".(str).$Ac." ".(str)$Fan." ".(str)$Heater
			if($_SESSION['ac']==7)
			{
				$Ac=$_SESSION['ac_temp'];
			}
			if($_SESSION['heater']==5)
			{
				$Heater=$_SESSION['heater_temp'];
			}
			if($_SESSION['fan']==1)
			{
				$Fan=$_SESSION['fan_speed'];
			}
			$val = $light." ".$temp." ".$Ac." ".$Heater." ".$bell." ".$Fan." ".$morteen." ".$intensity;
       		//$val = $temp." Bell->".$bell." Intensity->".$intensity." Light->".$light." AC->".$Ac." Heater->".$Heater." Fan->".$Fan;	
       		// echo $val;
       		shell_exec("/usr/bin/python3 hello1.py $val");
       		return $val;
		// return 0;
}//send value
// echo $_GET['ID'];

echo json_encode(send_value($_POST['ID'])) ;
?>