<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class EspecialidadesController extends Controller
{
    public function create() 
    {
        $contents = $this->listaEspecialidades();

        $especialidades = [];

        foreach($contents as $content) {
            $especialidades[$content['especialidade_id']] = $content['nome'];
        }

        $titulo = "Especialidades";

        return view('especialidades.create', compact('titulo','especialidades'));
    }

    public function listaEspecialidades(): array
    {
        $response = Http::withHeaders([
            'x-access-token' => env('ACCESS_TOKEN'),
        ])->get(env('URL_API_V1_FREEGOW') . '/specialties/list');

        return $response->json()['content'];
    }
}
