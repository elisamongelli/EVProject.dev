<?php

	$cf = esc(session()->get('codicefiscale'));
	
	$con = mysqli_connect('localhost','root','');
    $mysqli = mysqli_select_db($con, 'prenotatamponi');
	
	$query = mysqli_query($con, "SELECT * FROM Prenotazioni WHERE CodiceFiscale='$cf'");
	
	if($query){
		$query2 = mysqli_query($con, "DELETE FROM Prenotazioni WHERE CodiceFiscale='$cf'");
		$query3 = mysqli_query($con, "DELETE FROM PrenotazioniDati WHERE CodiceFiscale='$cf'");
		$query4 = mysqli_query($con, "DELETE FROM Pagamenti WHERE CodiceFiscale='$cf'");
		echo view("funzionalita/calendario_paziente");
	}
	
	mysqli_close($con);
	
	
?>
  
