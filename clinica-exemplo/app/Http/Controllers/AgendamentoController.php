<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use App\Http\Requests\AgendamentoFormRequest;

class AgendamentoController extends Controller
{
    // @todo incluir mascara data nascimento e cpf
    // @todo remover __contruct e colocar em controller
    // @todo incluir padrao entrada sistema para especiliades/lista

    public function index(Request $request) {
        $agendamentos = Agendamento::query()->orderBy('id')->get();
        $titulo = "Lista de Agendamentos";

        foreach($agendamentos as $key => $agendamento) {
            $agendamentos[$key]['nome_especialidade'] = $this->api->obtemNomeEspecialidadeByIdEspecialidade($agendamento['specialty_id']);
            $agendamentos[$key]['nome_profissional'] = $this->api->obtemNomeProfissionalByIdProfissional($agendamento['professional_id']);
            $agendamentos[$key]['descricao_como_conheceu'] = $this->api->obtemDescricaoComoConheceuById($agendamento['source_id']);
        }

        $mensagem = $request->session()->get('mensagem');

        return view(
            'agendamento.index', 
            compact('titulo', 'agendamentos', 'mensagem')
        );
    }

    public function store(AgendamentoFormRequest $request)
    {
        Agendamento::create([
            'source_id'         => $request->comoConheceu,
            'specialty_id'      => $request->idEspecialidade,
            'professional_id'   => $request->idProfissional,
            'name'              => $request->nomeCompleto,
            'cpf'               => $request->cpf,
            'birthdate'         => $request->nascimento,
            'date_time'         => date('Y-m-d H:i:s'),
        ]);

        $request->session()->flash(
            'mensagem',
            'Agendamento realizado com sucesso!'
        );

        return redirect('/agendamento');
    }

}
