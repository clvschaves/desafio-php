@extends('adm.layouts.default')

@section('content')
    

    <section class="section">
        <form action="{{route("matricula.update", $matricula->id)}}" method="POST">
            @csrf
            @method("PUT")

            <input type="hidden" name="aluno_id" value="{{ $matricula->aluno_id }}">

            <div class="input-field">
                <select name="curso_id" id="curso_id">
                    <option value=""> Selecione um curso </option>
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