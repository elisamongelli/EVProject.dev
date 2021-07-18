<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head><title>Visualizza Questionari Anamnesi</title></head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
	<?php
		include __DIR__ . "/common/navbar_account_funzionalita.php";
	?>
	<!-- Top navbar -->

    <!-- Header --><!--
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(/img/photo_2021-05-19_18-17-14.jpg); background-position: center;">
      <!-- Header container -->
      <div class="container-fluid align-items-center" style="padding-top: 200px">
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
					<form method="post" action="/Questionario/cercaQuestionario">
					
						<h5 style="font-size:17px;text-align:center">Inserisci il codice:</h5></br>
						
						<p class="mt-0">
							<input class="form-control" type="text" name="codice" placeholder="Codice del Questionario di Anamnesi" style="width:70%" required>
						</p>
						
						<button class="w3-button w3-section w3-teal w3-ripple accesso"> Cerca </button></br>
					</form>

          <div class='card card-profile shadow'>
            <div class='row justify-content-center'>
              <div class='col-lg-3 order-lg-2'>
              </div>
            </div>
            <div class='card-body pt-0 pt-md-4'>
              <div class='text-center'>
                <center>
                  <p><a href='/docs/questionari/<?= esc($Codice) ?>.pdf'><?= esc($Codice) ?>&emsp; - &emsp;<?= esc($Nome) ?>&ensp;<?= esc($Cognome) ?></a></p>
                </center>
              </div>
            </div>
          </div></br>
					
					<p><a href='/Questionario/visualizzaQuestionari'>Visualizza tutti</a></p>
					
				</center>
			  </div>
            </div>
          </div>
        </div>
       </div>
	</div>
        </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
      </div>
    </div>
  </footer>
</body>

