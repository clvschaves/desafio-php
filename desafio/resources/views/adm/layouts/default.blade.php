<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Desafio</title>
</head>
<body>
    
    {{--! Menu topo --}}
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="{{route("home.index")}}" class="brand-logo">Desafio</a>
                <ul class="right">
                    <li><a href="{{route("aluno.index")}}">Alunos</a>
                    </li>
                    <li><a href="{{route("curso.index")}}">Cursos</a>
                    </li><li><a href="{{route("matricula.index")}}">Matriculas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Conteudo Principal --}}
    <div class="container">
        @yield('content')
    </div>



    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        @if ($message = Session::get('message'))
            M.toast({html: "{{session('message')}}"});
        @endif

        document.addEventListener("DOMContentLoaded", function(){
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>

</body>
</html>