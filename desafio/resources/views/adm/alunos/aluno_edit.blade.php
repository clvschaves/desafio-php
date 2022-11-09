@extends('adm.layouts.default')

@section('content')
    

    <section class="section">
        <form action="{{route("aluno.update", $aluno->id)}}" method="POST">
            @csrf
            @method("PUT")
            
                <div class="input-field">
                    <input type="text" name="name" id="name" value="{{old("name", $aluno->name)}}" />
                    <label for="name">Nome</label>
                    @error('name')
                        <div class="red-text text-accent-3"><small>{{$message}}</small></div>
                    @enderror
                </div>

                <div class="input-field">
                    <input type="email" name="email" id="email" value="{{old("email", $aluno->email)}}" />
                    <label for="email">Email</label>
                    @error('email')
                        <div class="red-text text-accent-3"><small>{{$message}}</small></div>
                    @enderror
                </div>

                <div class="input-field">
                    <input type="date" name="date" id="date" value="{{old("date", $aluno->date)}}" />
                    <label for="date">Nome</label>
                    @error('date')
                        <div class="red-text text-accent-3"><small>{{$message}}</small></div>
                    @enderror
                </div>
            

            <div class="right-align">
                <a href="{{route("aluno.index")}}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>

        </form>
    </section>

@endsection