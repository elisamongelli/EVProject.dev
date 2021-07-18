<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class PrenotazioneOrarioModel extends Model
{
	
	protected $table = 'Prenotazioni';
	
	protected $allowedFields = ['CodiceFiscale', 'Data'];
	
	
	public function getAllPrenotazioni() {
		
		return $this->findAll();
	}
	
	public function getPrenotazioniCorrenti($cf) {

        for($i = 0; $i < count($cf); $i++) {
            $prenotazioni[$i] = $this->asArray()
                            ->where(['CodiceFiscale' => $cf[$i]])
                            ->first();
        }

        return $prenotazioni;
	}
}