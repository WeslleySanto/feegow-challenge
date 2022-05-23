<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class EspecialidadesController extends Controller
{
    public function lista() {
        $response = Http::withHeaders([
            'x-access-token' => env('ACCESS_TOKEN'),
        ])->get(env('URL_API_V1_FREEGOW') . '/specialties/list');
        
        // dd($response); 
        $contents = $response->json()['content'];

        $especialidades = [];

        foreach($contents as $content) {
            $especialidades[$content['especialidade_id']] = $content['nome'];
        }

        $titulo = "Especialidades";

        return view('especialidades.index', compact('titulo','especialidades'));
    }
}
