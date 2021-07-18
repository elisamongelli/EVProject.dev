<?php

	
	$con = mysqli_connect('localhost','root','');
    $mysqli = mysqli_select_db($con, 'prenotatamponi');
	
	$result = mysqli_query($con, "SELECT * FROM Prenotazioni");
	
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		  
		echo "<div class='date' id='data'>".$row['Data']." ".$row['CodiceFiscale']."</div>";
	  }
	  
	} else {
	  echo "0 results";
	}
	
	mysqli_close($con);
	
	
?>