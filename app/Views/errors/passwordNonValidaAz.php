<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<body>
	<div class="main-content">
		<?php include __DIR__ . "/../common/navbar_accesso.php";?>
		
		<div id="error2" class="errorDiv" >La password deve contenere da 8 a 15 caratteri e almeno un numero</div>
		
<div class="header pb-8 pt-5 pt-lg-88 d-flex align-items-center" style="min-height: 100%; background-image: url(/img/photo_2021-05-19_18-17-14.jpg); background-position: bottom; position: relative">
      <!-- Mask -->
	  
      <span class="mask bg-gradient-default opacity-8"></span>
		
		
			<div class="container-fluid pt-5">
			  <div class="row">
				<div class="col-xl-8 order-xl-1 mb-5 mb-xl-0">
				  <div class="card card-profile shadow">
					
					<div class="card-body pt-md-4">
					  <center>		
						<h1>Registrati </h1></br></br>					  
						<form method="post" action="/Registrazione/creaAccount/AziendaSanitaria">
						
							<p class="pt-md-4">
								<input class="form-control" type="text" name="nomeazienda" placeholder="Nome Azienda Sanitaria" value="<?= esc($Nome) ?>" style="width:90%" required>
							</p>
							
							<p class="pt-md-4">
								<input class="form-control" type="text" name="partitaiva" placeholder="Partita Iva" value="<?= esc($PartitaIva) ?>" style="width:90%" required>
							</p>
							
							<p class="pt-md-4">
								<input class="form-control" type="text" name="codicefiscale" placeholder="Codice Fiscale" value="<?= esc($CodiceFiscale) ?>" style="width:90%" required>
							</p>

							<p class="pt-md-4">
								<input class="form-control" type="text" name="email" placeholder="Email" value="<?= esc($Email) ?>" style="width:90%" required>
							</p>
							
							<p class="pt-md-4">
								<input class="form-control" type="password" name="password" placeholder="Password" style="width:90%" required>
							</p>
							
							<p class="pt-md-4">
								<input class="form-control" type="password" name="confermaPassword" placeholder="Conferma Password" style="width:90%" required>
							</p>
							
							<button class="w3-button w3-section w3-teal w3-ripple accesso"> Registrati </button>
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