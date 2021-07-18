<?php

namespace App\Models;

use CodeIgniter\Model;

class RefertoModel extends Model
{
	
	protected $table = 'Referti';
	
	protected $allowedFields = ['Codice', 'Nome', 'Cognome', 'CodiceFiscale', 'Esito', 'MedicoCurante', 'Azienda', 'EmailLaboratorio'];
	
	
	public function getAllReferti() {
		
		return $this->findAll();
	}
	
	public function getReferti($ruolo) {
		
		if ($ruolo == 'Medico') {
			$nomeMedico = session()->get('nome');
			$cognomeMedico = session()->get('cognome');
			$aslMedico = session()->get('asl');
			$medico = $nomeMedico." ".$cognomeMedico." - ".$aslMedico;
		
			$referti = $this->asArray()
						->where(['MedicoCurante' => $medico])
						->findAll();
		}
		else if ($ruolo == 'Cittadino') {
			$cittadino = session()->get('codicefiscale');
		
			$referti = $this->asArray()
						->where(['CodiceFiscale' => $cittadino])
						->findAll();
		}
		else if ($ruolo == 'Datore') {
			$azienda = session()->get('nomeazienda');
		
			$referti = $this->asArray()
						->where(['Azienda' => $azienda])
						->findAll();
		}
		
		return $referti;
	}
	
	
	public function getReferto($codice, $ruolo) {
		
		$referto = $this->asArray()
					->where(['Codice' => $codice])
					->first();


		if (empty($referto))
		{
			return 1;
		}

		
		if ($ruolo == 'Medico') {
			$nomeMedico = session()->get('nome');
			$cognomeMedico = session()->get('cognome');
			$aslMedico = session()->get('asl');
			$medico = $nomeMedico." ".$cognomeMedico." - ".$aslMedico;
			
			if ($medico != $referto['MedicoCurante']) {
				$trovato = 0;
			}
			else $trovato = 1;
		}
		else if ($ruolo == 'Cittadino') {
			$cittadino = session()->get('codicefiscale');
			
			if ($cittadino != $referto['CodiceFiscale']) {
				$trovato = 0;
			}
			else $trovato = 1;
		}
		else if ($ruolo == 'Datore') {
			$azienda = session()->get('nomeazienda');
			
			if ($azienda != $referto['Azienda']) {
				$trovato = 0;
			}
			else $trovato = 1;
		}
		
		
		if ($trovato == 0)
		{
			return 1;
		}
		return $referto;
	}


	public function getAsl($cf) {

		$referto = $this->asArray()
					->where(['CodiceFiscale' => $cf])
					->first();
		
		$medico = explode(" ", $referto['MedicoCurante'], 4);
		
		if (count($medico) > 2) {
			$asl = $medico[3];
		}
		else $asl = "-";

		return $asl;
	}
}