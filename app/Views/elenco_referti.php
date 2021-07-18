<?php
	$path = "docs/referti";
	$dh = opendir($path);
	
	$i=0;
	while (($file = readdir($dh)) !== false) {
		if($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {
			$files[$i] = $file;
			$i++;
		}
	}

	closedir($dh);
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head><title>Visualizza Referti</title></head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
	<?php
		include __DIR__ . "/common/navbar_account_funzionalita.php";
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
              <div class="text-center"></br>
				<center>
					<form method="post" action="/Referto/cercaReferto/<?= esc(session()->get('ruolo')) ?>">
					
						</br><h1>Inserisci il codice del referto </h1></br></br>
						<!--<h5 style="font-size:17px;text-align:center">Inserisci il codice:</h5></br>-->
						
						<p class="mt-0">
							<input class="form-control" type="text" name="codice" placeholder="Codice del Referto" style="width:70%" required>
						</p>
						
						<button class="w3-button w3-section w3-teal w3-ripple accesso"> Cerca </button></br>
					</form>
					
					<?php
						$j=0;
						while ($j < count($files)) {
							$newCodice = str_replace(".pdf", "", $files[$j]);
							
							foreach ($referti as $referto) {
								if ($referto['Codice'] == $newCodice) {
									echo "
										<div class='card card-profile shadow'>
											<div class='row justify-content-center'>
											  <div class='col-lg-3 order-lg-2'>
											  </div>
											</div>
											<div class='card-body pt-0 pt-md-4'>
											  <div class='text-center'>
												<center>
													<a href='/docs/referti/".$files[$j]."'><p>",$files[$j],"&emsp; - &emsp;",$referto['Nome'],"&ensp;",$referto['Cognome'],"&emsp; - &emsp;",$referto['Esito'],"</p></a>
												</center>
											  </div>
											</div>
										</div>
									";
								}
							}
							$j++;
						}
					?>
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

