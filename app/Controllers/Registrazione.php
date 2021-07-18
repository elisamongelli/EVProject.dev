<?php

namespace App\Controllers;

use App\Models\CittadinoModel;
use App\Models\DatoreModel;
use App\Models\MedicoModel;
use App\Models\LaboratorioModel;
use App\Models\AziendaSanitariaModel;

use CodeIgniter\Controller;

class Registrazione extends Controller
{
    public function index()
    {
        return view('ruoli');
    }
	
	public function visualizzaForm($ruolo)
	{
		
		switch ($ruolo) {
			case "Cittadino":
				$model = new MedicoModel();
				$data = [
					'medici' => $model->getAllMedici(),
				];
				
				echo view('registrazioni/reg_cittadino', $data);
				break;
			case "Datore":
				echo view('registrazioni/reg_datore');
				break;
			case "Medico":
				echo view('registrazioni/reg_medico');
				break;
			case "Laboratorio":
				echo view('registrazioni/reg_laboratorio');
				break;
			case "AziendaSanitaria":
				echo view('registrazioni/reg_aziendasan');
				break;
		}
	}
	
	public function creaAccount($ruolo)
	{
		
		switch ($ruolo) {
			
			case "Cittadino":
				$nome = $_POST['nome']; $cognome = $_POST['cognome']; $cf = $_POST['codiceFiscale']; $medico = $_POST['medicoCurante'];
				$email = $_POST['email']; $password = $_POST['password']; $confermaPass = $_POST['confermaPassword'];
				$data = [
					//'ruolo' => "Cittadino",
					'Nome' => $nome,
					'Cognome' => $cognome,
					'CodiceFiscale' => $cf,
					'MedicoCurante' => $medico,
					'Email' => $email,
					'Password' => $password,
				];
				
				$model = new MedicoModel();
				$dataErrors = [
					'Nome' => $nome,
					'Cognome' => $cognome,
					'CodiceFiscale' => $cf,
					'MedicoCurante' => $medico,
					'Email' => $email,
					'Password' => $password,
					'medici' => $model->getAllMedici(),
				];
				
				$model = NULL;
				
				$model = new CittadinoModel();
				
				if ($model->getUtente($email, $password) == 1) {
					
					if (strlen($password)>= 8 && strlen($password)<= 15 && preg_match("#[0-9]+#",$password)) {
						
							if (strcmp($password, $confermaPass) == 0) {
								
								$model->save($data);
								
								$session = session();
								
								$_SESSION['ruolo'] = "Cittadino";
								$_SESSION['nome'] = $nome;
								$_SESSION['cognome'] = $cognome;
								$_SESSION['codicefiscale'] = $cf;
								$_SESSION['medico'] = $medico;
								$_SESSION['email'] = $email;
								$_SESSION['tipologiaTampone'] = "";
								$_SESSION['numeroPrenotazioni'] = 0;
								$_SESSION['prenotazioni'] = array();
								
								
								return redirect()->to('/Dashboard/vdDashboard/Cittadino');
							}
							else {
								echo view('errors/reg_cittadino_passNonCoincidono', $dataErrors);
							}
					}
					else {
						echo view('errors/reg_cittadino_passNonValida', $dataErrors);
					}
				}
				else {
					echo view('errors/reg_cittadino_accountEsistente', $dataErrors);
				}
				
				break;
			
			case "Datore":
				$nome = $_POST['nome']; $cognome = $_POST['cognome']; $cf = $_POST['codiceFiscale']; 
				$nomeAzienda = $_POST['nomeAzienda']; $partitaIVA = $_POST['partitaIVA']; $cfAzienda = $_POST['codiceFiscaleAzienda']; 
				$email = $_POST['email']; $password = $_POST['password']; $confermaPass = $_POST['confermaPassword'];
				
				$data = [
					//'ruolo' => "Datore",
					'Nome' => $nome,
					'Cognome' => $cognome,
					'CodiceFiscale' => $cf,
					'NomeAzienda' => $nomeAzienda,
					'PartitaIva' => $partitaIVA,
					'CodiceFiscaleAzienda' => $cfAzienda,
					'Email' => $email,
					'Password' => $password,
				];
				
				$model = new DatoreModel();
				
				if ($model->getUtente($email, $password) == 1) {
					
					if (strlen($password)>= 8 && strlen($password)<= 15 && preg_match("#[0-9]+#",$password)) {
						
							if (strcmp($password, $confermaPass) == 0) {
								
								$model->save($data);
								
								$session = session();
								
								$_SESSION['ruolo'] = "Datore";
								$_SESSION['nome'] = $nome;
								$_SESSION['cognome'] = $cognome;
								$_SESSION['codicefiscale'] = $cf;
								$_SESSION['nomeazienda'] = $nomeAzienda;
								$_SESSION['partitaIVA'] = $partitaIVA;
								$_SESSION['cfAzienda'] = $cfAzienda;
								$_SESSION['email'] = $email;
								$_SESSION['tipologiaTampone'] = "";
								$_SESSION['numeroPrenotazioni'] = 0;
								$_SESSION['prenotazioni'] = array();
								
								
								return redirect()->to('/Dashboard/vdDashboard/Datore');
							}
							else {
								echo view('errors/reg_datore_passNonCoincidono', $data);
							}
					}
					else {
						echo view('errors/reg_datore_passNonValida', $data);
					}
				}
				else {
					echo view('errors/reg_datore_accountEsistente', $data);
				}
				
				break;
			
			case "Medico":
				$nome = $_POST['nome']; $cognome = $_POST['cognome']; $cf = $_POST['codiceFiscale']; 
				$partitaIVA = $_POST['partitaIva']; $codiceRegionale = $_POST['codiceRegionale'];  $asl = $_POST['AziendaSanitariaLocale']; 
				$email = $_POST['email']; $password = $_POST['password']; $confermaPass = $_POST['confermaPassword'];
				
				$data = [
					//'ruolo' => "Medico",
					'Nome' => $nome,
					'Cognome' => $cognome,
					'CodiceFiscale' => $cf,
					'PartitaIva' => $partitaIVA,
					'CodiceRegionale' => $codiceRegionale,
					'AziendaSanitariaLocale' => $asl,
					'Email' => $email,
					'Password' => $password,
				];
				
				$model = new MedicoModel();
				
				if ($model->getUtente($email, $password) == 1) {
					
					if (strlen($password)>= 8 && strlen($password)<= 15 && preg_match("#[0-9]+#",$password)) {
						
							if (strcmp($password, $confermaPass) == 0) {
								
								$model->save($data);
								
								$session = session();
								
								$_SESSION['ruolo'] = "Medico";
								$_SESSION['nome'] = $nome;
								$_SESSION['cognome'] = $cognome;
								$_SESSION['codicefiscale'] = $cf;
								$_SESSION['partitaIVA'] = $partitaIVA;
								$_SESSION['codregionale'] = $codiceRegionale;
								$_SESSION['asl'] = $asl;
								$_SESSION['email'] = $email;
								$_SESSION['tipologiaTampone'] = "";
								$_SESSION['numeroPrenotazioni'] = 0;
								$_SESSION['prenotazioni'] = array();
								
								
								return redirect()->to('/Dashboard/vdDashboard/Medico');
							}
							else {
								echo view('errors/reg_medico_passNonCoincidono', $data);
							}
					}
					else {
						echo view('errors/reg_medico_passNonValida', $data);
					}
				}
				else {
					echo view('errors/reg_medico_accountEsistente', $data);
				}
				
				break;
			
			case "Laboratorio":
				$nomet = $_POST['nometitolare']; $cognomet = $_POST['cognometitolare']; $cftitolare = $_POST['codfistitolare'];
				$nome = $_POST['nome']; $pi = $_POST['partitaIva']; $codicefiscale = $_POST['codicefiscale'];
				$email = $_POST['email']; $password = $_POST['password']; $cpassword = $_POST['confermaPassword'];
				
				$data=[
					'NomeTitolare'=>$nomet,
					'CognomeTitolare'=>$cognomet,
					'CodFisTitolare'=>$cftitolare,
					'Nome'=>$nome,
					'PartitaIva'=>$pi,
					'CodiceFiscale'=>$codicefiscale,
					'Email'=>$email,
					'Password'=>$password
				];
				
				$model = new LaboratorioModel();
				
				$userValido = NULL;
				$userValido = $model->getUtente($email, $password);
				
				if ($userValido == 1) {
				  
				  if(strlen($password)>=8 && strlen($password)<= 15 && preg_match("#[0-9]+#",$password)){
					
					if(strcmp($password, $cpassword)==0){
					  
						$model->save($data);
						
						$session = session();
						
						$_SESSION['ruolo'] = "Laboratorio";
						$_SESSION['nome'] = $nomet;
						$_SESSION['cognome'] = $cognomet;
						$_SESSION['codicefiscale'] = $cftitolare;
						$_SESSION['nomelab'] = $nome;
						$_SESSION['partitaIVA'] = $pi;
						$_SESSION['cflab'] = $codicefiscale;
						$_SESSION['email'] = $email;
						
						return redirect()->to('/Dashboard/vdDashboard/Laboratorio');
					}
					else{
					  echo view('errors/passwordNonCorrispLab', $data);
					}
				  }  
				  else{
					echo view('errors/passwordNonValidaLab', $data);
				  }
				}  
				else{
				  echo view('errors/emailEsistenteLab', $data);
				}
				
				break;
				
			  case "AziendaSanitaria":
				$nomea = $_POST['nomeazienda']; $partitaIVA = $_POST['partitaiva']; $codfis = $_POST['codicefiscale'];
				$email = $_POST['email']; $password = $_POST['password']; $cpassword = $_POST['confermaPassword'];
				
				$data=[
					'Nome'=>$nomea,
					'PartitaIva'=>$partitaIVA,
					'CodiceFiscale'=>$codfis,
					'Email'=>$email,
					'Password'=>$password
				];
				
				$model = new AziendaSanitariaModel();
				
				$userValido = NULL;
				$userValido = $model->getUtente($email, $password);
				
				if ($userValido == 1) {
				  
				  if(strlen($password)>=8 && strlen($password)<= 15 && preg_match("#[0-9]+#",$password)){
					
					if(strcmp($password, $cpassword)==0){
					  
						$model->save($data);
						
						$session = session();
						
						$_SESSION['ruolo'] = "AziendaSanitaria";
						$_SESSION['nome'] = $nomea;
						$_SESSION['partitaIVA'] = $partitaIVA;
						$_SESSION['codicefiscale'] = $codfis;
						$_SESSION['email'] = $email;
						
						return redirect()->to('/Dashboard/vdDashboard/AziendaSanitaria');
					}
					else{
					  echo view('errors/passwordNonCorrispAz', $data);
					}
				  }
				  else{
					echo view('errors/passwordNonValidaAz', $data);
				  }
				}  
				else{
				  echo view('errors/emailEsistenteAz', $data);
				}
				
				break;
		}
	}
}