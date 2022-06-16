@extends('layout')

@section('titulo')
    <?= $titulo ?>
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h2>Preencha seus dados </h2>
    <div class="row"> 
        <div class="col-12">   
            <form method="POST" action="/agendamento/store">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" name="nomeCompleto" placeholder="Nome completo"/>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control" name="comoConheceu" id="comoConheceu">
                            <option value="">Como conheceu?</option>
                            @foreach($comoConheceu as $cc)
                                <option value="{{$cc['origem_id']}}">{{$cc['nome_origem']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" 
                            name="nascimento"
                            id="nascimento"
                            placeholder="Nascimento" 
                            maxlength="10" 
                            data-inputmask-alias="datetime" 
                            data-inputmask-inputformat="dd/mm/yyyy" 
                        />
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" 
                            name="cpf" 
                            id="cpf"
                            placeholder="CPF" 
                            maxlength="14" 
                            data-inputmask="'mask': '999.999.999-99'" 
                        />
                    </div>            
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 float-left">
                        <button class="btn btn-primary">Solicitar horários</button>
                    </div>
                </div>
                <input type="hidden" name="idEspecialidade" value="{{$especialidade}}"/>
                <input type="hidden" name="idProfissional" value="{{$id_profissional}}"/>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#nascimento').inputmask();
            $('#cpf').inputmask();
        });
    </script>
@endsection