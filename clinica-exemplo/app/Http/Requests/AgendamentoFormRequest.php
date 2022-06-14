<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendamentoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomeCompleto' => 'required|min:2',
            'comoConheceu' => 'required',
            'nascimento' => 'required',
            'cpf' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nomeCompleto.required' => 'O campo Nome completo é obrigatório',
            'nomeCompleto.min'  => 'O campo Nome completo deve ter no mínimo dois caracteres',
            'comoConheceu.required' => 'O campo Como conheceu é obrigatório',
            'nascimento.required' => 'O campo Nascimento é obrigatório',
            'cpf.required' => 'O campo CPF é obrigatório',
        ];
    }
}
