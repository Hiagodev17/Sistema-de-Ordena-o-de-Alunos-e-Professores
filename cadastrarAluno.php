<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <form method="post" action="cadastrarBancoAluno.php">
        <label>>Nome do Aluno: </label>
        <input type="text" name="nome" size="20"><br>
        <label>>Nota - 1</label>
        <input type="float" name="nota1" size="20"><br>
        <label>>Nota - 2</label>
        <input type="float" name="nota2" size="20"><br>
        <label>>Nota - 3</label>
        <input type="float" name="nota3" size="20"><br>
        <label>>Nota - 4</label>
        <input type="float" name="nota4" size="20"><br>
        <label>>Professor da Matéria</label>
        <input type="text" name="professor" size="20"><br>

        <input type="submit" value="CADASTRAR">
    </form>
</body>
</html>