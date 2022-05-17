<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    public function index() {
        $series = [
            'Grey\'s Anatomy',
            'Lost',
            'Agents of SHIELD'
        ];
        // print_r($series); exit;
        return view('especialidades', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }
}
