<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite que todos os usuários usem este request
    }

    public function rules()
    {
        return [
            'modelo' => 'required|string|max:255',

            // Validação de placa
            'placa' => $this->isMethod('post')
                ? 'required|string|max:10|unique:vehicles,placa'
                : 'required|string|max:10|unique:vehicles,placa,' . $this->vehicle->id,

            'data_aquisicao' => 'required|date',

            // Validação dos tipos de acessibilidade
            'accessibility_types' => 'nullable|array',
            'accessibility_types.*' => 'exists:accessibility_types,id',
        ];
    }

    public function messages()
    {
        return [
            'modelo.required' => 'O campo Modelo é obrigatório.',
            'placa.required' => 'O campo Placa é obrigatório.',
            'placa.unique' => 'Esta placa já está cadastrada.',
            'data_aquisicao.required' => 'O campo Data de Aquisição é obrigatório.',
            'accessibility_types.array' => 'Tipos de acessibilidade inválidos.',
            'accessibility_types.*.exists' => 'Um ou mais tipos de acessibilidade selecionados não existem.',
        ];
    }
}