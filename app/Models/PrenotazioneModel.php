<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class PrenotazioneModel extends Model
{
	
	protected $table = 'PrenotazioniDati';
	
	protected $allowedFields = ['Nome', 'Cognome', 'CodiceFiscale', 'DataNascita', 'LuogoNascita', 'Citta', 'TipologiaTampone', 'NumTelefono', 'Email', 'LaboratorioAnalisi'];
	
	
	public function getAllPrenotazioni() {
		
		return $this->findAll();
	}
	
	public function getPrenotazioniCorrenti() {
		
		return $prenotazioni = $this->asArray()
					->where(['LaboratorioAnalisi' => ""])
					->findAll();
	}
}