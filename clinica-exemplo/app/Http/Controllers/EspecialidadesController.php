<?php

namespace App\Http\Controllers;

use App\Http\Api;

class EspecialidadesController extends Controller
{
    protected Api $api;
    
    public function __construct()
    {
        $this->api = new Api();
    }

    public function create() 
    {
        $contents = $this->api->listaEspecialidades();

        $especialidades = [];

        foreach($contents as $content) {
            $especialidades[$content['especialidade_id']] = $content['nome'];
        }

        $titulo = "Especialidades";

        return view('especialidades.create', compact('titulo','especialidades'));
    }

    
}
