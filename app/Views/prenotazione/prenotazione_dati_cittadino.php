<?php
    $numero = 0;
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head>
	<title>Prenotazione Tamponi</title>
</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
	<?php
		include __DIR__ . "/../common/navbar_account_funzionalita.php";
	?>
	
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
              <div class="text-center">
                
				<center>
				</br><h1>Prenota un tampone</h1></br></br>
					<form name="datiPrenotazione" method="post" action="/Prenotazione/salvaDati">
						
						<input type="hidden" name="numeroPrenotazioni" value="<?= esc($numero) ?>"/>
						
						<p class="mt-0">
							<label>Nome</label>
							<input class="form-control" type="text" name="nome" placeholder="Nome" value="<?= esc(session()->get('nome')) ?>" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Cognome</label>
							<input class="form-control" type="text" name="cognome" placeholder="Cognome" value="<?= esc(session()->get('cognome')) ?>" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Codice Fiscale</label>
							<input class="form-control" type="text" name="codiceFiscale" placeholder="Codice Fiscale" value="<?= esc(session()->get('codicefiscale')) ?>" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Data di Nascita</label>
							<input class="form-control" type="text" name="dataNascita" placeholder="gg/mm/aaaa" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Luogo di Nascita</label>
							<input class="form-control" type="text" name="luogoNascita" placeholder="Luogo di Nascita" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Città di Residenza</label>
							<input class="form-control" type="text" name="citta" placeholder="Città di Residenza" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Numero di Telefono</label>
							<input class="form-control" type="text" name="telefono" placeholder="Numero di Telefono" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Email</label>
							<input class="form-control" type="text" name="email" placeholder="Email" value="<?= esc(session()->get('email')) ?>" style="width:70%" required>
						</p>
					  
					  <button class="w3-button w3-section w3-teal w3-ripple accesso"> Conferma </button>
					</form>
				</center>
			  </div>
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

