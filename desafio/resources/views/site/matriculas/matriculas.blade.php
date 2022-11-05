@extends('site.layouts.default')

@section('content')
    <h3>Alunos matriculados no curso de: {{$curso->title}}</h3>

    <form action="{{ route("home.aluno.index", $curso->id) }}" method="GET">
        <div class="row valign-wrapper">
            <div class="input-field col s3">
                <input type="text" name="search" value={{request()->search}}>
                <label for="name">Nome ou Email</label>
            </div>
        </div>

        <div class="right-align">
            <a href="{{route("home.aluno.index", $curso->id)}}" class="btn-flat">Exibir Todos</a>
            <button type="submit" class="btn waves-effect waves-light">
                Pesquisar
        </div>

    </form>


    <table class="highlight">
        
        <thead>
            <tr>
                <th>Aluno</th>
                <th>email</th>
                <th>Data-Nascimento</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($matriculas as $matricula)
                <tr>
                    <td>{{$matricula->aluno->name}}</td>
                    <td>{{$matricula->aluno->email}}</td>
                    <td>{{$matricula->aluno->date}}</td>
                </tr>
            @empty
                <tr colspan="2">Não existem alunos matriculados.</tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{$matriculas->links("shared.pagination")}}
    </div>
@endsection