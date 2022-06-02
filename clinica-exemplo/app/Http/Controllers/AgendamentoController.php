<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{

    public function index(Request $request) {
        $agendamentos = Agendamento::query()->orderBy('name')->get();
        $titulo = "Lista de Agendamentos";

        $mensagem = $request->session()->get('mensagem');

        // dd($agendamentos);
        return view(
            'agendamento.index', 
            compact('titulo', 'agendamentos', 'mensagem')
        );
    }

    public function store(Request $request)
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
