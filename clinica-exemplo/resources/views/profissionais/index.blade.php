@extends('layout')

@section('titulo')
    {{ $titulo }}
@endsection

@section('conteudo')
    <div class="container-sm">
        <div class="alert alert-primary" role="alert">
            {{ $total }} {{ $nomeEspecialidade }} encontrado(s)
        </div>
    </div>
    <div class="row">
        @foreach($profissionais as $profissional)
        <div class="card" class="col-sm">
            <div class="media">
                <img src="{{$profissional['foto']}}" class="rounded float-left img-thumbnail"
                    alt="{{$profissional['tratamento'] . $profissional['nome']}}" width="100px"/>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$profissional['tratamento'] . $profissional['nome']}}</h5>
                <p class="card-text">{{$profissional['conselho']}}: {{$profissional['documento_conselho']}}</p>
                <a href="/profissional/agendar/{{$profissional['profissional_id']}}/{{$idEspecialidade}}" class="btn btn-primary">Agendar</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
