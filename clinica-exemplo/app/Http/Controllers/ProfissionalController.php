<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfissionalController extends Controller
{
    public function lista(Request $request) {
        $response = Http::withHeaders([
            'x-access-token' => env('ACCESS_TOKEN'),
        ])
        ->get(env('URL_API_V1_FREEGOW') . '/professional/list', ['especialidade_id' => $request->especialidade]);
        
        // dd($response->json());
        $profissionais = $response->json()['content'];
        
        $total = $response->json()['total'];

        $titulo = 'Profissionais';

        return view('profissionais.index', compact('titulo', 'profissionais', 'total'));
    }

    public function create($id_profissional) {
        // dd($id_profissional); exit;

        $response = Http::withHeaders([
            'x-access-token' => env('ACCESS_TOKEN'),
        ])
        ->get(env('URL_API_V1_FREEGOW') . '/patient/list-sources');

        $comoConheceu = $response->json()['content'];

        // dd($comoConheceu);

        $titulo = 'Agendar com Profissional';

        return view('profissionais.create', compact('titulo', 'comoConheceu', 'id_profissional'));
    }

    public function store(Request $request)
    {   
        // dd($request);
        $request->nomeCompleto;
        $request->comoConheceu;
        $request->nascimento;
        $request->cpf;
        $request->idProfissional;

        $titulo = 'Confirmação agendamento';

        return view('profissionais.store', compact('titulo'));
    }

}
