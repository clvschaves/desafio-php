@extends('site.layouts.default')

@section('content')
    <section class="section lighten-4 center">

        <div style="display: flex; flex-wrap: wrap; justify-content: space-around">
        @foreach ($cursos as $curso)
            <a href="{{route("home.aluno.index", $curso->id)}}">
                <div class="card-panel" style="width: 300px; height: 100%">
                    <i class="material-icons medium green-text text-lighten-3">arrow_circle_right</i>
                    <h4 class="black-text">{{$curso->title}}</h4>
                </div>
            </a>
        @endforeach
          
    </div>

    <div>
        {{$cursos->links("shared.pagination")}}
    </div>
    </section>
@endsection