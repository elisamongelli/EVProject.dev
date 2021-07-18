<?php

namespace App\Controllers;

use App\Models\QuestionarioModel;
use App\Models\LaboratorioModel;

use CodeIgniter\Controller;

class Questionario extends Controller
{
    public function index()
    {
		$model = new LaboratorioModel();
		
		$data = [
			'laboratori' => $model->getAllLaboratori(),
		];
		
		return view('questionario', $data);
    }
	
	public function salvaDati()
    {
		$codice = $_POST['codice']; $nome = $_POST['nome']; $cognome = $_POST['cognome']; $cf = $_POST['codiceFiscale']; 
		$email = $_POST['email']; $laboratorio = $_POST['laboratorioAnalisi'];
		
		$data = [
			'Codice' => $codice,
			'Nome' => $nome,
			'Cognome' => $cognome,
			'CodiceFiscale' => $cf,
			'Email' => $email,
			'LaboratorioAnalisi' => $laboratorio,
		];
		
		$model = new QuestionarioModel();
		
		$model->save($data);
		
		return redirect()->to('/Dashboard/vdDashboard/Cittadino');
    }
	
	public function visualizzaQuestionari()
    {
		$model = new QuestionarioModel();
		
		$data = [
			'questionari' => $model->getAllQuestionari(),
		];
		
		//print_r($data);
		
		return view('elenco_questionari', $data);
    }
	
	public function cercaQuestionario()
    {
		$codice = $_POST['codice'];
		
		$model = new QuestionarioModel();
		
		$questionario = $model->getQuestionario($codice);
		
		
		if ($questionario == 1) {
			
			$data = [
				'questionari' => $model->getAllQuestionari(),
			];
			
			return view('errors/questionario_nonTrovato', $data);
		}
		else {
			
			return view('questionario_trovato', $questionario);
		}
    }
}