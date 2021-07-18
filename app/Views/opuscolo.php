<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="/css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="/css/login.css">

<head><title>Opuscolo Informativo</title></head>

<body>
	<div class="main-content">
		<?php 
			if(session()->get('ruolo')) {
				$accesso = 1;
			}
			else $accesso = 0;
			
			include 'common/navbar_opuscolo.php';
		?>

		
<div class="header pb-8 pt-5 pt-lg-88 d-flex align-items-center" style="min-height: 100%; background-image: url(/img/photo_2021-05-19_18-17-14.jpg); background-position: bottom; position: relative">
      <!-- Mask -->
	  
      <span class="mask bg-gradient-default opacity-8"></span>
		

			<div class="container-fluid pt-5">
			  <div class="row">
				
				
		<div class="card card-profile shadow" style="background-color:#ffffffd6">	
		<div class="card-body pt-md-4">
		<center>
		<h1 class="h1-opuscolo"><i>Quante e quali sono le tipologie di tampone?</i></h1>
		<p  class="p-opuscolo" style="margin-left: 1%; margin-top: 2%; font-size: 18px">Le tipologie di tampone sono due:</br></p>
		<ul><li><p  class="p-opuscolo" style="margin-left: 1% ; margin-top: 2%; font-size: 18px">
		TAMPONE MOLECOLARE: è il test attualmente più affidabile per la diagnosi di infezione da coronavirus. Viene eseguito su un campione prelevato con un tampone a livello naso/oro-faringeo, 
		e quindi analizzato attraverso metodi molecolari di real-time RT-PCR (Reverse Transcription-Polymerase Chain Reaction) per l’amplificazione dei geni virali maggiormente espressi durante 
		l’infezione. L’analisi può essere effettuata solo in laboratori altamente specializzati, individuati dalle autorità sanitarie, e richiede in media dalle 2 alle 6 ore dal momento in cui 
		il campione viene avviato alla processazione in laboratorio;</p></li>
		<li><p  class="p-opuscolo" style="margin-left: 1% ; margin-top: 2%; font-size: 18px">TAMPONE ANTIGENICO (RAPIDO): questa tipologia di test è basata sulla ricerca, nei campioni respiratori, di proteine virali (antigeni). Le modalità di raccolta del campione sono del 
		tutto analoghe a quelle dei test molecolari (tampone naso-faringeo), i tempi di risposta sono molto brevi (circa 15 minuti), ma la sensibilità e specificità di questo test sembrano 
		essere inferiori a quelle del test molecolare. Ciò comporta la possibilità di risultati falso-negativi in presenza di bassa carica virale (tC>25), oltre alla necessità di confermare i 
		risultati positivi mediante un tampone molecolare.</p></li></ul>
		</center>
		</div>
		</div>
		</br>
	
		<div class="card card-profile shadow" style="background-color:#ffffffd6">
		<div class="card-body pt-md-4">
		<center>
		<h1 class="h1-opuscolo"><i>Cosa devo fare prima di effettuare il tampone?</i></h1>
		<p  class="p-opuscolo" style="margin-top: 2%; font-size: 18px">Prima di effettuare il tampone è necessario compilare il consenso informato e il questionario di anamnesi.  Per ragioni di validità la compilazione deve 
		avvenire al momento dell'esame diagnostico, pertanto all'utente registrato al sistema verrà fornito, dal laboratorio, un codice di accesso alla sezione del questionario, per poterlo 
		compilare online. </br></br>E' possibile visualizzare un prototipo dei documenti qui di seguito:</br></br>
		<a href="docs/Consenso test antigenico compilabile.pdf" download>Consenso Informato</a></br>
		<a href="docs/Questionario valutazione del rischio da contagio COVID-19 270121_compilabile.pdf" download>Questionario di Anamnesi</a></p>
		</center>
		</div>
		</div></br>
	
		
		<div class="card card-profile shadow" style="background-color:#ffffffd6">
		<div class="card-body pt-md-4">
		<center>
		<h1 class="h1-opuscolo"><i>Come devo comportarmi se il risultato del mio test è negativo?</i></h1>
		<p  class="p-opuscolo" style="margin-top: 2%; font-size: 18px">Esiste la possibilità che, nonostante la negatività del test, sia stata comunque contratta l'infezione da SARS-CoV-2 e che si manifestino sintomi nei giorni seguenti. 
		Il periodo più lungo di incubazione, della malattia da COVID-19, descritto è di 21 giorni. Si deve pertanto monitorare l'eventuale insorgenza di sintomi e applicare le misure
		previste per la prevenzione del contagio: l'utilizzo della mascherina, la disinfezione frequente delle mani, l'areazione dei locali dove si soggiorna e/o lavora. L’infezione dà 
		SARS-CoV-2 porta a una malattia la cui presentazione è proteiforme, variando da inapparente a una sintomatologia simile a quella di un raffreddore comune, fino alla polmonite con grave 
		difficoltà respiratoria, potenzialmente fatale. Si può sospettare un’infezione da SARS-CoV-2 se il quadro sindromico iniziale comprende febbre con andamento continuo o intermittente, 
		tosse secca, astenia, mialgie e artralgie e disturbi gastrointestinali. I sintomi non respiratori possono precedere quelli respiratori e la febbre. Nella forma di malattia lieve, in 
		cui non c’è polmonite o ipossia, la febbre dura poco o manca e sono prevalenti il mal di testa e di gola, la congestione nasale, la tosse e la perdita dell’olfatto. A volte vi sono 
		diarrea, nausea o vomito, spossatezza, mancanza di appetito, modificazioni cutanee specie alle estremità, perdita del gusto e/o dell’olfatto.</p>
		<h1 class="h1-opuscolo" style="margin-top: 2%"><br><i>E come invece se è positivo?</br></i></h1>
		<p  class="p-opuscolo" style="margin-top: 2%; font-size: 18px">Se il risultato del test è positivo, la prima cosa da fare è isolarsi dal resto della famiglia, se possibile in una stanza singola ben ventilata, evitare contatti sociali e 
		comunicare la propria positività al proprio Medico di Medicina Generale. Inoltre, preparare l’elenco delle persone con cui si ha avuto contatti a rischio nei due giorni precedenti 
		l’inizio dei sintomi (o la data di effettuazione del tampone se non si hanno sintomi), poichè sarà utile al Dipartimento di Prevenzione. Pertanto, previa informativa al proprio medico di medicina 
		generale, si dovrà rimanere in quarantena obbligatoria, nel rispetto degli adempimenti previsti dalle normative vigenti.<br>
		N.B. Gli individui risultati positivi potranno uscire dalla quarantena solo dopo essere stati sottoposti all’esecuzione di un tampone che sia risultato negativo (guarigione clinica e virologica).</br></p>
		</center>
		</div>
		</div>
		</br>
					  
				
			  </div>
			</div>
		</div>
	</div>
</body>


