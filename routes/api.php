<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Servico
Route::post('servico/store',
[ServicoController::class, 'store']);

Route::delete('servico/delete/{id}',
[ServicoController::class, 'excluir']);

Route::put('servico/update',
[ServicoController::class, 'update']);

Route::post('servico/nome',
[ServicoController::class, 'pesquisarPorNome']);

Route::post('servico/find/descricao',
[ServicoController::class, 'pesquisarPorDescricao']); 

Route::get('servico/retornarTodos',
[ServicoController::class, 'retornarTodos']);

Route::get('servico/find/{id}',
[ServicoController::class, 'pesquisarPorId']);


//Profissional
Route::post('profissional/store',
[ProfissionalController::class, 'store']);

Route::delete('profissional/delete/{id}',
[ProfissionalController::class, 'excluir']);

Route::put('profissional/update',
[ProfissionalController::class, 'update']);

Route::post('profissional/nome',
[ProfissionalController::class, 'pesquisarPorNome']);

Route::post('profissional/celular',
[ProfissionalController::class, 'pesquisarPorCelular']);

Route::post('profissional/cpf',
[ProfissionalController::class, 'pesquisarPorCpf']);

Route::post('profissional/email',
[ProfissionalController::class, 'pesquisarPorEmail']);

Route::get('profissional/retornarProfissionais',
[ProfissionalController::class, 'retornarTodosProfissionais']);

Route::get('profissional/find/{id}',
[ProfissionalController::class, 'pesquisarPorId']);

Route::put('profissional/esqueciMinhaSenha/{id}',
[ProfissionalController::class, 'esqueciMinhaSenha']);


//Cliente
Route::post('cliente/store',
[ClienteController::class, 'store']);

Route::delete('cliente/delete/{id}',
[ClienteController::class, 'excluir']);

Route::put('cliente/update',
[ClienteController::class, 'update']);

Route::post('cliente/nome',
[ClienteController::class, 'pesquisarPorNome']);

Route::post('cliente/celular',
[ClienteController::class, 'pesquisarPorCelular']);

Route::post('cliente/cpf',
[ClienteController::class, 'pesquisarPorCpf']);

Route::post('cliente/email',
[ClienteController::class, 'pesquisarPorEmail']);

Route::get('cliente/retornarClientes',
[ClienteController::class, 'retornarTodosClientes']);

Route::get('cliente/find/{id}',
[ClienteController::class, 'pesquisarPorId']);

Route::put('cliente/esqueciMinhaSenha/{id}',
[ClienteController::class, 'esqueciMinhaSenha']);

//Agenda
Route::post('agenda/store',
[AgendaController::class, 'store']);

Route::post('agenda/nome',
[AgendaController::class, 'pesquisarPorData']);

Route::post('agenda/profissional',
[AgendaController::class, 'pesquisarProfissionalAgenda']);

Route::put('agenda/update',
[AgendaController::class, 'update']);

Route::delete('agenda/delete/{id}',
[AgendaController::class, 'excluirAgenda']);

Route::get('agenda/retornarAgenda',
[ClienteController::class, 'retornarTodaAgenda']);
