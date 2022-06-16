<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * Classe responsável por Profissional
 * 
 * @category Profissional
 * @package  Profissional
 * @author   Weslley Santo <weslley.santo@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     Profissional
 */
class ProfissionalController extends Controller
{

    /**
     * Lista Profissionais
     *
     * @param Request $request request
     * 
     * @return void
     */
    public function lista(Request $request)
    {

        $idEspecialidade = $request->especialidade;

        $retPE = $this->api->listaProfissionaisPorIdEspecialidade($idEspecialidade);

        $nomeEspecialidade = $this->api->obtemNomeEspecialidadeByIdEspecialidade($idEspecialidade);

        return view('profissionais.index')
            ->with('titulo', 'Profissionais')
            ->with('idEspecialidade', $idEspecialidade)
            ->with('nomeEspecialidade', $nomeEspecialidade)
            ->with('profissionais', $retPE['profissionais'])
            ->with('total', $retPE['total']);
    }

    /**
     * Agendar profissional
     *
     * @param integer $id_profissional id do profissional
     * @param integer $especialidade   id da especialidade
     * 
     * @return void
     */
    public function create(int $id_profissional, int $especialidade) 
    {
        $comoConheceu = $this->api->comoConheceu();

        $titulo = 'Agendar com Profissional';

        return view(
            'profissionais.create', 
            compact('titulo', 'especialidade', 'comoConheceu', 'id_profissional')
        );
    }

}
