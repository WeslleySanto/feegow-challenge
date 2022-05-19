<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profissionais</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
            <div class="row">
                    @foreach($profissionais as $profissional)
                    <div class="card" style="width: 18rem;" class="col-sm">
                        <img src="<?=$profissional['foto']?>" class="card-img-top" 
                            alt="<?=$profissional['tratamento'] . $profissional['nome']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=$profissional['tratamento'] . $profissional['nome']?></h5>
                            <p class="card-text"><?=$profissional['conselho']?>: <?=$profissional['documento_conselho']?></p>
                            <a href="#" class="btn btn-primary">Agendar</a>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>

        <!-- <form class="form-inline" method="POST" action="profissionais">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <label for="especialidade">Consulta de:</label>
                <select class="form-control" name="especialidade" id="especialidade">
                    <option>Selecione a especialidade</option>
                    
                </select>
                <button class="btn btn-primary">Agendar</button>
            </div>
        </form> -->
    </body>
</html>
