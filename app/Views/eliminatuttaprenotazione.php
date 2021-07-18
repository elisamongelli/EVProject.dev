<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">


<body>
  <div class="main-content">
    
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
            <div class="card-body pt-0 pt-md-4" style="padding-top : 4.5rem !important">
	
				
              <div class="text-center">
				<div class="h3 mt-4" style="margin-top : -2.5rem !important"></span></div>
				<div class="h2 mt--3" style="margin-top :1rem !important"><?php
							echo "<div class='text-center'>" . 
							"<br>"."<br>"."<p style='color:black'>". "Sei sicuro di voler eliminare la prenotazione?" . "</p>". "</br>"."</div>";
							echo "<br>" . "<span class='deleteMember'>
							<form action='EliminaPrenotazione' method='POST'>
							<button type='submit'>Si, conferma l'eliminazione</button>
							</form>
							</span>";	
							echo "<br>" . "<span class='deleteMember'>
							<form action='CalendarioPaziente' method='POST'>
							<button type='submit'>No, torna indietro</button>
							</form>
							</span>";	
				?>
				
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
        <!--<div class="copyright">
          <p>Made with <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Argon Dashboard</a> by Creative Tim</p>
        </div>-->
      </div>
    </div>
  </footer>
</body>

