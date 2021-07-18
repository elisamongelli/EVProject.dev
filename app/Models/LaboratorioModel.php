<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratorioModel extends Model
{
	
	protected $table = 'LaboratoriAnalisi';
	
	protected $allowedFields=['NomeTitolare','CognomeTitolare','CodFisTitolare','Nome','PartitaIva','CodiceFiscale','PrezzoAntigenico','PrezzoMolecolare','Email','Password'];
	
	
	public function getAllLaboratori() {
		
		return $this->findAll();
	}

	
	public function getUtente($email, $password) {
		
		
		$laboratorio = $this->asArray()
					->where(['Email' => $email])
					->first();
		
		
		if (empty($laboratorio))
		{
			return 1;
		}
		if ($laboratorio['Password'] != $password) {
			return 2;
		}
		else {
			
			$session = session();
			
			$_SESSION['ruolo'] = "Laboratorio";
			$_SESSION['nome'] = $laboratorio['NomeTitolare'];
			$_SESSION['cognome'] = $laboratorio['CognomeTitolare'];
			$_SESSION['codicefiscale'] = $laboratorio['CodFisTitolare'];
			$_SESSION['nomelab'] = $laboratorio['Nome'];
			$_SESSION['partitaIVA'] = $laboratorio['PartitaIva'];
			$_SESSION['cflab'] = $laboratorio['CodiceFiscale'];
			$_SESSION['email'] = $laboratorio['Email'];
			
			return 3;
		}
	}
	
	
	public function getPrezzoLab($laboratorio, $tipologia) {

		$lab = $this->asArray()
			->where(['Nome' => $laboratorio])
			->first();
		
		if ($tipologia == 'Molecolare') {
			return $lab['PrezzoMolecolare'];
		}
		else if ($tipologia == 'Antigenico') {
			return $lab['PrezzoAntigenico'];
		}
	}

	public function eliminaLaboratorio($email) {

		$this->where('Email', $email);
		return $this->delete();
	}
}