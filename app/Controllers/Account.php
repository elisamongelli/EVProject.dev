<?php

namespace App\Controllers;

use App\Models\CittadinoModel;
use App\Models\DatoreModel;
use App\Models\MedicoModel;
use App\Models\LaboratorioModel;
use App\Models\AziendaSanitariaModel;

class Account extends BaseController
{
	public function index()
	{
		return view('#');
	}
	
	public function infoAccount($ruolo)
	{
		
		switch ($ruolo) {
			case "Cittadino":
				echo view('account/il_mio_account_cittadino');
				break;
			case "Datore":
				echo view('account/il_mio_account_datore');
				break;
			case "Medico":
				echo view('account/il_mio_account_medico');
				break;
			case "Laboratorio":
				echo view('account/il_mio_account_laboratorio');
				break;
			case "AziendaSanitaria":
				echo view('account/il_mio_account_aziendasanitaria');
				break;
		}
	}
	
	public function modificaInfo($ruolo)
	{
		
		switch ($ruolo) {
			case "Cittadino":
				$model = new MedicoModel();
				$data = [
					'medici' => $model->getAllMedici(),
				];
				echo view('account/modifica_cittadino', $data);
				break;
			case "Datore":
				echo view('account/modifica_datore');
				break;
			case "Medico":
				echo view('account/modifica_medico');
				break;
			case "Laboratorio":
				echo view('account/modifica_laboratorio');
				break;
			case "AziendaSanitaria":
				echo view('account/modifica_aziendaSanitaria');
				break;
		}
	}
	
