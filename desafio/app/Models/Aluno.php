<?php

namespace App\Models;

use App\Models\Aluno as ModelsAluno;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ["name", "email", "date"];

    public static function index()
    {
        return Aluno::all();
    }

    public static function create_aluno(string $name, string $email, string $date)
    {
        $aluno = Aluno::Where("email", $email)->first();
        if ($aluno !== null) {
            return false;
        }
        $aluno = new Aluno;
        $aluno->name = $name;
        $aluno->email = $email;
        $aluno->date = $date;
        return $aluno->save();

    }

    public static function find_aluno(int $id)
    {
        return Aluno::Where("id", $id)->first();
    }

    public static function update_aluno(int $id, string $name, string $email, string $date)
    {
        $aluno = Aluno::Where("id", $id)->first();
        if ($aluno == null) {
            return false;
        }
        $aluno->name = $name;
        $aluno->email = $email;
        $aluno->date = $date;
        return $aluno->save();
    }

    public static function delete_aluno(int $id)
    {
        $aluno = Aluno::Where("id", $id)->first();
        if ($aluno == null) {
            return false;
        }
        return $aluno->delete();
    } 

    public function matriculas()
    {
        return $this->hasMany(Aluno::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
