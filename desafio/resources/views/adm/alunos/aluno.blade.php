@extends('adm.layouts.default')

@section('content')

{{--filtro de pesquisa--}}

<form action="{{route("aluno.index")}}" method="GET">

<div class="row valign-wrapper">
    
    <div class="input-field col s3">
        <input value="{{request()->search}}" type="text" name="search" id="search" />
        <label for="name">Nome</label>
    </div>

</div>

<div class="right-align">
    <a href="{{route("aluno.index")}}" class="btn-flat">Exibir Todos</a>
    <button type="submit" class="btn waves-effect waves-light">
        Pesquisar
    </button>
</div>

</form>

{{--Lista de alunos--}}
    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>email</th>
                    <th>Data-Nascimento</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($alunos as $aluno)
                    <tr>
                        <td>{{$aluno->name}}</td>
                        <td>{{$aluno->email}}</td>
                        <td>{{$aluno->date}}</td>
                        <td class="right-align">

                            <a href="{{route("aluno.edit", $aluno->id)}}">
                                <span>
                                    <i class="material-icons blue-text accent-2">edit</i>
                                </span>
                            </a>

                            <form action="{{route("aluno.destroy", $aluno->id)}}" method="POST" style="display: inline;">
                                @csrf
                                @method("DELETE")

                                <button style="border:none; background:transparent;" type="submit">
                                    <span style="cursor: pointer;">
                                        <i class="material-icons red-text accent-3">delete_forever</i>
                                    </span>

                                </button>

                            </form>
                            
                        </td>
                    </tr>
                @empty
                    <tr colspan="2">Não existem alunos cadastrados.</tr>
                @endforelse
            </tbody>
        </table>

        <div>
            {{$alunos->links("shared.pagination")}}
        </div>

        <div class="fixed-action-btn">
            <a class="btn btn-large waves-effect waves-light" href="{{route("aluno.create")}}">
                Adicionar
            </a>
        </div>


    </section>
@endsection

