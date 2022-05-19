<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EspecialidadesController extends Controller
{
    public function index() {
        $response = Http::withHeaders([
            'x-access-token' => env('ACCESS_TOKEN'),
        ])->get('https://api.feegow.com/v1/api/specialties/list');
        
        // dd($response); 
        $contents = $response->json()['content'];

        $especialidades = [];

        foreach($contents as $content) {
            $especialidades[$content['especialidade_id']] = $content['nome'];
        }

        return view('especialidades', compact('especialidades'));
    }
}
