<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">
<link href="/css/modal.css" rel="stylesheet">

<head>
	<title>Il Mio Account</title>
	<style>
		a.elimina {
			color:red;
		}
		a.elimina:hover {
			color: #a90808;
		}
	</style>
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
	
			  <div style="text-align:right"><a href="/Account/modificaInfo/AziendaSanitaria"><i class="fas fa-pen-alt"></i>    Modifica</a></div></br>
				
				<div style="text-align:right"><a class="a elimina" href="#" id="elimina"><i class="fas fa-trash"></i>    <u>Elimina</u></a></div>
				
              <div class="text-center">
                <!--<h2 style="color:black;">Informazioni e FAQ</h2></br>-->
                <div class="h3 mt-0"></br>Nome</span></div></br>
                <div class="h2 mt--3"></br><?= esc(session()->get('nome')) ?></span></div></br>
                <div class="h3 mt-4"></br>Partita IVA</span></div></br>
				<div class="h2 mt--3"></br><?= esc(session()->get('partitaIVA')) ?></span></div></br>
                <div class="h3 mt-4"></br>Codice Fiscale</span></div></br>
				<div class="h2 mt--3"></br><?= esc(session()->get('codicefiscale')) ?></span></div></br>
				
				<hr width="70%" align="center" style="margin-left:15%">
				
                <div class="h3 mt-4"></br>Email</span></div></br>
				<div class="h2 mt--3"></br><?= esc(session()->get('email')) ?></span></div></br>
              </div>


				<div id="myModal" class="modal">
				<div class="modal-content">
					<form action="/Account/eliminaAccount/AziendaSanitaria">
						<span class="close">&times;</span>
						<div class="text-center">
							<p>Stai per eliminare il tuo profilo.<br />L'azione è IRREVERSIBILE</p>
							<p>Sei sicuro?</p>
							<div>
								<span style="color:#5e72e4" class="close annulla"><u>Annulla</u>&emsp;&ensp;</span>
								<button class="w3-button w3-section w3-teal w3-ripple elimina"> Elimina </button>
							</div>
						</div>
					</form>
				</div>
            </div>
          </div>
        </div>

          

        <script>
          // Get the modal
          var modal = document.getElementById("myModal");

          // Get the button that opens the modal
          var btn = document.getElementById("elimina");

          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];

          // Get the <span> element that closes the modal
          var spanAnnulla = document.getElementsByClassName("close annulla")[0];

          // When the user clicks the button, open the modal 
          btn.onclick = function() {
            modal.style.display = "block";
          }

          // When the user clicks on <span> (x), close the modal
          span.onclick = function() {
            modal.style.display = "none";
          }

          // When the user clicks on <span> (x), close the modal
          spanAnnulla.onclick = function() {
            modal.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }
        </script>
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

