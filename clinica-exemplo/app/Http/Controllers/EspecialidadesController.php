<?php

namespace App\Http\Controllers;

class EspecialidadesController extends Controller
{

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
