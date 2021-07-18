<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head>
	<title>Prenotazione Tampone</title>
</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
	<?php
		include __DIR__ . "/../common/navbar_account_funzionalita.php";
	?>
	
      <div class="container-fluid align-items-center" style="padding-top: 150px">
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
					<form name="numPrenotazioni" method="post" action="/Prenotazione/inserisciDati">
						
						<p class="mt-0">
							</br><h1>Seleziona il numero di prenotazioni </h1></br></br>
							<select id="numero" name="numeroPrenotazioni" style="width:70%" class="form-control" required>
							  <option class="firstOption">1</option>
							  <?php
								for ($i = 2; $i <= 10; $i++)
								{
									echo "<option class='otherOptions'>$i</option>";
								}
							  ?>
							</select>
						</p>
						
						<?php
							if (session()->get('ruolo') == 'Datore') {
								echo "
									<p class='mt-0'>
										<label>Nome Azienda</label>
										<input class='form-control' type='text' name='azienda' placeholder='Nome Azienda' value='".session()->get('nomeazienda')."' style='width:70%' required>
									</p>
								";
							}
						?>
					  
					  <button class="w3-button w3-section w3-teal w3-ripple accesso"> Avanti  &rarr; </button>
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

