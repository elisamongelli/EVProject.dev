<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head>
	<title>Compila Questionario Anamnesi</title>
</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
	<?php
		include __DIR__ . "/common/navbar_account_funzionalita.php";
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
					<form name="questionario" method="post" action="/Questionario/salvaDati">
					  <div id="print-content">
					  
						<!--</br><h1>Questionario di anamnesi</h1></br></br>-->
						<h2 style="text-align:center"><b>QUESTIONARIO DI ANAMNESI</b></h2>
						
						<p class="mt-0">
							<label>Codice (NB: codice fornito dal laboratorio)</label>
							<input class="form-control" type="text" name="codice" placeholder="Codice Questionario" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Laboratorio di Analisi: </label>
							<select id="labs" name="laboratorioAnalisi" style="width:70%" class="form-control" onchange="myfun()" required>
							  <option class="firstOption">Laboratorio di Analisi</option>
							  <?php

								foreach ($laboratori as $laboratorio)
								{
									$lab = $laboratorio['Nome'];
									
									echo "<option class='otherOptions'>$lab</option>";
								}
							  ?>
							</select>
							<span style="font-style:italic" id="pr"></span>
						</p>
						
						<!--<h2 style="font-size:17px;text-align:center"><?= esc(session()->get('codiceQuestionario'))?></h2>-->
					
						<h5 style="font-size:17px;text-align:center">DATI PERSONALI</h5>
						
						<p class="mt-0">
							<label>Nome</label>
							<input class="form-control" type="text" name="nome" placeholder="Nome" value="<?= esc(session()->get('nome'))?>" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Cognome</label>
							<input class="form-control" type="text" name="cognome" placeholder="Cognome" value="<?= esc(session()->get('cognome'))?>" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Codice Fiscale</label>
							<input class="form-control" type="text" name="codiceFiscale" placeholder="Codice Fiscale" value="<?= esc(session()->get('codicefiscale'))?>" style="width:70%" required>
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
							<label>Indirizzo di Residenza</label>
							<input class="form-control" type="text" name="indirizzo" placeholder="Indirizzo di Residenza" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Numero di Telefono</label>
							<input class="form-control" type="text" name="telefono" placeholder="Numero di Telefono" style="width:70%" required>
						</p>
						
						<p class="mt-0">
							<label>Email</label>
							<input class="form-control" type="text" name="email" placeholder="Email" value="<?= esc(session()->get('email'))?>" style="width:70%" required>
						</p>
					
						<h5 class="pt-md-4" style="font-size:17px;text-align:center">ANAMNESI PATOLOGICA PROSSIMA (ultime 48 ore)</h5>
						
						<input type="checkbox" name="febbre">
						<label> Febbre (T°>37,5)&emsp;</label>
						<input type="checkbox" name="dispnea">
						<label> Dispnea&emsp;</label>
						<input type="checkbox" name="tosse">
						<label> Tosse&emsp;</label>
						<input type="checkbox" name="mialgieDiffuse">
						<label> Mialgie diffuse&emsp;</label></br>
						<input type="checkbox" name="gusto">
						<label> Perdita del gusto&emsp;</label>
						<input type="checkbox" name="olfatto">
						<label> Perdita dell'olfatto&emsp;</label>
						<input type="checkbox" name="diarrea">
						<label> Diarrea&emsp;</label>
						<input type="checkbox" name="congiuntivite">
						<label> Congiuntivite monolaterale&emsp;</label></br>
						<input type="checkbox" name="emottisi">
						<label> Emottisi&emsp;</label>
						<input type="checkbox" name="congestioneNasale">
						<label> Congestione nasale&emsp;</label>
						<input type="checkbox" name="eruzioniCutanee">
						<label> Eruzioni cutanee&emsp;</label>
						<input type="checkbox" name="faringodinia">
						<label> Faringodinia&emsp;</label>
					
						
						<p class="pt-md-4">Ha effettuato viaggi negli ultimi 14 giorni :&ensp;
							<input type="radio" name="viaggio-si-no">
							<label> Si&ensp;</label>
							<input type="radio" name="viaggio-si-no">
							<label> No&ensp;</label></br>
							
							<input class="form-control" type="text" name="viaggio" placeholder="Luogo del viaggio" style="width:70%">
						</p>
					
						<h5 class="pt-md-4" style="font-size:17px;text-align:center">ANAMNESI PATOLOGICA REMOTA</h5>
						
						<input type="checkbox" name="broncopatiaCronica">
						<label> Broncopatia cronica&emsp;</label>
						<input type="checkbox" name="asma">
						<label> Asma&emsp;</label>
						<input type="checkbox" name="ipertensione">
						<label> Ipertensione arteriosa&emsp;</label></br>
						<input type="checkbox" name="aritmie">
						<label> Aritmie cardiache&emsp;</label>
						<input type="checkbox" name="scompensoCardiaco">
						<label> Scompenso cardiaco&emsp;</label>
						<input type="checkbox" name="malattieVascolari">
						<label> Malattie vascolari&emsp;</label></br>
						<input type="checkbox" name="neoplasie">
						<label> Neoplasie in atto&emsp;</label>
						<input type="checkbox" name="patologiaRenale">
						<label> Patologia renale cronica&emsp;</label>
						<input type="checkbox" name="epatopatia">
						<label> Epatopatia cronica&emsp;</label></br>
						<input type="checkbox" name="patologieAutoimmunitarie">
						<label> Patologie autoimmunitarie&emsp;</label>
						<input type="checkbox" name="patologiaSplenica">
						<label> Patologia splenica cronica&emsp;</label>
						<input type="checkbox" name="patologieNeurologiche">
						<label> Patologie neurologiche&emsp;</label></br>
						<input type="checkbox" name="cardiopatiaIschemica">
						<label> Cardiopatia ischemica&emsp;</label>
						<input type="checkbox" name="diabeteMellito">
						<label> Diabete mellito&emsp;</label></br>
						
						<input class="form-control" type="text" name="patologie" placeholder="Altro" style="width:70%">
						
						
						<p class="pt-md-4">Assume farmaci :&ensp;
							<input type="radio" name="farmaci-si-no">
							<label> Si&ensp;</label>
							<input type="radio" name="farmaci-si-no">
							<label> No&ensp;</label></br>
							
							<input class="form-control" type="text" name="farmaci" placeholder="Farmaci" style="width:70%">
						</p>
					
						<h5 class="pt-md-4" style="page-break-before:always;font-size:17px;text-align:center">VALUTAZIONE DEL RISCHIO DI CONTATTO CON CASO </br>CONFERMATO DI COVID-19</h5>
						
						<p class="mt-0">Tipologia di contatto :&ensp;
							<input type="checkbox" name="lavorativo">
							<label> Lavorativo&emsp;</label>
							<input type="checkbox" name="familiare">
							<label> Familiare&emsp;</label>
							<input type="checkbox" name="altro">
							<label> Altro&emsp;</label>
							<input class="form-control" type="text" name="contatto" placeholder="Altro" style="width:70%">
						</p>
						
						<p class="mt-0">Descrizione del contatto :&ensp;
							<input type="checkbox" name="spazi">
							<label> Condivisione spazi&emsp;</label>
							<input type="checkbox" name="oggetti">
							<label> Contatto con oggetti contaminati&emsp;</label></br>
							<input type="checkbox" name="serviziIgienici">
							<label> Utilizzo servizi igienici comune&emsp;</label>
							<input type="checkbox" name="mezziTrasporto">
							<label> Utilizzo comune mezzi di trasporto&emsp;</label></br>
							<input class="form-control" type="text" name="descrizioneContatto" placeholder="Altro" style="width:70%">
						</p>
						
						<p class="pt-md-4">Ambiente in cui è avvenuto il contatto :
						<p class="mt-0">Chiuso :&ensp;
							<input type="radio" name="area">
							<label> Area 5-10 m2&emsp;</label>
							<input type="radio" name="area">
							<label> Area 11-25 m2&emsp;</label></br>
							<input type="radio" name="area">
							<label> Area 26-60 m2&emsp;</label>
							<input type="radio" name="area">
							<label> Area ≥ 60 m2&emsp;</label></br>
						</p>
						<p class="mt-0">Aperto :&ensp;
							<input class="form-control" type="text" name="luogoAperto" placeholder="Luogo" style="width:70%">
						</p>
					  </div>
					  
					  <button class="w3-button w3-section w3-teal w3-ripple accesso" onClick="CopyElem();PrintElem('#print-content');"> Conferma e Stampa </button>
					</form>
					
					<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
					</script>
					
					<script type="text/javascript">
						function CopyElem(elem)
						{
						   $('form input[type=text]').each(function() {
							 $(this).attr('value', $(this).val());
						   });

						   $('form input[type=checkbox]').each(function() {
							 $(this).attr('checked', $(this).prop("checked"));
						   });

						   $('form input[type=radio]').each(function() {
							 $(this).attr('checked', $(this).prop("checked"));
						   });
						}
					
						function PrintElem(elem)
						{
							Popup($(elem).html());
						}

						function Popup(data) 
						{
							var mywindow = window.open();
							mywindow.document.write('<style type="text/css" media="print">' + 'select { display:none; }</style>');
							mywindow.document.write(data);
							mywindow.print();
							mywindow.close();
							
							return true;
						}
						
						function myfun() {
						  var x = document.getElementById('labs').selectedIndex;
						  var text = document.getElementsByTagName("option")[x].text;
						  document.getElementById("pr").innerHTML = text;
						}
					</script>
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

