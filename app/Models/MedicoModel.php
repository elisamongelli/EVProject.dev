<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicoModel extends Model
{
	
	protected $table = 'Medici';

	protected $allowedFields = ['Nome', 'Cognome', 'CodiceFiscale', 'PartitaIva', 'CodiceRegionale', 'AziendaSanitariaLocale', 'Email', 'Password'];
	
	
	public function getAllMedici() {
		
		return $this->findAll();
	}
	
	public function getUtente($email, $password) {
		
		
		$medico = $this->asArray()
					->where(['Email' => $email])
					->first();
		
		
		if (empty($medico))
		{
			return 1;
		}
		if ($medico['Password'] != $password) {
			return 2;
		}
		else {
			$session = session();
			
			$_SESSION['ruolo'] = "Medico";
			$_SESSION['nome'] = $medico['Nome'];
			$_SESSION['cognome'] = $medico['Cognome'];
			$_SESSION['codicefiscale'] = $medico['CodiceFiscale'];
			$_SESSION['partitaIVA'] = $medico['PartitaIva'];
			$_SESSION['codregionale'] = $medico['CodiceRegionale'];
			$_SESSION['asl'] = $medico['AziendaSanitariaLocale'];
			$_SESSION['email'] = $medico['Email'];
			$_SESSION['tipologiaTampone'] = "";
			$_SESSION['numeroPrenotazioni'] = 0;
			$_SESSION['prenotazioni'] = array();
			
			return 3;
		}
	}

	public function eliminaMedico($email) {

		$this->where('Email', $email);
		return $this->delete();
	}
}