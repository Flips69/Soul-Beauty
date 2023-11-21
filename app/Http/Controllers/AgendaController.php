<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function store(Request $request){
        $agenda = Agenda::create([
            'profissional_id' => $request->profissional_id,
            'cliente_id' => $request->cliente_id,
            'servico_id' => $request->servico_id,
            'data_hora' => $request->data_hora,
            'tipo_pagamento' => $request->tipo_pagamento,
            'valor' => $request->valor,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Compromisso na agenda foi cadastrado com sucesso.",
            "data" => $agenda

        ], 200);
    }
    public function pesquisarPorData(Request $request){
   
    $agenda = Agenda::where('data_hora', '>=', '%'.$request->data_hora.'%') -> get();
        
    if (count($agenda) > 0) {
        return response()->json([
            'status' => true,
            'data' => $agenda
        ]);
    }
}
    public function pesquisarProfissionalAgenda(Request $request){
        $agenda = Agenda::where('profissional_id', 'like', '%' . $request->profissional_id . '%')->get();

        if (count($agenda) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agenda
            ]);
        }

        if( 'status' == false){
            return response()->json([
        
                'data' => 'Profissional não está disponível.' ]);
        }
    }
    public function retornarTodosClientes(){
        $agenda = Agenda::all();
        return response()->json([
            'status' => true,
            'data' => $agenda
        ]);
    }
    public function excluirAgenda($id){
        $agenda = Agenda::find($id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Compromisso não foi encontrado na agenda."
            ]);
        }

        $agenda->delete();
        return response()->json([
            'status' => true,
            'message' => "Compromisso excluído da agenda com sucesso."
        ]);
    }
    public function update(Request $request){
        $agenda = Agenda::find($request->id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Compromisso não foi encontrado na agenda."
            ]);
        }

        if (isset($request->profissional_id)){
            $agenda->profissional_id = $request->profissional_id;
        }

        if (isset($request->cliente_id)){
            $agenda->cliente_id = $request->cliente_id;
        }

        if(isset($request->servico_id)){
            $agenda->servico_id = $request->servico_id;
        }

        if (isset($request->data_hora)){
            $agenda->data_hora = $request->data_hora;
        }

        if (isset($request->tipo_pagamento)){
            $agenda->tipo_pagamento = $request->tipo_pagamento;
        }
        
        if (isset($request->valor)){
            $agenda->valor = $request->valor;
        }
       
        $agenda->update();

        return response()->json([
            'status' => true,
            'message' => 'Compromisso na agenda foi atualizado.'
        ]);
    }
}

