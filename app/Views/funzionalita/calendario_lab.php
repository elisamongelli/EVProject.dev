<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">

<head><title>Calendario</title></head>

<body>
	<div class="main-content">
		<?php
		$ruolo = "Laboratorio";
		include __DIR__ . "/../common/navbar_account_funzionalita.php";
		?>

		<h1 class="h1-ruoli" style='text-align:center ; color:white; background-color:white'><b></br></b></h1>
		
		<div class="header pb-8 pt-0 d-flex align-items-center" style="min-height: 83%; background-color:white">
		

			<div class="container-fluid pt-5">
			  <div class="row">
				<div class="col-xl-8 order-xl-1 mb-5 mb-xl-0">

					<div class="card-body pt-md-4">
					  <center>
							<meta charset="UTF-8">
							
							<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
							<link rel="stylesheet" href="css/font-awesome.min.css">
							<link rel="stylesheet" href="css/all2.css">


						<div class="calendar disable-selection" id="calendar">
							<div class="left-side">
								<div class="current-day text-center">
									<h1 class="calendar-left-side-day"></h1>
									<div class="calendar-left-side-day-of-week"></div>
								</div>
								<div class="current-day-events">
									<div>Appuntamenti :</div>
									<ul class="current-day-events-list"></ul>
								</div>
								<div class="interaction">
									<div class="add-event-day">
										<input hidden type="text" class="add-event-day-field" placeholder="Codice Fiscale" value="" style="display: block !important"> 
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

						<script async src="js/all2.js"></script>
					  </center>
					</div>
				  
				</div>
			  </div>
			</div>
		</div>
	</div>
</body>


