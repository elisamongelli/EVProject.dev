<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head><title>Gestisci Prenotazioni</title></head>


<body>
  <div class="main-content">
    <!-- Top navbar -->
		<?php
		$ruolo = "Cittadino";
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
            <div class="card-body pt-0 pt-md-4" style="padding-top : 4.5rem !important">
	
				
              <div class="text-center">
               
				<h1>Le tue Prenotazioni</h1></br>
				<div class="h2 mt--3" style="margin-top :1rem !important"></br><?php
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
						

						$sql = "SELECT Data FROM Prenotazioni WHERE CodiceFiscale='" . $_SESSION['codicefiscale'] . "'";
						$result = $conn->query($sql);
						$sql2 = "SELECT Esito FROM Referti WHERE CodiceFiscale='" . $_SESSION['codicefiscale'] . "'";
						$result2 = $conn->query($sql2);
						$sql3 = "SELECT * FROM PrenotazioniDati WHERE CodiceFiscale='" . $_SESSION['codicefiscale'] . "'";
						$result3 = $conn->query($sql3);
						
						if ($result3 !== false && $result3->num_rows > 0) {
							while($row = $result3->fetch_assoc()) {
						if ($result !== false && $result->num_rows > 0) {
						  // output data of each row
						  while($row = $result->fetch_assoc()) {
							  
							  //echo "<div style='color:black;'>" . "Data e ora : " . $row["Data"]. "<br>" . "</div>";
							  
							  $data = explode(" ",$row["Data"]);
							  
							  //echo $data[0]. " "; 
							  //echo $data[1]. " ";
							  
							  $splitdata = explode("-",$data[0]);
							  //echo $splitdata[2]. "/";
							  //echo $splitdata[1]. "/";
							  //echo $splitdata[0]. " ";
							  
							  							  
							  $splitora = explode(":",$data[1]);
							  //echo $splitora[0]. ":";
							  //echo $splitora[1]. " ";
							  
							  
							  echo "<div style='color:black;'>" . " " . $splitdata[2] . "/" . $splitdata[1] . "/" . $splitdata[0] . "  " . " " . $splitora[0]. ":" . $splitora[1]. " " . "<br>" . "</div>";
							  
							  
							  
							  if ($result2 !== false && $result2->num_rows > 0) {
								while($row = $result2->fetch_assoc()) {
								
								if($row["Esito"]=="Positivo"){
									echo "<br>" . "<div style='color:black;'>" . "Esito : " ."<div style='color:red;'>" . $row["Esito"]. "<br>" . "<br>" . "</div>";
								}
								else if($row["Esito"]=="Negativo"){
									echo "<br>" . "<div style='color:black;'>" . "Esito : " . "</div>" .  "<div style='color:green;'>" . $row["Esito"]. "<br>" . "<br>" . "</div>";
								}
							}
							  }
							else{
								echo "<br>" . "<span class='deleteMember'>
										<form action='EliminaTuttaPrenotazione' method='POST'>
										<button type='submit'>Elimina Prenotazione</button>
									</form>
									</span>";	       
							}
							  
						  }
						  
						} else {
						  echo "Non hai prenotazioni";
							echo "<br>" . "<div class='text-center'>" . 
							"<br>"."<br>"."<p style='color:black'>". "Vuoi effettuare una prenotazione?" . "<a href='Prenotazione'>&nbsp Prenotati</a>". "</p>". "</br>". "</br>"."
							</div>";
						}
						}
						}
						else{
							 echo "Non hai prenotazioni";
							 echo "<br>" . "<div class='text-center'>" . 
							"<br>"."<br>"."<p style='color:black'>". "Vuoi effettuare una prenotazione?" . "<a href='Prenotazione'>&nbsp Prenotati</a>" . "</p>". "</br>". "</br>"."
							</div>";
						}
						
						$conn->close();
						?></b></span></div>

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

