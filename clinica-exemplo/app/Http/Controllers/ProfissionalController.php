<?php

namespace App\Http\Controllers;

use App\Http\Api;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    protected Api $api;
    
    public function __construct()
    {
        $this->api = new Api();
    }

    public function lista(Request $request) {

        $idEspecialidade = $request->especialidade;

        $retPE = $this->api->listaProfissionaisPorIdEspecialidade($idEspecialidade);

        $nomeEspecialidade = $this->api->obtemNomeEspecialidadeByIdEspecialidade($idEspecialidade);

        return view('profissionais.index')
            ->with('titulo', 'Profissionais')
            ->with('idEspecialidade', $idEspecialidade)
            ->with('nomeEspecialidade', $nomeEspecialidade)
            ->with('profissionais', $retPE['profissionais'])
            ->with('total', $retPE['total']);
    }

    public function create($id_profissional, $especialidade) 
    {
        $comoConheceu = $this->api->comoConheceu();

        $titulo = 'Agendar com Profissional';

        return view('profissionais.create', 
            compact('titulo', 'especialidade', 'comoConheceu', 'id_profissional')
        );
    }

}
