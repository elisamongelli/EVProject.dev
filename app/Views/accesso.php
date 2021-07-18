<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head><title>Accedi</title></head>

<body>
	<div class="main-content">
		<?php include 'common/navbar_accesso.php';?>
		
<div class="header pb-8 pt-5 pt-lg-88 d-flex align-items-center" style="min-height: 100%; background-image: url(/img/photo_2021-05-19_18-17-14.jpg); background-position: bottom; position: relative">
      <!-- Mask -->
	  
      <span class="mask bg-gradient-default opacity-8"></span>
			<div class="container-fluid pt-5">
			  <div class="row">
				<div class="col-xl-8 order-xl-1 mb-5 mb-xl-0">
				  <div class="card card-profile shadow">
					
					<div class="card-body pt-md-4">
					  <center>

						<h1>Accedi</h1></br>
						
						<form method="post" action="Accesso/controllaCampi">
						
							<p class="pt-md-4">
								<input class="form-control" type="text" name="email" placeholder="Email" style="width:90%" required>
							</p>
							
							<p class="pt-md-4">
								<input class="form-control" type="password" name="password" placeholder="Password" style="width:90%" required>
							</p>
							
							<p class="pt-md-4" id="mySelect" style="width:90%">
								<select name="ruolo" class="form-control" required>
								  <option class="firstOption" disabled selected value="">Ruolo</option>
								  <option class="otherOptions">Cittadino</option>
								  <option class="otherOptions">Datore di Lavoro</option>
								  <option class="otherOptions">Medico di Medicina Generale</option>
								  <option class="otherOptions">Laboratorio di Analisi</option>
								  <option class="otherOptions">Azienda Sanitaria</option>
								</select>
							</p>
							
							<button class="w3-button w3-section w3-teal w3-ripple accesso"> Accedi </button>
						</form>
						<p style="color:black">Non sei ancora registrato?<a href="Registrazione">&nbsp Registrati</a></p>
					  </center>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</body>


