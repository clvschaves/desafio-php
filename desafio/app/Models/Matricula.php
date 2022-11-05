<?php

namespace App\Models;

use App\Models\Matricula as ModelsMatricula;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = ["aluno_id", "curso_id"];

    public static function index()
    {
        return Matricula::all();
    }

    public static function create_matricula(int $aluno_id, int $curso_id)
    {
        $matricula = Matricula::Where("aluno_id", $aluno_id)->Where("curso_id", $curso_id)->first();
        if ($matricula !== null) {
            return false;
        }
        $matricula = new Matricula;
        $matricula->aluno_id = $aluno_id;
        $matricula->curso_id = $curso_id;
        return $matricula->save();
    }

    public static function find_matricula(int $id)
    {
        return Matricula::Where("id", $id)->first();
    }

    public static function update_matricula(int $id, int $aluno_id, int $curso_id)
    {
        $matricula = Matricula::Where("id", $id)->first();
        if ($matricula === null) {
            return false;
        }
        $matricula->aluno_id = $aluno_id;
        $matricula->curso_id = $curso_id;
        return $matricula->save();
    }

    public static function delete_matricula(int $id)
    {
        $matricula = Matricula::Where("id", $id)->first();
        if ($matricula === null) {
            return false;
        }
        return $matricula->delete();
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
