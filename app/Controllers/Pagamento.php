<?php

namespace App\Controllers;

use App\Models\PagamentoModel;

use CodeIgniter\Controller;

class Pagamento extends Controller
{
    public function index()
    {
		echo view('#');
    }	
	
	
	public function salvaDati()
    {
		
		$nome = $_POST['nome']; $cognome = $_POST['cognome']; $cf = $_POST['codiceFiscale']; $email = $_POST['email'];
		$citta = $_POST['citta']; $indirizzo = $_POST['indirizzo'];  $cap = $_POST['cap']; $nomecarta = $_POST['cardname'];
		$numcarta = $_POST['cardnumber']; $mese = $_POST['mese'];  $anno = $_POST['anno'];  $cvv = $_POST['cvv'];
		
		

		$datiPersonali = [
			'CodiceFiscale' => $cf,
			'Citta' => $citta,
			'Indirizzo' => $indirizzo,
			'CAP' => $cap,
			'NomeCarta' => $nomecarta,
			'NumeroCarta' => $numcarta,
			'Mese' => $mese,
			'Anno' => $anno,
			'CVV' => $cvv,
		];
		
		$model = new PagamentoModel();	
		
		$model->save($datiPersonali);

		$ruolo = session()->get('ruolo');

		if ($ruolo == 'Cittadino') {
			return redirect()->to('/Dashboard/vdDashboard/Cittadino');
		}
		else if ($ruolo == 'Datore') {
			return redirect()->to('/Dashboard/vdDashboard/Datore');
		}
    }
}