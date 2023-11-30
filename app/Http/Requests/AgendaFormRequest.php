<?php

namespace App\Http\Requests;

use App\Models\Profissional;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            'data_hora' => 'required|dateTime',
            'tipo_pagamento' => 'required|max:20|min:3',
            'valor' => 'required|decimal: 2,4',
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages(){
        return [
            'profissional_id.required' => 'O ID do profissional é obrigatório.',
            'cliente_id.required' => 'O ID do cliente é obrigatório.',
            'servico_id' => 'O ID do serviço é obrigatório',
            'data_hora.requried' => 'A data e a hora do compromisso é obrigatório.',
            'data_hora.dateTime' => 'A data e a hora deve ser preenchida corretamente. Exemplo: Ano-Mês-Dia Hora:Minuto:Segundo',
            'tipo_pagamento.required' => 'O tipo do pagamento é obrigatório.',
            'tipo_pagamento.max' => 'O tipo de pagamento tem um máximo de 20 caracteres',
            'tipo_pagamento.min' => 'O tipo de pagamento tem um mínimo de 3 caracteres',
            'valor.required' => 'O valor é obrigatório.',
            'valor.decimal' => 'O valor deve ser colocado corretamente. Exemplo: 30.00'
        ];
    }
}