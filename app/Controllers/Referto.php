<?php

namespace App\Controllers;

use App\Models\RefertoModel;
use App\Models\CittadinoModel;

use CodeIgniter\Controller;

class Referto extends Controller
{
    public function index()
    {
		return view('#');
    }
	
	
	public function visualizzaRefertiCittadino()
    {
		$model = new RefertoModel();
		
		$data = [
			'referti' => $model->getReferti('Cittadino'),
		];
		
		return view('elenco_referti', $data);
    }
	
	
	public function visualizzaRefertiDatore()
    {
		$model = new RefertoModel();
		
		$data = [
			'referti' => $model->getReferti('Datore'),
		];
		
		return view('elenco_referti', $data);
    }
	
	
	public function visualizzaRefertiMedico()
    {
		$model = new RefertoModel();
		
		$data = [
			'referti' => $model->getReferti('Medico'),
		];
		
		return view('elenco_referti', $data);
    }
	
	
	public function cercaReferto($ruolo)
    {
		$codice = $_POST['codice'];
		
		$model = new RefertoModel();		
		$referto = $model->getReferto($codice, $ruolo);
		
		
		if ($referto == 1) {
			
			$data = [
				'referti' => $model->getReferti($ruolo),
			];
			
			return view('errors/referto_nonTrovato', $data);
		}
		else {
			
			return view('referto_trovato', $referto);
		}
    }

	public function inviaReferto() {

		return view('invia_referto');
	}

	public function salvaReferto() {

		$file = $_FILES['referto']['name']; $codice = $_POST['codice'];
		$nome = $_POST['nome']; $cognome = $_POST['cognome']; $codiceFiscale = $_POST['codiceFiscale'];
		$esito = $_POST['esito']; $azienda = $_POST['azienda']; $email = $_POST['email'];

		$data = [
			'codice' => $codice,
			'nome' => $nome,
			'cognome' => $cognome,
			'codicefiscale' => $codiceFiscale,
			'esito' => $esito,
			'azienda' => $azienda,
			'email' => $email,
		];

		if (($file != "")){
				$target_dir = "docs/referti/";
				$path = pathinfo($file);
				$filename = $path['filename'];

				if($filename != $codice) {
					return view('errors/referto_rinominare', $data);
					//echo("<br />codice ".$codice." diverso dal nome del file ".$filename." con esito ".$esito);
				}

				$ext = $path['extension'];
				$temp_name = $_FILES['referto']['tmp_name'];
				$path_filename_ext = $target_dir.$filename.".".$ext;
			
			if (file_exists($path_filename_ext)) {
				return view('errors/referto_esistente', $data);
			 	//echo("<br />file ".$filename." esistente con il codice ".$codice." con esito ".$esito);
			}else{
				move_uploaded_file($temp_name,$path_filename_ext);

				$model = new CittadinoModel();
				$medico = $model->getMedico($codiceFiscale);

				if ($medico == 1) {
					$medico = '-';
				}

				$data = NULL;
				$data = [
					'Codice' => $codice,
					'Nome' => $nome,
					'Cognome' => $cognome,
					'CodiceFiscale' => $codiceFiscale,
					'Esito' => $esito,
					'MedicoCurante' => $medico,
					'Azienda' => $azienda,
					'EmailLaboratorio' => $email,
				];

				$model = new RefertoModel();
				$model->save($data);
			}
		}

		return redirect()->to('/Dashboard/vdDashboard/Laboratorio');
	}
}