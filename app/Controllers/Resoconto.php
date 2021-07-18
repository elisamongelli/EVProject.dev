<?php

namespace App\Controllers;

class Resoconto extends BaseController
{
	public function index()
	{
		$asl = session()->get('nome');

		$data = [
			'asl' => $asl,
		];

		return view('funzionalita/visualizzaresoconto', $data);
	}
}