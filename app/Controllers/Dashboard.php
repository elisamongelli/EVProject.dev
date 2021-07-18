<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		return view('#');
	}
	
	public function vdDashboard($ruolo)
	{
		
		switch ($ruolo) {
			case "Cittadino":
				echo view('dashboard/dashboard_cittadino');
				break;
			case "Datore":
				echo view('dashboard/dashboard_datore');
				break;
			case "Medico":
				echo view('dashboard/dashboard_medico');
				break;
			case "Laboratorio":
				echo view('dashboard/dash_laboratorio');
				break;
			case "AziendaSanitaria":
				echo view('dashboard/dash_aziendasan');
				break;
		}
	}
}
