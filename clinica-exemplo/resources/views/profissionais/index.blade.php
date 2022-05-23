@extends('layout')

@section('titulo')
    <?= $titulo ?>
@endsection

@section('conteudo')
    <div class="container-sm">
        <div class="alert alert-primary" role="alert">
            <?= $total ?> encontrado(s)
        </div>
    </div>
    <div class="row">
        @foreach($profissionais as $profissional)
        <div class="card" class="col-sm">
            <img src="<?=$profissional['foto']?>" class="card-img-top" 
                alt="<?=$profissional['tratamento'] . $profissional['nome']?>">
            <div class="card-body">
                <h5 class="card-title"><?=$profissional['tratamento'] . $profissional['nome']?></h5>
                <p class="card-text"><?=$profissional['conselho']?>: <?=$profissional['documento_conselho']?></p>
                <a href="/profissional/agendar/<?=$profissional['profissional_id']?>" class="btn btn-primary">Agendar</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
