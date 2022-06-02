<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\EspecialidadesController;

class ProfissionalController extends Controller
{
    public function lista(Request $request) {

        $idEspecialidade = $request->especialidade;

        $retPE = $this->listaProfissionaisPorIdEspecialidade($idEspecialidade);

        $especialidades = new EspecialidadesController();

        $nomeEspecialidade = '';
        
        foreach ($especialidades->listaEspecialidades() as $especialidade) {
            if ( $especialidade['especialidade_id'] == $idEspecialidade) {
                $nomeEspecialidade = $especialidade['nome'];
                break;
            }
        }

        return view('profissionais.index')
            ->with('titulo', 'Profissionais')
            ->with('idEspecialidade', $idEspecialidade)
            ->with('nomeEspecialidade', $nomeEspecialidade)
            ->with('profissionais', $retPE['profissionais'])
            ->with('total', $retPE['total']);
    }

    public function create($id_profissional, $especialidade) 
    {
        $response = Http::withHeaders([
            'x-access-token' => env('ACCESS_TOKEN'),
        ])
        ->get(env('URL_API_V1_FREEGOW') . '/patient/list-sources');

        $comoConheceu = $response->json()['content'];

        $titulo = 'Agendar com Profissional';

        return view('profissionais.create', 
            compact('titulo', 'especialidade', 'comoConheceu', 'id_profissional')
        );
    }

    /**
     * Undocumented function
     *
     * @param integer $idEspecialidade
     * @return array
     */
    public function listaProfissionaisPorIdEspecialidade(int $idEspecialidade): array
    {
        $response = Http::withHeaders([
            'x-access-token' => env('ACCESS_TOKEN'),
        ])->get(env('URL_API_V1_FREEGOW') . '/professional/list', ['especialidade_id' => $idEspecialidade]);
        
        // dd($response->json()['content']);
        return [
            'profissionais' => $response->json()['content'],
            'total' => $response->json()['total']
        ];
    }

}
