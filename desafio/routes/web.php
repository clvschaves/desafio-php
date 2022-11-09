<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//HOME
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/curso/{id}/alunos', [HomeController::class, 'index_curso'])->name('home.aluno.index');


//Alunos
Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');
Route::post('/aluno/store', [AlunoController::class, 'store'])->name('aluno.store');

Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');
Route::put('/aluno/update/{id}', [AlunoController::class, 'update'])->name('aluno.update');
Route::delete('/aluno/destroy/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');

//CURSOS
Route::get('/curso', [CursoController::class, 'index'])->name('curso.index');
Route::get('/curso/create', [CursoController::class, 'create'])->name('curso.create');
Route::post('/curso/store', [CursoController::class, 'store'])->name('curso.store');

Route::get('/curso/edit/{id}', [CursoController::class, 'edit'])->name('curso.edit');
Route::put('/curso/update/{id}', [CursoController::class, 'update'])->name('curso.update');
Route::delete('/curso/destroy/{id}', [CursoController::class, 'destroy'])->name('curso.destroy');

//MATRICULAS
Route::get('/matricula', [MatriculaController::class, 'index'])->name('matricula.index');
Route::get('/matricula/create', [MatriculaController::class, 'create'])->name('matricula.create');
Route::post('/matricula/store', [MatriculaController::class, 'store'])->name('matricula.store');

Route::get('/matricula/edit/{id}', [MatriculaController::class, 'edit'])->name('matricula.edit');
Route::put('/matricula/update/{id}', [MatriculaController::class, 'update'])->name('matricula.update');
Route::delete('/matricula/destroy/{id}', [MatriculaController::class, 'destroy'])->name('matricula.destroy');
