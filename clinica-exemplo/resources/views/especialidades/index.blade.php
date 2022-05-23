@extends('layout')

@section('titulo')
    <?= $titulo ?>
@endsection

@section('conteudo')
    <div class="row">
        <form class="form-inline" method="POST" action="/profissionais/lista">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <label for="especialidade">Consulta de:</label>
                <select class="form-control" name="especialidade" id="especialidade">
                    <option>Selecione a especialidade</option>
                    @foreach($especialidades as $key => $especialidade)
                        <option value="<?=$key;?>"><?=$especialidade;?></option>
                    @endforeach
                </select>
                <button class="btn btn-primary">Agendar</button>
            </div>
        </form>
    </div>
@endsection