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
Route::post('servico/store',[ServicoController::class, 'store']);

Route::delete('servico/delete/{id}',
[ServicoController::class, 'excluir']);

Route::put('servico/update',
[ServicoController::class, 'update']);

Route::post('servico/nome',
[ServicoController::class, 'pesquisarPorNome']);

Route::get('servico/find/descricao',
[ServicoController::class, 'pesquisarPorDescricao']); 

Route::get('servico/retornarTodos',
[ServicoController::class, 'retornarTodos']);


//Profissional
Route::post('profissional/store',
[ProfissionalController::class, 'store']);

Route::delete('profissional/delete/{id}',
[ProfissionalController::class, 'excluir']);

Route::put('profissional/update',
[ProfissionalController::class, 'update']);

Route::get('profissional/nome',
[ProfissionalController::class, 'pesquisarPorNome']);

Route::get('profissional/celular',
[ProfissionalController::class, 'pesquisarPorCelular']);

Route::get('profissional/cpf',
[ProfissionalController::class, 'pesquisarPorCpf']);

Route::get('profissional/email',
[ProfissionalController::class, 'pesquisarPorEmail']);


//Cliente
Route::post('cliente/store',
[ClienteController::class, 'store']);

Route::delete('cliente/delete/{id}',
[ClienteController::class, 'excluir']);

Route::put('cliente/update',
[ClienteController::class, 'update']);

Route::get('cliente/nome',
[ClienteController::class, 'pesquisarPorNome']);

Route::get('cliente/celular',
[ClienteController::class, 'pesquisarPorCelular']);

Route::get('cliente/cpf',
[ClienteController::class, 'pesquisarPorCpf']);

Route::get('cliente/email',
[ClienteController::class, 'pesquisarPorEmail']);

Route::get('cliente/retornarClientes',
[ClienteController::class, 'retornarTodosClientes']);

Route::get('cliente/find/{id}',
[ClienteController::class, 'pesquisarPorId']);

//Agenda
Route::post('agenda/store',
[AgendaController::class, 'store']);

Route::get('agenda/nome',
[AgendaController::class, 'pesquisarPorData']);

Route::get('agenda/profissional',
[AgendaController::class, 'pesquisarProfissionalAgenda']);

Route::put('agenda/update',
[AgendaController::class, 'update']);

Route::delete('agenda/delete/{id}',
[AgendaController::class, 'excluirAgenda']);