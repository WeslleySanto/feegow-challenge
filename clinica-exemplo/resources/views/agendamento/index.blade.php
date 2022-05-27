@extends('layout')

@section('titulo')
    <?= $titulo ?>
@endsection

@section('conteudo')
    <div class="row">
        <div class="container-sm">
            @if (!empty($mensagem))
            <div class="alert alert-success" role="alert">
                {{$mensagem}}
            </div>
            @endif
        </div>

        @foreach($agendamentos as $agendamento)
            {{$agendamento['name']}} - {{$agendamento['birthdate']}}
        @endforeach
    </div>
@endsection