<?php

namespace App\Controllers;

use App\Models\PrenotazioneModel;
use App\Models\LaboratorioModel;
use App\Models\PrenotazioneOrarioModel;

use CodeIgniter\Controller;

class Prenotazione extends Controller
{
    public function index()
    {
		$ruolo = session()->get('ruolo');

        if ($ruolo == 'Medico' or $ruolo == 'Datore') {
            return view('prenotazione/prenotazione_numero');
        }
        else {
            return view('prenotazione/prenotazione_dati_cittadino');
        }
    }	
	
    public function inserisciDati()
    {
		$numeroPrenotazioni = $_POST['numeroPrenotazioni'];
		session()->set('numeroPrenotazioni', $numeroPrenotazioni);
		
		$data = [
			'numeroPrenotazioni' => $numeroPrenotazioni,
		];
		
		return view('prenotazione/prenotazione_dati', $data);
    }
	
	public function salvaDati()
    {
		$numeroPrenotazioni = $_POST['numeroPrenotazioni'];

		if(session()->get('ruolo') == 'Cittadino') {
			session()->set('numeroPrenotazioni', 1);
		}
		
		$nome = $_POST['nome']; $cognome = $_POST['cognome']; $cf = $_POST['codiceFiscale'];
		$dataNascita = $_POST['dataNascita']; $luogoNascita = $_POST['luogoNascita']; $citta = $_POST['citta'];
		$telefono = $_POST['telefono']; $email = $_POST['email'];
		
		
		$data = [
			'numeroPrenotazioni' => $numeroPrenotazioni,
		];
		
		$datiPersonali = [
			'Nome' => $nome,
			'Cognome' => $cognome,
			'CodiceFiscale' => $cf,
			'DataNascita' => $dataNascita,
			'LuogoNascita' => $luogoNascita,
			'Citta' => $citta,
			'NumTelefono' => $telefono,
			'Email' => $email,
		];
		
		$model = new PrenotazioneModel();		
		$model->save($datiPersonali);
		
		if ($numeroPrenotazioni == 0) {
			return view('prenotazione/prenotazione_tipologia');
		}
		
		return view('prenotazione/prenotazione_dati', $data);
    }
	
	public function cercaLaboratorio()
    {
		$tipologia = $_POST['tipologia'];
		session()->set('tipologiaTampone', $tipologia);
		
		$model = new LaboratorioModel();
		
		$data = [
			'laboratori' => $model->getAllLaboratori(),
		];

		return view('prenotazione/prenotazione_labVicini', $data);
    }
	
	public function salvaLab($laboratorio)
    {
		$tipologia = session()->get('tipologiaTampone');
		
		$model = new PrenotazioneModel();

		$prenotazioni = $model->getPrenotazioniCorrenti();

		for ($i = 0; $i < count($prenotazioni); $i++) {
			$data = [
				'Nome' => $prenotazioni[$i]['Nome'],
				'Cognome' => $prenotazioni[$i]['Cognome'],
				'CodiceFiscale' => $prenotazioni[$i]['CodiceFiscale'],
				'DataNascita' => $prenotazioni[$i]['DataNascita'],
				'LuogoNascita' => $prenotazioni[$i]['LuogoNascita'],
				'Citta' => $prenotazioni[$i]['Citta'],
				'TipologiaTampone' => $tipologia,
				'NumTelefono' => $prenotazioni[$i]['NumTelefono'],
				'Email' => $prenotazioni[$i]['Email'],
				'LaboratorioAnalisi' => $laboratorio,
			];

			$prenotazioni[$i]['LaboratorioAnalisi'] = $laboratorio;
			$prenotazioni[$i]['TipologiaTampone'] = $tipologia;

			$model->replace($data);

		}

		session()->set('prenotazioni', $prenotazioni);

		return redirect()->to('/CalendarioPrenot');
    }

	public function mostraResoconto() {

		$prenotazioni = array_merge(session()->get('prenotazioni'));
		
		for($i = 0; $i < count($prenotazioni); $i++) {
			$cf[$i] = $prenotazioni[$i]['CodiceFiscale'];
		}
		
		$model = new PrenotazioneOrarioModel();
		
		$data = [
			'prenotazioniCorrenti' => $model->getPrenotazioniCorrenti($cf),
		];

		return view('prenotazione/prenotazione_resoconto', $data);
	}
}