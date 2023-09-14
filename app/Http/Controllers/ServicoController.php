<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function store(ServicoFormRequest $request){
        $usuario = servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,
        ]);
    
        return response()->json([
            "sucess" => true,
            "message" => "Serviço cadastrado com sucesso",
            "data" => $usuario
        ], 200);
    }

    public function excluir($id){
        $usuario = servico::find($id);

        if(!isset($usuario)){
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }

        $usuario->delete();

        return response()->json([
            'status' => true,
            'message' => "Usuário excluído com sucesso"
        ]);
    }

    public function update(Request $request){
        $usuario = servico::find($request->id);

        if(!isset($usuario)){
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }

        if(isset($request->nome)){
            $usuario->nome = $request->nome;
        }
        if(isset($request->descricao)){
            $usuario->descricao = $request->descricao;
        }
        if(isset($request->duracao)){
            $usuario->duracao = $request->duracao;
        }
        if(isset($request->preco)){
            $usuario->preco = $request->preco;
        }
        
        $usuario->update();

        return response()->json([
            'status' => true,
            'message' => "Serviço Atualizado"
        ]);

    
}

}