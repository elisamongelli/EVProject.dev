<?php
	$ruolo = session()->get('ruolo');

	if ($ruolo == 'Cittadino' or $ruolo == 'Datore') {
		$link = "/SceltaPagamento";
	}
	else $link = "/Dashboard/vdDashboard/Medico";
?>


<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head><title>Resoconto Prenotazione</title></head>

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
				<div class='text-center'>
				<h1>Resoconto della Prenotazione</h1></br>
				<?PHP
					$prenotazioni = array_merge(session()->get('prenotazioni'));

					for($i = 0; $i < count($prenotazioniCorrenti); $i++) {

						for($j = 0; $j < count($prenotazioni); $j++) {

							if ($prenotazioniCorrenti[$i]['CodiceFiscale'] == $prenotazioni[$j]['CodiceFiscale']) {
								echo "
										<div class='h3 mt-4'></br>Nome</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['Nome']."</span></div></br>
										<div class='h3 mt-4'></br>Cognome</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['Cognome']."</span></div></br>
										<div class='h3 mt-4'></br>Codice Fiscale</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['CodiceFiscale']."</span></div></br>
										<div class='h3 mt-4'></br>Data Nascita</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['DataNascita']."</span></div></br>
										<div class='h3 mt-4'></br>Luogo Nascita</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['LuogoNascita']."</span></div></br>
										<div class='h3 mt-4'></br>Città di Residenza</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['Citta']."</span></div></br>
										<div class='h3 mt-4'></br>Tipologia Tampone</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['TipologiaTampone']."</span></div></br>
										<div class='h3 mt-4'></br>Numero di Telefono</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['NumTelefono']."</span></div></br>
										<div class='h3 mt-4'></br>Email</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['Email']."</span></div></br>
										<div class='h3 mt-4'></br>Laboratorio di Analisi</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioni[$i]['LaboratorioAnalisi']."</span></div></br>
										<div class='h3 mt-4'></br>Data della Prenotazione</span></div></br>
										<div class='h2 mt-4'></br>".$prenotazioniCorrenti[$j]['Data']."</span></div></br>
								";
							}
						}

						if ($i < count($prenotazioniCorrenti) - 1) {
							echo "<hr width='70%' align='center' style='margin-left:15%;height:2px;background-color:black'>";
						}
					}
				?>
				
				<form name="tipoTampone" method="post" action="<?= esc($link) ?>">
					<button class="w3-button w3-section w3-teal w3-ripple accesso"> Avanti  &rarr; </button>
				</form>

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

