<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head>
	<title>Invia il Referto</title>

    <style>
        
        .file {
            display: block;
            width: 400px;
            height: 100px;
            position:absolute;/*
            left:50%;
            top:50px;
            margin-left:-150px;*/
            border: 2px dashed rgba(0,0,0,.3);
            border-radius: 20px;
            font-family: Arial;
            text-align: center;
            position: relative;
            line-height: 180px;
            font-size: 20px;
            color: rgba(0,0,0,.3);
        }
        /*
        .file {
            width: 400px;
            height: 50px;
            background: #171717;
            padding: 4px;
            border: 1px dashed #333;
            position: relative;
            cursor: pointer;
        }
        */
        .file::before {
            content: 'Trascina il file o clicca qui';
            position: absolute;/*
            background: #171717;*/
            font-size: 20px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);/*
            width: 100%;
            height: 100%;*/
        }

        .file::after {
            content: '';
            position: absolute;/*
            color: #808080;*/
            font-size: 20px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
	<?php
		include __DIR__ . "/../common/navbar_account_funzionalita.php";
	?>

    <div id="error2" class="errorDiv" >Il file esiste già, ricarica il file qui sotto oppure <a href="/Dashboard/vdDashboard/Laboratorio" style="color:#525f7f"><u>prosegui</u></a></div>
	
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
                <!--<h2 style="color:black;">Informazioni e FAQ</h2></br>-->
				<center>
                    
					<form name="invioReferto" method="post" action="/Referto/salvaReferto" enctype="multipart/form-data">

                        <div>
                            <label style="font-size:18px">Referto da inviare:</label>
                            <input type="file" name="referto" id="file" class="file"></input>
                            <p class="mt-3" style="color:#605ed4;font-size:15px">(NB: il nome del file deve corrispondere al codice ID del referto)</p>
                            <span id="value" style="color:green"></span>
                        </div>

                        <script>
                            let file = document.getElementById('file');
                            file.addEventListener('change', function() {
                                if(file && file.value) {
                                    let val = file.files[0].name;
                                    document.getElementById('value').innerHTML = val + "  selezionato";
                                }
                            });
                        </script>


                        <p class="mt-5">
							<label>Codice del referto:</label>
							<input class="form-control" type="text" name="codice" placeholder="Codice Referto" value="<?= esc($codice) ?>" style="width:70%" required>
						</p>

                        <p class="mt-0">
							<label>Nome:</label>
							<input class="form-control" type="text" name="nome" placeholder="Nome" value="<?= esc($nome) ?>" style="width:70%" required>
						</p>

                        <p class="mt-0">
							<label>Cognome:</label>
							<input class="form-control" type="text" name="cognome" placeholder="Cognome" value="<?= esc($cognome) ?>" style="width:70%" required>
						</p>

                        <p class="mt-0">
							<label>Codice fiscale:</label>
							<input class="form-control" type="text" name="codiceFiscale" placeholder="Codice Fiscale" value="<?= esc($codicefiscale) ?>" style="width:70%" required>
						</p>

                        <p class="mt-0">
							<label>Esito:</label>
							<select id="esito" name="esito" style="width:70%" class="form-control" required>
							  <option class="firstOption"><?= esc($esito) ?></option>
							  <?php
								echo "<option class='otherOptions'>Positivo</option>";
								echo "<option class='otherOptions'>Negativo</option>";
								echo "<option class='otherOptions'>Dubbio</option>";
								echo "<option class='otherOptions'>Invalido</option>";
							  ?>
							</select>
						</p>

                        <p class="mt-0">
							<label>Dipendente dell'azienda:</label>
							<input class="form-control" type="text" name="azienda" value="<?= esc($azienda) ?>" style="width:70%" required>
						</p>

                        <p class="mt-0">
							<label>Email del laboratorio:</label>
							<input class="form-control" type="text" name="email" placeholder="Email" value="<?= esc($email) ?>" style="width:70%" required>
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

