@extends('adm.layouts.default')

@section('content')
    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Descrição</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($cursos as $curso)
                    <tr>
                        <td>{{$curso->title}}</td>
                        <td>{{$curso->description}}</td>
                        <td class="right-align">

                            <a href="{{route("curso.edit", $curso->id)}}">
                                <span>
                                    <i class="material-icons blue-text accent-2">edit</i>
                                </span>
                            </a>

                            <form action="{{route("curso.destroy", $curso->id)}}" method="POST" style="display: inline;">
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
                    <tr colspan="2">Não existem cursos cadastrados.</tr>
                @endforelse
            </tbody>
        </table>

        <div>
            {{$cursos->links("shared.pagination")}}
        </div>

        <div class="fixed-action-btn">
            <a class="btn btn-large waves-effect waves-light" href="{{route("curso.create")}}">
                Adicionar
            </a>
        </div>


    </section>
@endsection