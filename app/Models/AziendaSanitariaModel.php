<?php

namespace App\Models;

use CodeIgniter\Model;

class AziendaSanitariaModel extends Model
{
	
	protected $table = 'AziendeSanitarie';
	
	protected $allowedFields=['Nome','PartitaIva','CodiceFiscale','Email','Password'];
	
	
	public function getAllAziendeSanitarie() {
		
		return $this->findAll();
	}
	
	
	public function getUtente($email, $password) {
		
		
		$aziende = $this->asArray()
					->where(['Email' => $email])
					->first();
		
		
		if (empty($aziende))
		{
			return 1;
		}
		if ($aziende['Password'] != $password) {
			return 2;
		}
		else {
			$session = session();
			
			$_SESSION['ruolo'] = "AziendaSanitaria";
			$_SESSION['nome'] = $aziende['Nome'];
			$_SESSION['partitaIVA'] = $aziende['PartitaIva'];
			$_SESSION['codicefiscale'] = $aziende['CodiceFiscale'];
			$_SESSION['email'] = $aziende['Email'];
			
			return 3;
		}
	}

	public function eliminaAziendaSanitaria($email) {

		$this->where('Email', $email);
		return $this->delete();
	}
}