@extends('adm.layouts.default')

@section('content')
    

    <section class="section">
        <form action="{{route("curso.store")}}" method="POST">
            @csrf
            
            
                <div class="input-field">
                    <input type="text" name="title" id="title" value="{{old("title")}}" />
                    <label for="title">Titulo</label>
                    @error('title')
                        <div class="red-text text-accent-3"><small>{{$message}}</small></div>
                    @enderror
                </div>

                <div class="input-field">
                    <input type="text" name="description" id="description" value="{{old("description")}}" />
                    <label for="description">Descrição</label>
                    @error('description')
                        <div class="red-text text-accent-3"><small>{{$message}}</small></div>
                    @enderror
                </div>           

            <div class="right-align">
                <a href="{{route("curso.index")}}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>

        </form>
    </section>

@endsection