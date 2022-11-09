@extends('adm.layouts.default')

@section('content')
    

    <section class="section">
        <form action="{{route("matricula.store")}}" method="POST">
            @csrf            
            
            <div class="input-field">
                <select name="aluno_id" id="aluno_id">
                    <option value="" disabled selected> Selecione um aluno</option>
                    @foreach ($alunos as $aluno)
                        <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                    @endforeach
                </select>
                <label for="aluno">Aluno</label>
                @error('aluno')
                    <div class="red-text text-accent-3"><small>{{$message}}</small></div>
                @enderror
            </div>

            <div class="input-field">
                <select name="curso_id" id="curso_id">
                    <option value="" disabled selected> Selecione um curso</option>
                    @foreach ($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->title}}</option>
                    @endforeach
                </select>
                <label for="curso">Curso</label>
                @error('curso')
                    <div class="red-text text-accent-3"><small>{{$message}}</small></div>
                @enderror
            </div>
            

            <div class="right-align">
                <a href="{{route("matricula.index")}}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>

        </form>
    </section>

@endsection