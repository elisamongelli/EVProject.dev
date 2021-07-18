<?php

namespace App\Models;

use CodeIgniter\Model;

class DatoreModel extends Model
{
	
	protected $table = 'DatoriLavoro';
	
	protected $allowedFields = ['Nome', 'Cognome', 'CodiceFiscale', 'NomeAzienda', 'PartitaIva', 'CodiceFiscaleAzienda', 'Email', 'Password'];
	
	
	public function getUtente($email, $password) {
		
		
		$datore = $this->asArray()
					->where(['Email' => $email])
					->first();
		
		
		if (empty($datore))
		{
			return 1;
		}
		if ($datore['Password'] != $password) {
			return 2;
		}
		else {
			$session = session();
			
			$_SESSION['ruolo'] = "Datore";
			$_SESSION['nome'] = $datore['Nome'];
			$_SESSION['cognome'] = $datore['Cognome'];
			$_SESSION['codicefiscale'] = $datore['CodiceFiscale'];
			$_SESSION['nomeazienda'] = $datore['NomeAzienda'];
			$_SESSION['partitaIVA'] = $datore['PartitaIva'];
			$_SESSION['cfAzienda'] = $datore['CodiceFiscaleAzienda'];
			$_SESSION['email'] = $datore['Email'];
			$_SESSION['tipologiaTampone'] = "";
			$_SESSION['numeroPrenotazioni'] = 0;
			$_SESSION['prenotazioni'] = array();
			
			return 3;
		}
	}

	public function eliminaDatore($email) {

		$this->where('Email', $email);
		return $this->delete();
	}
}