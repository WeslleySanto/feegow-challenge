@extends('layout')

@section('titulo')
    <?= $titulo ?>
@endsection

@section('conteudo')
    <div class="row">
        <form class="form-inline" method="POST" action="/agendamento/store">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <input name="nomeCompleto" placeholder="Nome completo"/>
                <select class="form-control" name="comoConheceu" id="comoConheceu">
                    <option>Como conheceu?</option>
                    @foreach($comoConheceu as $cc)
                        <option value="{{$cc['origem_id']}}">{{$cc['nome_origem']}}</option>
                    @endforeach
                </select>
                <input name="nascimento" placeholder="Nascimento" maxlength="10"/>
                <input name="cpf" placeholder="CPF" maxlength="14" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})"/>
                <input type="hidden" name="idEspecialidade" value="{{$especialidade}}"/>
                <input type="hidden" name="idProfissional" value="{{$id_profissional}}"/>
                
                <button class="btn btn-primary">Agendar</button>
            </div>
        </form>
    </div>
@endsection