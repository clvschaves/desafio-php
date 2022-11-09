<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request)
    {      
        $alunos = Aluno::where('name', 'like', '%' . $request->search . '%')
        ->orWhere('email', 'like', '%' . $request->search . '%')
        ->paginate(env("PAGINACAO"))->withQueryString();

        return view("adm.alunos.aluno", [
            "alunos" => $alunos
        ]);
    }

    public function create()
    {
         return view("adm.alunos.aluno_create");
    }

    public function store(AlunoRequest $request)
    {
        $message = "Falha ao cadastrar novo aluno";
        $input = $request->validated();
        if (Aluno::create_aluno($input["name"], $input["email"], $input["date"])) {
            $message = "Aluno cadastrado com sucesso";
        }
        return redirect()->route("aluno.index")->with("message", $message);
    }

    public function edit(int $id)
    {
        $aluno = Aluno::find_aluno($id);
        return view("adm.alunos.aluno_edit", [
            "aluno" => $aluno
        ]);
    }

    public function update(int $id, AlunoRequest $request)
    {
        $message = "Falha ao atualizar aluno";
        $input = $request->validated();
        if (Aluno::update_aluno($id, $input["name"], $input["email"], $input["date"])) {
            $message = "Aluno atualizado com sucesso";
        }
        return redirect()->route("aluno.index")->with("message", $message);
    }

    public function destroy(int $id)
    {
        $message = "falha ao remover aluno";
        if (Aluno::delete_aluno($id)) {
            $message = "aluno removido com sucesso";
        }
        return redirect()->route("aluno.index")->with("message", $message);
    }
}
