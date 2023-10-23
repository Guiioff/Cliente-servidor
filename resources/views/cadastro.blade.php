<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
</head>
<body>
    <h1>Insira uma nova disciplina</h1>

    <form action="{{ route('disciplina.store' )}}" method="POST" enctype="multipart/form-data">
        @csrf

        Digite o nome da disciplina: <input type="text" name="nome">
        <br><br>
        Digite a carga horária da disciplina: <input type="number" name="carga_horaria">
        <br><br>
        Digite o curso: <input type="text" name="curso">
        <br><br>
        Insira a ementa: <input type="file" name="ementa">
        <br><br>

        <input type="submit" value="Cadastrar">

    </form>
</body>
</html>