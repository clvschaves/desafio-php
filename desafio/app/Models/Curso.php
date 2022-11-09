<?php

namespace App\Models;

use App\Models\Curso as ModelsCurso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description"];

    public static function index()
    {
        return Curso::all();
    }

    public static function create_curso(string $title, string $description)
    {
        $curso = Curso::Where("title", $title)->first();
        if ($curso !== null) {
            return false;
        }
        $curso = new Curso;
        $curso->title = $title;
        $curso->description = $description;
        return $curso->save();
    }

    public static function find_curso(int $id)
    {
        return Curso::Where("id", $id)->first();
    }

    public static function update_curso(int $id, string $title, string $description)
    {
        $curso = Curso::Where("id", $id)->first();
        if ($curso === null) {
            return false;
        }
        $curso->title = $title;
        $curso->description = $description;
        return $curso->save();
    }

    public static function delete_aluno(int $id)
    {
        $curso = Curso::Where("id", $id)->first();
        if ($curso === null) {
            return false;
        }
        return $curso->delete();
    } 

    public function matriculas()
    {
        return $this->hasMany(Aluno::class);
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}
