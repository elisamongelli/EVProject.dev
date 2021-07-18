<?php

namespace App\Controllers;

use App\Models\RefertoModel;
use App\Models\PrenotazioneModel;
use App\Models\PrenotazioneOrarioModel;
use App\Models\CittadiniPositiviModel;
use App\Models\RisultatoModel;

use CodeIgniter\Controller;

class Risultato extends Controller
{
    public function index()
    {
		$model = new RefertoModel();
        $allReferti = $model->getAllReferti();

        $model = new PrenotazioneModel();
        $allPrenotazioni = $model->getAllPrenotazioni();

        $model = new PrenotazioneOrarioModel();
        $allDate = $model->getAllPrenotazioni();

        $model = new CittadiniPositiviModel();
        $allPositivi = $model->getAllPositivi();

        $model = new RisultatoModel();
        $risultati = $model->getAllRisultati();

        $i = 0;
        foreach($allReferti as $referto) {

            $codiceFiscale = $referto['CodiceFiscale'];

            $flag = 0;
            foreach($risultati as $risultato) {

                if ($risultato['CodiceFiscale'] == $codiceFiscale) {
                    $flag = 1;
                    break;
                }
            }

            if ($flag == 1) {
                continue;
            }


            $ID = $referto['Codice'];

            $flag = 0;
            foreach($risultati as $risultato) {

                if ($risultato['ID'] == $ID) {
                    $flag = 1;
                    break;
                }
            }

            if ($flag == 1) {
                continue;
            }


            foreach($allPrenotazioni as $prenotazione) {

                if ($prenotazione['CodiceFiscale'] == $codiceFiscale) {

                    foreach($allDate as $dataPrenotazione) {

                        if ($dataPrenotazione['CodiceFiscale'] == $codiceFiscale) {

                            $dataPrenotazione['Data'] = explode(" ", $dataPrenotazione['Data']);
                            $newData = array_reverse(explode("-", $dataPrenotazione['Data'][0]));
                            $finalData = $newData[0]."/".$newData[1]."/".$newData[2];

                            $aziendaSanitaria = new RefertoModel();
                            $asl = $aziendaSanitaria->getAsl($codiceFiscale);

                            if ($referto['Esito'] == "Positivo") {
                                
                                $data[$i] = [
                                    'ID' => $referto['Codice'],
                                    'Esito' => $referto['Esito'],
                                    'TipologiaTampone' => $prenotazione['TipologiaTampone'],
                                    'Data' => $finalData,
                                    'NomeLaboratorio' => $prenotazione['LaboratorioAnalisi'],
                                    'EmailLaboratorio' => $referto['EmailLaboratorio'],
                                    'CittaResidenza' => $prenotazione['Citta'],
                                    'AziendaSanitaria' => $asl,
                                    'Nome' => $referto['Nome'],
                                    'Cognome' => $referto['Cognome'],
                                    'CodiceFiscale' => $referto['CodiceFiscale'],
                                    'Email' => $prenotazione['Email'],
                                ];

                                $i++;
                                break;
                            }
                            else {                                
                                $data[$i] = [
                                    'ID' => $referto['Codice'],
                                    'Esito' => $referto['Esito'],
                                    'TipologiaTampone' => $prenotazione['TipologiaTampone'],
                                    'Data' => $finalData,
                                    'NomeLaboratorio' => $prenotazione['LaboratorioAnalisi'],
                                    'EmailLaboratorio' => $referto['EmailLaboratorio'],
                                    'CittaResidenza' => $prenotazione['Citta'],
                                    'AziendaSanitaria' => $asl,
                                    'Nome' => '-',
                                    'Cognome' => '-',
                                    'CodiceFiscale' => '-',
                                    'Email' => '-',
                                ];

                                $i++;
                                break;
                            }
                        }
                    }

                    break;
                }
            }
        }

        
        foreach($allPositivi as $positivo) {
            
            $codiceFiscale = $positivo['CodiceFiscale'];

            $flag = 0;
            foreach($risultati as $risultato) {

                if ($risultato['CodiceFiscale'] == $codiceFiscale) {
                    $flag = 1;
                    break;
                }
            }

            if ($flag == 1) {
                continue;
            }

            $data[$i] = [
                'ID' => $positivo['CodiceFiscale'],
                'Esito' => "Positivo",
                'TipologiaTampone' => "ND",
                'Data' => $positivo['Data'],
                'NomeLaboratorio' => "ND",
                'EmailLaboratorio' => "ND",
                'CittaResidenza' => $positivo['CittaResidenza'],
                'AziendaSanitaria' => $positivo['AziendaSanitaria'],
                'Nome' => $positivo['Nome'],
                'Cognome' => $positivo['Cognome'],
                'CodiceFiscale' => $positivo['CodiceFiscale'],
                'Email' => "ND",
            ];

            $i++;
            break;
        }
        
        for($j = 0; $j < $i; $j++) {
            $model->save($data[$j]);
        }
        
        $risultati = $model->getRisultatiASL();
        
        if ($risultati == 0) {
            echo "NESSUN RISULTATO DISPONIBILE";
            //return view('elenco_risultati');
        }
        else {
            //print_r($risultati);
            return view('elenco_risultati');
        }
    }
}