<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profissional_id' => 'required',
            'cliente_id' => 'required',
            'servico_id' => 'required',
            'data_hora' => 'required',
            'tipo_pagamento' => 'required|max:20|min:3',
            'valor' => 'required',
        ];
    }

     public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }


    public function messages(){
        return  [
            'profissional.required' => 'O campo profissional é obrigatório.',
            
            'data_hora.required' =>  'Horario é obrigatprio',
            'data_hora.date' => 'O formato é inválido',
            
            'pagamento.required' => 'O campo pagamento é obrigatório',
            'pagamento.max' => 'o campo deve conter no máximo 20 caracteres',
            'pagamento.min' => 'o campo deve conter no minímo 3 caracteres',

            'valor.required'=>'Valor é obrigatório'
            
        ];
}
}
