<?php


	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
    $url_components = parse_url($url);
  
	parse_str($url_components['query'], $params);
      
	$codFIs= $params['cod'];
	$day= $params['day'];
	
	
	$dateSplit = explode("#",$day);
	
	$date = explode('/', $dateSplit[0]);
	
	$dateHour = explode(':', $dateSplit[1]);
	
	$mysqldate = date( 'Y-m-d H:i:s', strtotime($date[2].'-'.$date[1].'-'.$date[0].' '.$dateHour[0].':'.$dateHour[1].':00') );
	
	$con = mysqli_connect('localhost','root','');
    $mysqli = mysqli_select_db($con, 'prenotatamponi');
	
	$query = mysqli_query($con, "INSERT INTO Prenotazioni (CodiceFiscale,Data) VALUES ('$codFIs','$mysqldate')");

	mysqli_close($con);
	
	
	echo $codFIs." ".$mysqldate;
	
	if(!$query){
		echo "<div id='prenotazione-effect'>false</div>";
	}
	else{
		echo "<div id='prenotazione-effect'>true</div>";
	}
	
	
	
	
?>