<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatriculaRequest;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {      
        $matriculas = Matricula::paginate(env("PAGINACAO"));
        return view("adm.matriculas.matricula", [
            "matriculas" => $matriculas
        ]);
    }

    public function create()
    {
        $alunos = Aluno::index();
        $cursos = Curso::index();
        return view("adm.matriculas.matricula_create", [
            "alunos" => $alunos,
            "cursos" => $cursos,
        ]);
    }

    public function store(MatriculaRequest $request)
    {
        $message = "Falha ao realizar matricula";
        $input = $request->validated();
        if (Matricula::create_matricula($input["aluno_id"], $input["curso_id"])) {
            $message = "Matricula realizada com sucesso";
        }
        return redirect()->route("matricula.index")->with("message", $message);
    }

    public function edit(int $id)
    {
        $cursos = Curso::index();
        $matricula = Matricula::find_matricula($id);
        return view("adm.matriculas.matricula_edit",[
            "matricula" => $matricula,
            "cursos" => $cursos
        ]);
    }

    public function update(int $id, MatriculaRequest $request)
    {
        $message = "Falha ao atualizar matricula";
        $input = $request->validated();
        if (Matricula::update_matricula($id, $input["aluno_id"], $input["curso_id"])) {
            $message = "Matricula atualizada com sucesso!";
        }
        return redirect()->route("matricula.index")->with("message", $message);
    }

    public function destroy(int $id)
    {
        $message = "Falha ao remover matricula";
        if (Matricula::delete_matricula($id)) {
            $message = "Matricula removida com sucesso";
        }
        return redirect()->route("matricula.index")->with("message", $message);
    }
}
