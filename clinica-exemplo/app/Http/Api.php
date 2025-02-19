<?php 

namespace App\Http;

use Illuminate\Support\Facades\Http;

/**
 * Classe responsável por consumir API
 * 
 * @category API
 * @package  API
 * @author   Weslley Santo <weslley.santo@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     API
 */
class Api
{
    /**
     * Lista especialidades
     *
     * @return array
     */
    public function listaEspecialidades(): array
    {
        $response = Http::withHeaders(
            [
            'x-access-token' => env('ACCESS_TOKEN'),
            ]
        )->get(env('URL_API_V1_FREEGOW') . '/specialties/list');

        return $response->json()['content'];
    }

     /**
      * Lista profissionais por id da especialidade
      *
      * @param integer $idEspecialidade id da especialidade
      *
      * @return array
      */
    public function listaProfissionaisPorIdEspecialidade(int $idEspecialidade): array
    {
        $response = Http::withHeaders(
            [
            'x-access-token' => env('ACCESS_TOKEN'),
            ]
        )->get(env('URL_API_V1_FREEGOW') . '/professional/list', ['especialidade_id' => $idEspecialidade]);
        
        return [
            'profissionais' => $response->json()['content'],
            'total'         => $response->json()['total']
        ];
    }

    /**
     * Lista como conheceu
     *
     * @return array
     */
    public function comoConheceu(): array
    {
        $response = Http::withHeaders(
            [
            'x-access-token' => env('ACCESS_TOKEN'),
            ]
        )
        ->get(env('URL_API_V1_FREEGOW') . '/patient/list-sources');

        return $response->json()['content'];
    }

    /**
     * Obtem nome especialidade pelo id da especialidade
     *
     * @param integer $idEspecialidade id da especialidade
     * 
     * @return string
     */
    public function obtemNomeEspecialidadeByIdEspecialidade(int $idEspecialidade): string
    {
        foreach ($this->listaEspecialidades() as $especialidade) {
            if ($especialidade['especialidade_id'] == $idEspecialidade) {
                return $especialidade['nome'];
            }
        }
    }

    /**
     * Obtem descricao de como conheceu por id
     *
     * @param integer $idComoConheceu id como conheceu
     * 
     * @return string
     */
    public function obtemDescricaoComoConheceuById(int $idComoConheceu): string
    {
        foreach ($this->comoConheceu() as $comoConheceu) {
            if ($comoConheceu['origem_id'] == $idComoConheceu) {
                return $comoConheceu['nome_origem'];
            }
        }
    }

    /**
     * Listar todos os profissionais
     *
     * @return array
     */
    public function listarTodosProfissionais(): array
    {
        $response = Http::withHeaders(
            [
            'x-access-token' => env('ACCESS_TOKEN'),
            ]
        )->get(env('URL_API_V1_FREEGOW') . '/professional/list');

        return $response->json()['content'];
    }

    /**
     * Obtem nome do profissional por id
     *
     * @param integer $idProfissional id do profissional
     * 
     * @return string
     */
    public function obtemNomeProfissionalByIdProfissional(int $idProfissional): string
    {
        foreach ($this->listarTodosProfissionais() as $profissional) {
            if ($profissional['profissional_id'] == $idProfissional) {
                return $profissional['nome'];
            }
        }
    }

        
}
?>