<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true; // ajustar se usar policies/auth
    }

    public function rules()
    {
        $vehicleId = $this->route('vehicle') ? $this->route('vehicle')->id : null;

        return [
            'model' => 'required|string|max:255',
            'plate' => [
                'required',
                'string',
                'max:20',
                'unique:vehicles,plate' . ($vehicleId ? ",{$vehicleId}" : ''),
                // opcional: validar formato da placa com regex (Brasil Mercosul/antiga)
            ],
            'acquisition_date' => 'required|date',
            'accessibility_type' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'plate.unique' => 'Já existe um veículo com essa placa.',
            // outros msgs conforme necessário
        ];
    }
}
