<?php

namespace App\Controllers;


use App\Models\CittadiniPositiviModel;


use CodeIgniter\Controller;


class PositiviDb extends Controller
{
    public function index()
    {
        return view('#');
    }
	
	
	public function cittadiniPositivi()
	{
		
				$nome = $_POST['nome']; 
				$cognome = $_POST['cognome']; 
				$cf = $_POST['codiceFiscale']; 
				$citta = $_POST['cittaResidenza']; 
				
				
				$data = [
					'Nome' => $nome,
					'Cognome' => $cognome,
					'CodiceFiscale' => $cf,
					'CittaResidenza' => $citta,
					'AziendaSanitaria' => session()->get('asl'),
					'Data' => date("d/m/Y"),
				];
				
				$model = new CittadiniPositiviModel();
				
				if ($model->getUtente($cf) == 1) {
					
					$model->save($data);
					return redirect()->to('/Dashboard/vdDashboard/Medico');  //dove va?

				}
				else {
					echo view('errors/positivo_esistenteneldb', $data);  //positivo già nel db
				}
	}
	
}
