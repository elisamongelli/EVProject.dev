<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head><title>Il Mio Account</title></head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
	<?php
		include __DIR__ . "/../common/navbar_account_funzionalita.php";
	?>
	
	<div id="error2" class="errorDiv" >La password deve contenere da 8 a 15 caratteri e almeno un numero</div>
	
	
      <div class="container-fluid align-items-center" style="padding-top: 70px">
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 order-xl-1 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
			  <center>
				<form method="post" action="/Account/modificaAccount/AziendaSanitaria">
				
					<p class="pt-md-4">
						<input class="form-control" type="text" name="nomeazienda" placeholder="Nome Azienda Sanitaria" value="<?= esc(session()->get('nome')) ?>" style="width:90%" required>
					</p>
					
					<p class="pt-md-4">
						<input class="form-control" type="text" name="partitaiva" placeholder="Partita Iva" value="<?= esc(session()->get('partitaIVA')) ?>" style="width:90%" required>
					</p>
					
					<p class="pt-md-4">
						<input class="form-control" type="text" name="codicefiscale" placeholder="Codice Fiscale" value="<?= esc(session()->get('codicefiscale')) ?>" style="width:90%" required>
					</p>
					
					<p class="pt-md-4">
						<input class="form-control" type="password" name="password" placeholder="Password" style="width:90%" required>
					</p>
					
					<p class="pt-md-4">
						<input class="form-control" type="password" name="nuovaPassword" placeholder="Nuova Password" style="width:90%">
					</p>
					
					<p class="pt-md-4">
						<input class="form-control" type="password" name="confermaPassword" placeholder="Conferma Password" style="width:90%">
					</p>
					
					<button class="w3-button w3-section w3-teal w3-ripple accesso"> Salva </button>
				</form>
			  </center>
            </div>
          </div>
        </div>
            </div>
          </div>
        </div>
      <!--</div>
    </div>
  </div>-->
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
       
      </div>
    </div>
  </footer>
</body>