	public function modificaAccount($ruolo)
	{
		
		switch ($ruolo) {
			
			case "Cittadino":
				$nome = $_POST['nome']; $cognome = $_POST['cognome']; $cf = $_POST['codiceFiscale']; $medico = $_POST['medicoCurante'];
				$email = session()->get('email'); $password = $_POST['password']; $nuovaPassword = $_POST['nuovaPassword']; $confermaPass = $_POST['confermaPassword'];
				
				if ($nuovaPassword == NULL) {
					$nuovaPassword = $password;
					$confermaPass = $password;
				}
				
				$data = [
					//'ruolo' => "Cittadino",
					'Nome' => $nome,
					'Cognome' => $cognome,
					'CodiceFiscale' => $cf,
					'MedicoCurante' => $medico,
					'Email' => $email,
					'Password' => $nuovaPassword,
				];
				
				$model = new MedicoModel();
				$medici = [
					'medici' => $model->getAllMedici(),
				];
				
				$model = NULL;
				$model = new CittadinoModel();
				
				if ($model->getUtente($email, $password) != 2) {
					
					if (strlen($nuovaPassword)>= 8 && strlen($nuovaPassword)<= 15 && preg_match("#[0-9]+#",$nuovaPassword)) {
						
							if (strcmp($nuovaPassword, $confermaPass) == 0) {
								
								$model->replace($data);
								
								$_SESSION['ruolo'] = "Cittadino";
								$_SESSION['nome'] = $nome;
								$_SESSION['cognome'] = $cognome;
								$_SESSION['codicefiscale'] = $cf;
								$_SESSION['medico'] = $medico;
								
								
								return redirect()->to('/Account/infoAccount/Cittadino');
							}
							else {
								echo view('errors/mod_cittadino_passNonCoincidono', $medici);
							}
					}
					else {
						echo view('errors/mod_cittadino_passNonValida', $medici);
					}
				}
				else {
					echo view('errors/mod_cittadino_passwordErrata', $medici);
				}
				
				break;
			
			case "Datore":
				$nome = $_POST['nome']; $cognome = $_POST['cognome']; $cf = $_POST['codiceFiscale']; 
				$nomeAzienda = $_POST['nomeAzienda']; $partitaIVA = $_POST['partitaIVA']; $cfAzienda = $_POST['codiceFiscaleAzienda']; 
				$email = session()->get('email'); $password = $_POST['password']; $nuovaPassword = $_POST['nuovaPassword']; $confermaPass = $_POST['confermaPassword'];
				
				if ($nuovaPassword == NULL) {
					$nuovaPassword = $password;
					$confermaPass = $password;
				}
				
				$data = [
					//'ruolo' => "Datore",
					'Nome' => $nome,
					'Cognome' => $cognome,
					'CodiceFiscale' => $cf,
					'NomeAzienda' => $nomeAzienda,
					'PartitaIva' => $partitaIVA,
					'CodiceFiscaleAzienda' => $cfAzienda,
					'Email' => $email,
					'Password' => $nuovaPassword,
				];
				
				$model = new DatoreModel();
				
				if ($model->getUtente($email, $password) != 2) {
					
					if (strlen($nuovaPassword)>= 8 && strlen($nuovaPassword)<= 15 && preg_match("#[0-9]+#",$nuovaPassword)) {
						
							if (strcmp($nuovaPassword, $confermaPass) == 0) {
								
								$model->replace($data);
								
								$_SESSION['ruolo'] = "Datore";
								$_SESSION['nome'] = $nome;
								$_SESSION['cognome'] = $cognome;
								$_SESSION['codicefiscale'] = $cf;
								$_SESSION['nomeazienda'] = $nomeAzienda;
								$_SESSION['partitaIVA'] = $partitaIVA;
								$_SESSION['cfAzienda'] = $cfAzienda;
								
								
								return redirect()->to('/Account/infoAccount/Datore');
							}
							else {
								echo view('errors/mod_datore_passNonCoincidono', $data);
							}
					}
					else {
						echo view('errors/mod_datore_passNonValida', $data);
					}
				}
				else {
					echo view('errors/mod_datore_passwordErrata', $data);
				}
				
				break;
			
			case "Medico":
				$nome = $_POST['nome']; $cognome = $_POST['cognome']; $cf = $_POST['codiceFiscale']; 
				$partitaIVA = $_POST['partitaIva']; $codiceRegionale = $_POST['codiceRegionale'];  $asl = $_POST['AziendaSanitariaLocale']; 
				$email = session()->get('email'); $password = $_POST['password']; $nuovaPassword = $_POST['nuovaPassword']; $confermaPass = $_POST['confermaPassword'];
				
				if ($nuovaPassword == NULL) {
					$nuovaPassword = $password;
					$confermaPass = $password;
				}
				
				$data = [
					//'ruolo' => "Medico",
					'Nome' => $nome,
					'Cognome' => $cognome,
					'CodiceFiscale' => $cf,
					'PartitaIva' => $partitaIVA,
					'CodiceRegionale' => $codiceRegionale,
					'AziendaSanitariaLocale' => $asl,
					'Email' => $email,
					'Password' => $nuovaPassword,
				];
				
				$model = new MedicoModel();
				
				if ($model->getUtente($email, $password) != 2) {
					
					if (strlen($nuovaPassword)>= 8 && strlen($nuovaPassword)<= 15 && preg_match("#[0-9]+#",$nuovaPassword)) {
						
							if (strcmp($nuovaPassword, $confermaPass) == 0) {
								
								$model->replace($data);
								
								$_SESSION['ruolo'] = "Medico";
								$_SESSION['nome'] = $nome;
								$_SESSION['cognome'] = $cognome;
								$_SESSION['codicefiscale'] = $cf;
								$_SESSION['partitaIVA'] = $partitaIVA;
								$_SESSION['codregionale'] = $codiceRegionale;
								$_SESSION['asl'] = $asl;
								
								
								return redirect()->to('/Account/infoAccount/Medico');
							}
							else {
								echo view('errors/mod_medico_passNonCoincidono', $data);
							}
					}
					else {
						echo view('errors/mod_medico_passNonValida', $data);
					}
				}
				else {
					echo view('errors/mod_medico_passwordErrata', $data);
				}
				
				break;
			
			case "Laboratorio":
				$nomet = $_POST['nometitolare']; $cognomet = $_POST['cognometitolare']; $cftitolare = $_POST['codfistitolare'];
				$nome = $_POST['nome']; $pi = $_POST['partitaIva']; $codicefiscale = $_POST['codicefiscale'];
				$email = session()->get('email'); $password = $_POST['password']; $nuovaPassword = $_POST['nuovaPassword']; $confermaPass = $_POST['confermaPassword'];
				
				if ($nuovaPassword == NULL) {
					$nuovaPassword = $password;
					$confermaPass = $password;
				}
				
				$data = [
					//'ruolo' => "Laboratorio",
					'NomeTitolare'=>$nomet,
					'CognomeTitolare'=>$cognomet,
					'CodFisTitolare'=>$cftitolare,
					'Nome'=>$nome,
					'PartitaIva'=>$pi,
					'CodiceFiscale'=>$codicefiscale,
					'Email'=>$email,
					'Password'=>$nuovaPassword
				];
				
				$model = new LaboratorioModel();
				
				if ($model->getUtente($email, $password) != 2) {
					
					if (strlen($nuovaPassword)>= 8 && strlen($nuovaPassword)<= 15 && preg_match("#[0-9]+#",$nuovaPassword)) {
						
							if (strcmp($nuovaPassword, $confermaPass) == 0) {
								
								$model->replace($data);
								
								$session = session();
								
								$_SESSION['ruolo'] = "Laboratorio";
								$_SESSION['nome'] = $nomet;
								$_SESSION['cognome'] = $cognomet;
								$_SESSION['codicefiscale'] = $cftitolare;
								$_SESSION['nomelab'] = $nome;
								$_SESSION['partitaIVA'] = $pi;
								$_SESSION['cflab'] = $codicefiscale;
								
								
								return redirect()->to('/Account/infoAccount/Laboratorio');
							}
							else {
								echo view('errors/mod_lab_passNonCoincidono', $data);
							}
					}
					else {
						echo view('errors/mod_lab_passNonValida', $data);
					}
				}
				else {
					echo view('errors/mod_lab_passwordErrata', $data);
				}
				
				break;
			
			case "AziendaSanitaria":
				$nomea = $_POST['nomeazienda']; $partitaIVA = $_POST['partitaiva']; $codfis = $_POST['codicefiscale'];
				$email = session()->get('email'); $password = $_POST['password']; $nuovaPassword = $_POST['nuovaPassword']; $confermaPass = $_POST['confermaPassword'];
				
				if ($nuovaPassword == NULL) {
					$nuovaPassword = $password;
					$confermaPass = $password;
				}
				
				$data = [
					//'ruolo' => "AziendaSanitaria",
					'Nome'=>$nomea,
					'PartitaIva'=>$partitaIVA,
					'CodiceFiscale'=>$codfis,
					'Email'=>$email,
					'Password'=>$nuovaPassword
				];
				
				$model = new AziendaSanitariaModel();
				
				if ($model->getUtente($email, $password) != 2) {
					
					if (strlen($nuovaPassword)>= 8 && strlen($nuovaPassword)<= 15 && preg_match("#[0-9]+#",$nuovaPassword)) {
						
							if (strcmp($nuovaPassword, $confermaPass) == 0) {
								
								$model->replace($data);
								
								$_SESSION['ruolo'] = "AziendaSanitaria";
								$_SESSION['nome'] = $nomea;
								$_SESSION['partitaIVA'] = $partitaIVA;
								$_SESSION['codicefiscale'] = $codfis;
								$_SESSION['email'] = $email;
								
								
								return redirect()->to('/Account/infoAccount/AziendaSanitaria');
							}
							else {
								echo view('errors/mod_as_passNonCoincidono', $data);
							}
					}
					else {
						echo view('errors/mod_as_passNonValida', $data);
					}
				}
				else {
					echo view('errors/mod_as_passwordErrata', $data);
				}
				
				break;
		}
	}



	public function eliminaAccount($ruolo) {

		$email = session()->get('email');

		switch($ruolo) {

			case "Cittadino":
				
				$model = new CittadinoModel();
				$model->eliminaCittadino($email);

				break;

			case "Datore":
				
				$model = new DatoreModel();
				$model->eliminaDatore($email);

				break;

			case "Medico":
				
				$model = new MedicoModel();
				$model->eliminaMedico($email);

				break;

			case "Laboratorio":
				
				$model = new LaboratorioModel();
				$model->eliminaLaboratorio($email);

				break;

			case "AziendaSanitaria":
				
				$model = new AziendaSanitariaModel();
				$model->eliminaAziendaSanitaria($email);

				break;
		}

		return redirect()->to('/Home/logout');
	}
}
