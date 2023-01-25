<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'name' => 'required|string',
            'cpf' => 'required|cpf|unique_cpf:'.$request->id,
            'telephone' => 'required',
            'plate' => 'required|formato_placa_de_veiculo|unique:users,plate,'.$request->id
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Obrigatório informar o nome do usuário.',
            'name.string' => 'Nome do usuário inválido.',
            'cpf.required' => 'Obrigatório informar o CPF.',
            'cpf.cpf' => 'CPF inválido.',
            'cpf.unique_cpf' => 'O CPF já foi utilizado.',
            'telephone.required' => 'Obrigatório informar o telefone.',
            'plate.required' => 'Informe a placa do veículo do usuário.',
            'plate.formato_placa_de_veiculo' => 'Placa inválida (EX: MXK-1936).',
            'plate.unique' => 'A placa já foi cadastrada.'
        ];
    }
}
