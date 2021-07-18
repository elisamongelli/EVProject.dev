<?php

namespace App\Models;

use CodeIgniter\Model;

class CittadinoModel extends Model
{
	
	protected $table = 'Cittadini';
	
	protected $allowedFields = ['Nome', 'Cognome', 'CodiceFiscale', 'MedicoCurante', 'Email', 'Password'];
	

	
	public function getUtente($email, $password) {
		
		
		$cittadino = $this->asArray()
					->where(['Email' => $email])
					->first();
		
		if (empty($cittadino))
		{
			return 1;
		}
		if ($cittadino['Password'] != $password) {
			return 2;
		}
		else {
			$session = session();
			
			$_SESSION['ruolo'] = "Cittadino";
			$_SESSION['nome'] = $cittadino['Nome'];
			$_SESSION['cognome'] = $cittadino['Cognome'];
			$_SESSION['codicefiscale'] = $cittadino['CodiceFiscale'];
			$_SESSION['medico'] = $cittadino['MedicoCurante'];
			$_SESSION['email'] = $cittadino['Email'];
			$_SESSION['tipologiaTampone'] = "";
			$_SESSION['numeroPrenotazioni'] = 0;
			$_SESSION['prenotazioni'] = array();
			
			return 3;
		}
	}

	public function getMedico($codicefiscale) {

		$cittadino = $this->asArray()
					->where(['CodiceFiscale' => $codicefiscale])
					->first();
		
		if (empty($cittadino)) {
			return 1;
		}
		else {
			return $cittadino['MedicoCurante'];
		}
	}

	public function eliminaCittadino($email) {

		$this->where('Email', $email);
		return $this->delete();
	}
}