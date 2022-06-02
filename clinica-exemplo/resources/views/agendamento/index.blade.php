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
                    <tr>
                        @foreach($agendamentos as $agendamento)
                            <th scope="row">{{$agendamento['id']}}</th>
                            <td>{{$agendamento['specialty_id']}}</td>
                            <td>{{$agendamento['professional_id']}}</td>

                            <td>{{$agendamento['name']}}</td>
                            <td>{{$agendamento['source_id']}}</td>
                            <td>{{$agendamento['birthdate']}}</td>
                            <td>{{$agendamento['cpf']}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        <div>
    </div>
@endsection