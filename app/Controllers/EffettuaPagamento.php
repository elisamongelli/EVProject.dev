<?php

namespace App\Controllers;

use App\Models\LaboratorioModel;

class EffettuaPagamento extends BaseController
{
	public function index()
	{
		$ruolo = session()->get('ruolo');

		if ($ruolo == 'Medico') {
			return redirect()->to('/Dashboard/vdDashboard/Medico');
		}
		else {

			$prenotazioni = array_merge(session()->get('prenotazioni'));

			$model = new LaboratorioModel();

			$prezzo = 0;
			for($i = 0; $i < count($prenotazioni); $i++) {			
				$prezzo += $model->getPrezzoLab($prenotazioni[$i]['LaboratorioAnalisi'], $prenotazioni[$i]['TipologiaTampone']);
			}

			$data = [
				'prezzo' => $prezzo,
			];

			return view('funzionalita/effettuapagamento', $data);
		}
	}
}