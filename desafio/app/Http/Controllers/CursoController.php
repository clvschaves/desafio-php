<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Request $request)
    {      
        $cursos = Curso::where('title', 'like', '%' . $request->search . '%')
        ->paginate(env("PAGINACAO"))->withQueryString();
        return view("adm.cursos.curso", [
            "cursos" => $cursos
        ]);
    }

    public function create()
    {
         return view("adm.cursos.curso_create");
    }

    public function store(CursoRequest $request)
    {
        $message = "Falha ao cadastrar curso";
        $input = $request->validated();
        if (Curso::create_curso($input["title"], $input["description"])) {
            $message = "Curso cadastrado com sucesso";
        }
        return redirect()->route("curso.index")->with("message", $message);
    }

    public function edit(int $id)
    {
        $curso = Curso::find_curso($id);
        return view("adm.cursos.curso_edit", [
            "curso" => $curso
        ]);
    }

    public function update(int $id, CursoRequest $request)
    {
        $message = "Falha ao atualizar curso";
        $input = $request->validated();
        if (Curso::update_curso($id, $input["title"], $input["description"])) {
            $message = "Curso atualizado com sucesso";
        }
        return redirect()->route("curso.index")->with("message", $message);
    }

    public function destroy(int $id)
    {
        $message = "Falha ao remover curso";
        if (Curso::delete_aluno($id)) {
            $message = "Curso removido com sucesso";
        }
        return redirect()->route("curso.index")->with("message", $message);
    }
}
