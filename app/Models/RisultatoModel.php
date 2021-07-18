<?php

namespace App\Models;

use CodeIgniter\Model;

class RisultatoModel extends Model
{
	
	protected $table = 'Risultati';
	
	protected $allowedFields = ['ID', 'Esito', 'TipologiaTampone', 'Data', 'NomeLaboratorio', 'EmailLaboratorio', 'CittaResidenza', 'AziendaSanitaria', 'Nome', 'Cognome', 'CodiceFiscale', 'Email'];
	
	
	public function getAllRisultati() {
		
		return $this->findAll();
	}


	public function getRisultatiASL() {

		$risultati = $this->findAll();
		$currASL = session()->get('nome');

		$i = 0;
		foreach($risultati as $risultato) {
			
			if ($risultato['AziendaSanitaria'] == $currASL) {
				$risultatiASL[$i] = $risultato;
				$i++;
			}
		}

		if ($i == 0) {
			return 0;
		}
		return $risultatiASL;
	}
}