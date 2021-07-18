<?php

namespace App\Controllers;

class CalendarioPaziente extends BaseController
{
	public function index()
	{
		return view('funzionalita/calendario_paziente');
	}
}