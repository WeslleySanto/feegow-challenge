@extends('layout')

@section('titulo')
    <?= $titulo ?>
@endsection

@section('conteudo')
    <div class="row">
        <div class="col-12">
            @if (!empty($mensagem))
            <div class="alert alert-success" role="alert">
                {{$mensagem}}
            </div>
            @endif
        </div>
        
        <div class="col-12"> 
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id Agendamento</th>
                    <th scope="col">Especialidade</th>
                    <th scope="col">Profissional</th>
                    <th scope="col">Nome completo</th>
                    <th scope="col">Como conheceu?</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">CPF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendamentos as $agendamento)
                        <tr>
                            <th scope="row">{{$agendamento['id']}}</th>
                            <td>{{$agendamento['nome_especialidade']}}</td>
                            <td>{{$agendamento['nome_profissional']}}</td>
                            <td>{{$agendamento['name']}}</td>
                            <td>{{$agendamento['descricao_como_conheceu']}}</td>
                            <td>{{$agendamento['birthdate']}}</td>
                            <td>{{$agendamento['cpf']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
        <div class="col-12"> 
                <a href="{{route('listar_especialidades')}}" class="btn btn-primary">
                    Listar especialidades    
                </a>
        </div>
    </div>
@endsection