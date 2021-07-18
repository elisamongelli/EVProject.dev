<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/stle-custom.css" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">

<head><title>Pagamento</title></head>

<!-- efettua pagamento -->

<body style="color: black">
	<div class="main-content">
		<?php
		$ruolo = "Cittadino";
		include __DIR__ . "/../common/navbar_account_funzionalita.php";
		?>
		
		
			<div class="container-fluid pt-5">
			  <div class="row">
				<div class="col-xl-8 order-xl-1 mb-5 mb-xl-0">
		
				<center>
				
				<link rel="stylesheet" href="css/pagamento.css">
				
				<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" action="/Pagamento/salvaDati" id="formPagamento">

        <div class="row">
          <div class="col-50">
			<p class="mt-0">
			<label>Nome</label>
			<input class="form-control" type="text" name="nome" placeholder="Nome" value="<?= esc(session()->get('nome')) ?>" style="width:70%" required>
			
			<label>Cognome</label>
			<input class="form-control" type="text" name="cognome" placeholder="Cognome" value="<?= esc(session()->get('cognome')) ?>" style="width:70%" required>
            
			<label>Codice Fiscale</label>
			<input class="form-control" type="text" name="codiceFiscale" placeholder="Codice Fiscale" value="<?= esc(session()->get('codicefiscale')) ?>" style="width:70%" required>
							
			<label>Email</label>
			<input class="form-control" type="text" name="email" placeholder="Email" value="<?= esc(session()->get('email')) ?>" style="width:70%" required>
            
			<label>Città di Residenza</label>
			<input class="form-control" type="text" name="citta" style="width:70%" required>
			
			<label>Indirizzo</label>
			<input class="form-control" type="text" name="indirizzo" style="width:70%" required>
			
			<label>CAP</label>
			<input class="form-control" type="text" name="cap" style="width:70%" required>
            
          </div>

          <div class="col-50">
            <label for="fname">Carta di credito accettata : </label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Nome sulla carta</label>
            <input type="text" id="nome" name="cardname">
            <label for="ccnum">Numero della carta</label>
            <input type="text" id="ccnum" name="cardnumber">
			
			
            <label for="expmonth">Mese</label>
            <!--<input type="text" id="month" name="expmonth">-->
			 <select name="mese" class="form-control" required>
			 <option class="firstOption" disabled selected value="">Mese</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			 </select>

            <div class="row">
              <div class="col-50">
                <label for="expyear">Anno</label>
                <!--<input type="text" id="year" name="expyear">-->
				<select name="anno" class="form-control" required>
				<option class="firstOption" disabled selected value="">Anno</option>
				<?php 
				for($i = 2021; $i < 2031; $i++) {

						echo "<option class='otherOptions'>$i</option>";

				}
				?>
				
				</select>
              </div>
			  
			  
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="c" name="cvv">
              </div>
			  <!--<div class="col-50">
		      <br><b><label for="expmonth">Prezzo 25€</label></b></br>
		      </div>-->
            </div>
			 <div class="col-25">
    <div class="container">
      <br><br><h4>Prezzo del Tampone 
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <!--<b>4</b>-->
        </span>
      </h4>
      <p><span>€<?= esc($prezzo) ?></span></p></br>
      
    </div>
  </div>
          </div>

        </div>

        
		<div class="textError" id="errorString" style="display:none">Tutti i campi sono obbligatori</div>
		<button type="button" onClick="submitForm();" class="w3-button w3-section w3-teal w3-ripple accesso"> Conferma Pagamento</button>
		
      </form>
    </div>
  </div>
</div>					
				</center>
					
				  
				</div>
			  </div>
			</div>
		</div>
	</div>
	

<!-- script che controlla i campi prima di fare submit -->	
<script text="text/javascript">

window.scrollBy({ 
  top: 100, // could be negative value
  left: 0, 
  behavior: 'smooth' 
});

	function submitForm(){
		var form = document.getElementById('formPagamento');
		
		var error=false;

		//controlla tutti i campi di form (es. form.card number, form.nome carta ecc...) se senza errori submit
		
		if(form.nome[0].value == ""){
			form.nome[0].classList.add("errordiv");
			error=true;
		}else{
			form.nome[0].classList.remove("errordiv");
		}
		
		if(form.cognome.value == ""){
			form.cognome.classList.add("errordiv");
			error=true;
		}else{
			form.cognome.classList.remove("errordiv");
		}
		
		if(form.codiceFiscale.value == ""){
			form.codiceFiscale.classList.add("errordiv");
			error=true;
		}else{
			form.codiceFiscale.classList.remove("errordiv");
		}
		
		if(form.email.value == ""){
			form.email.classList.add("errordiv");
			error=true;
		}else{
			form.email.classList.remove("errordiv");
		}
		
		if(form.citta.value == ""){
			form.citta.classList.add("errordiv");
			error=true;
		}else{
			form.citta.classList.remove("errordiv");
		}
		
		if(form.indirizzo.value == ""){
			form.indirizzo.classList.add("errordiv");
			error=true;
		}else{
			form.indirizzo.classList.remove("errordiv");
		}
		
		if(form.cap.value == "" || form.cap.value.length!=5){
			form.cap.classList.add("errordiv");
			error=true;
		}else{
			form.cap.classList.remove("errordiv");
		}
		
		
		if(form.cardname.value == ""){
			form.cardname.classList.add("errordiv");
			error=true;
		}else{
			form.cardname.classList.remove("errordiv");
		}
		
	
		var ccnum = form.cardnumber.value.replaceAll('-', '');
		 
		 
		if(ccnum == "" || ccnum.length!= 16){
			form.ccnum.classList.add("errordiv");
			error=true;
		}else{
			form.ccnum.classList.remove("errordiv");
		}
		
		
		/*if(expmonth == "" || expmonth.length!= 2){
			form.expmonth.classList.add("errordiv");
			error=true;
		}else{
			form.expmonth.classList.remove("errordiv");
		}
				
		
		if(expyear == "" || expyear.length!= 4){
			form.expyear.classList.add("errordiv");
			error=true;
		}else{
			form.expyear.classList.remove("errordiv");
		}*/
		
		if(form.cvv.value == "" || form.cvv.value.length!= 3){
			form.cvv.classList.add("errordiv");
			error=true;
		}else{
			form.cvv.classList.remove("errordiv");
		}


		
		if(!error){
			document.getElementById("errorString").style.display = "none";
			form.submit();
			
		}else{
			document.getElementById('formPagamento').scrollIntoView();
			document.getElementById("errorString").style.display = "block";
		}
			
		
			
		};

    
</script>
	
</body>







