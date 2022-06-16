<?php

namespace App\Http\Controllers;

/**
 * Classe responsável por Especialidades
 * 
 * @category Especialidades
 * @package  Especialidades
 * @author   Weslley Santo <weslley.santo@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     Especialidades
 */
class EspecialidadesController extends Controller
{

    /**
     * Lista especialidades
     *
     * @return void
     */
    public function create() 
    {
        $contents = $this->api->listaEspecialidades();

        $especialidades = [];

        foreach ($contents as $content) {
            $especialidades[$content['especialidade_id']] = $content['nome'];
        }

        $titulo = "Especialidades";

        return view('especialidades.create', compact('titulo', 'especialidades'));
    }

    
}
