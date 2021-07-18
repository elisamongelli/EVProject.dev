<?PHP
    $numeroPrenotazioni = session()->get('numeroPrenotazioni');
	session()->set('numeroPrenotazioni', $numeroPrenotazioni-1);
    //$numeroPrenotazioni = count(session()->get('prenotazioni'));

    if ($numeroPrenotazioni == 1) {
        $path = '/Prenotazione/mostraResoconto';
    }
    else {
        $path = '/CalendarioPrenot';
    }

	$prenotazioni = array_merge(session()->get('prenotazioni'));
	$codiceFiscale = $prenotazioni[$numeroPrenotazioni-1]['CodiceFiscale'];
	
	$ruolo = session()->get('ruolo');
	if ($ruolo == 'Cittadino') {
		$msg1 = 'Seleziona giorno e ora, poi premi "Avanti"';
		$msg2 = '';
	}
	else {
		$msg1 = 'Seleziona giorno e ora, poi premi "Avanti"';
		$msg2 = $numeroPrenotazioni.' prenotazioni rimanenti';
	}
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">

<body>
	<div class="main-content">
		<?php
		$ruolo = "Cittadino";
		include __DIR__ . "/../common/navbar_account_funzionalita.php";
		?>

		<h1 class="h1-ruoli" style='text-align:center ; color:white; background-color:white'><b></br></br></b></h1>
		
		<div class="header pb-8 pt-0 d-flex align-items-center" style="min-height: 83%; background-color:white">
		
		
			<div class="container-fluid pt-5">
			  <div class="row">
				<div class="col-xl-8 order-xl-1 mb-5 mb-xl-0">
		
					  <center>


						<html lang="en">
						<head>
							<meta charset="UTF-8">
							
							<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
							<link rel="stylesheet" href="css/font-awesome.min.css">
							<link rel="stylesheet" href="css/all.css">
						</head>


						<div class="calendar disable-selection" id="calendar">
							<div class="left-side">
								<div class="current-day text-center">
									<h1 class="calendar-left-side-day"></h1>
									<div class="calendar-left-side-day-of-week"></div>
								</div>
								<div class="current-day-events">
									<div>Orari disponibili :</div>
									<ul class="current-day-events-list"></ul>
								</div>
								<div class="interaction">
									<div class="add-event-day">
										<input type="text" class="add-event-day-field" placeholder="Create an Event" value="<?= $codiceFiscale ?>">
										<span id="prenotazione-submit" class="cursor-pointer add-event-day-field-btn">Prenota</span>
									</div>
									<!--<div class="hour-start">
									<input type="time" id="hour-start" class="hour-start-value" name="appt">
									</div>-->
								</div>
							</div>
							<div class="right-side">
								<div class="text-right calendar-change-year">
									<div class="calendar-change-year-slider">
										<span class="fa fa-caret-left cursor-pointer calendar-change-year-slider-prev"></span>
										<span class="calendar-current-year"></span>
										<span class="fa fa-caret-right cursor-pointer calendar-change-year-slider-next"></span>
									</div>
								</div>
								<div class="calendar-month-list">
									<ul class="calendar-month"></ul>
								</div>
								<div class="calendar-week-list">
									<ul class="calendar-week"></ul>
								</div>
								<div class="calendar-day-list">
									<ul class="calendar-days"></ul>
								</div>
							</div>
						</div>

						<script async src="js/all.js"></script>


											  </center>

												
												<div class="row justify-content-center">
													<div class="card-body pt-0 pt-md-4">
														<div class="text-center">
															<center>
																<form name="calendario" method="post" action="<?= esc($path) ?>">
																	
																	<p style = "font-weight:bold"><br /><?= esc($msg1) ?></br><i><?= esc($msg2) ?></i></p>
																	
																	<button style="margin-left:30%" class="w3-button w3-section w3-teal w3-ripple accesso"> Avanti  &rarr; </button>
																</form>
															</center>
														</div>
													</div>
												</div>
										</div>
			  </div>
			</div>
		</div>
	</div>
</body>










