<?php

namespace App\Models;

use CodeIgniter\Model;

class PagamentoModel extends Model
{
	
	protected $table = 'Pagamenti';
	
	protected $allowedFields = ['CodiceFiscale', 'Citta', 'Indirizzo', 'CAP', 'NomeCarta', 'NumeroCarta', 'Mese', 'Anno', 'CVV'];
	
	
		public function getUtente($numcarta) {
		
		
			$pagamento = $this->asArray()
					->where(['NumeroCarta' => $numcarta])
					->first();
			
		}
	
}