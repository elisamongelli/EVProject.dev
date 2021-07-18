<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionarioModel extends Model
{
	
	protected $table = 'Questionari';
	
	protected $allowedFields = ['Codice', 'Nome', 'Cognome', 'CodiceFiscale', 'Email', 'LaboratorioAnalisi'];
	
	
	public function getAllQuestionari() {
		
		return $this->findAll();
	}
	
	public function getQuestionariLab() {
		
		$lab = session()->get('nomelab');
		
		$questionari = $this->asArray()
					->where(['LaboratorioAnalisi' => $lab])
					->findAll();
		
		return $questionari;
	}
	
	public function getQuestionario($codice) {
		
		
		$questionario = $this->asArray()
					->where(['Codice' => $codice])
					->first();
		
		$lab = session()->get('nomelab');
		
		if (empty($questionario) or $questionario['LaboratorioAnalisi'] != $lab)
		{
			return 1;
		}
		return $questionario;
	}
}