<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Visão Geral</h1>

    <a href="{{ route('disciplina.create') }}">Insira uma nova disciplina</a>
    <br><br><br>

    <table width="100%" border="1" style="text-align: center">
        <tr>
            <th>Disciplina</th>
            <th>Carga horária</th>
            <th>Curso</th>
            <th>Ementa</th>
            <th>Opções</th>
        </tr>

        @foreach($disciplinas as $disciplina)
        <tr>
            <td>{{$disciplina->nome}}</td>
            <td>{{$disciplina->carga_horaria}}</td>
            <td>{{$disciplina->curso}}</td>
            <td>                
                <a href="{{ route('disciplina.ementa', ['id' => $disciplina->id]) }}"> Ver Ementa
                    {{-- <img src="{{ asset('files.png') }}" alt="Visualizar ementa" style="height: 20px; width: 20px;"> --}}
                </a>
                
                
            </td>
            <td>
                <form method="POST" action="{{ route('disciplina.delete', ['id' => $disciplina->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="border: none; background: none; cursor: pointer;">
                        <img src="{{ asset('images/delete.svg') }}" alt="Deletar disciplina" title="Deletar disciplina" style="height: 30px; width: 30px;">
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
