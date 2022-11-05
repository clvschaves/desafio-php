<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(env("PAGINACAO"));

        return view("site.matriculas.home", [
            "cursos" => $cursos
        ]);
    }

    public function index_curso(int $id, Request $request)
    {
        $curso = Curso::find_curso($id);

        $matriculas = Matricula::with(["aluno", "curso"]);

        if ($request->search !== null) {
            $matriculas = $matriculas->join('alunos', 'alunos.id', '=', 'matriculas.aluno_id')->where('alunos.name', 'like', '%' . $request->search . '%')
            ->orWhere('alunos.email', 'like', '%' . $request->search . '%')->paginate(env("PAGINACAO"))->withQueryString();
        } else {
            $matriculas = $matriculas->Where("curso_id", $id)->paginate(env("PAGINACAO"));
        }   

        return view("site.matriculas.matriculas", [
            "curso" => $curso,
            "matriculas" => $matriculas
        ]);
    }

}

