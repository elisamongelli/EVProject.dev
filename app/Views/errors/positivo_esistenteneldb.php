<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<body>
	<div class="main-content">
		<?php
		$ruolo = "Medico";
		include __DIR__ . "/../common/navbar_account_funzionalita.php";
		?>
		
		<div id="error2" class="errorDiv" >I dati inseriti erano già stati salvati</div>

		<h1 class="h1-ruoli" style='text-align:center ; color: #9f9ee5; background-color:white'></br></br>Inserisci i dati dei pazienti risultati positivi : </b></h1>
		
		<div class="header pb-8 pt-0 d-flex align-items-center" style="min-height: 83%; background-color: white">
			</br></br><div class="container-fluid pt-5">
			  </br></br><div class="row">
				<div class="col-xl-8 order-xl-1 mb-5 mb-xl-0">
				  <div class="card card-profile shadow">
					  <center>
						</br></br><h1>Inserisci i dati dei pazienti risultati positivi</h1></br></br>					  
						<form method="post" action="/PositiviDb/cittadiniPositivi">
						
							<p class="pt-md-4">
								<input class="form-control" type="text" name="nome" placeholder="Nome" style="width:90%" required>
							</p>
							
							<p class="pt-md-4">
								<input class="form-control" type="text" name="cognome" placeholder="Cognome" style="width:90%" required>
							</p>
							
							<p class="pt-md-4">
								<input class="form-control" type="text" name="codiceFiscale" placeholder="Codice Fiscale" style="width:90%" required>
							</p>
							
							<p class="pt-md-4">
								<input class="form-control" type="text" name="email" placeholder="Email" style="width:90%" required>
							</p>
							
							<button class="w3-button w3-section w3-teal w3-ripple accesso"> Invia </button>
						</form>
					  </center>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</body>


