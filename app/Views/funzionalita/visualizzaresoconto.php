<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head><title>Visualizza Resoconto</title></head>


<body>
  <div class="main-content">
    <!-- Top navbar -->
		<?php
		$ruolo = "AziendaSanitaria";
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
            <div class="card-body pt-0 pt-md-4" style="padding-top : 2.5rem !important">
	
				
              <div class="text-center">
			  
				
				<h1>Resoconto</h1></br></br>
				<div class="h2 mt--3" style="margin-top :1rem !important"><?php
						
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "prenotatamponi";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
						  die("Connection failed: " . $conn->connect_error);
						}
							
						$sql = "SELECT COUNT(CodiceFiscale) AS NumeroTamponi FROM Risultati WHERE AziendaSanitaria='$asl'";
						$result = $conn->query($sql);
						
						$sql2 = "SELECT COUNT(Esito) AS EsitoPositivo FROM Risultati WHERE Esito='Positivo' AND AziendaSanitaria='$asl'";
						$result2 = $conn->query($sql2);
						
						$sql3 = "SELECT COUNT(Esito) AS EsitoNegativo FROM Risultati WHERE Esito='Negativo' AND AziendaSanitaria='$asl'";
						$result3 = $conn->query($sql3);
						

						if ($result !== false && $result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<div style='color:black'>" . "Numero di tamponi effettuati : " . "&nbsp" .  "&nbsp" . $row["NumeroTamponi"]. "<br>" . "</div>";
						}
						}
						else{
							echo "";
						}
						
						if ($result2 !== false && $result2->num_rows > 0) {
							while($row = $result2->fetch_assoc()) {
								echo "<br>" . "<div style='color:black'>" . "Numero di tamponi risultati positivi: " . "&nbsp" . "&nbsp" . $row["EsitoPositivo"]. "<br>" . "</div>";
						}
						}
						else{
							echo "";
						}
						
						if ($result3 !== false && $result3->num_rows > 0) {
							while($row = $result3->fetch_assoc()) {
								echo "<br>" . "<div style='color:black'>" . "Numero di tamponi risultati negativi: " . "&nbsp" . "&nbsp" . $row["EsitoNegativo"]. "<br>" . "</div>";
						}
						}
						else{
							echo "";
						}
						
						$conn->close();
						?></br></span></div>
						
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
