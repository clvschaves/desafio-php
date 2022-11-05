@extends('adm.layouts.default')

@section('content')
    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Curso</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($matriculas as $matricula)
                    <tr>
                        <td>{{$matricula->aluno->name}}</td>
                        <td>{{$matricula->curso->title}}</td>
                        <td class="right-align">

                            <a href="{{route("matricula.edit", $matricula->id)}}">
                                <span>
                                    <i class="material-icons blue-text accent-2">edit</i>
                                </span>
                            </a>

                            <form action="{{route("matricula.destroy", $matricula->id)}}" method="POST" style="display: inline;">
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
                    <tr colspan="2">Não existem matriculas realizadas.</tr>
                @endforelse
            </tbody>
        </table>

        <div>
            {{$matriculas->links("shared.pagination")}}
        </div>

        <div class="fixed-action-btn">
            <a class="btn btn-large waves-effect waves-light" href="{{route("matricula.create")}}">
                Adicionar
            </a>
        </div>


    </section>
@endsection