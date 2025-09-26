<?php

$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "bubble_sortnotas";

$conexao = new mysqli($hostname, $user, $password, $database);

if($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else{
    // Evita caracteres especiais (SQL Inject)
    $nome = $conexao->real_escape_string($_POST['nome']);
    $nota1 = $conexao->real_escape_string($_POST['nota1']);
    $nota2 = $conexao->real_escape_string($_POST['nota2']);
    $nota3 = $conexao->real_escape_string($_POST['nota3']);
    $nota4 = $conexao->real_escape_string($_POST['nota4']);
    $professor = $conexao->real_escape_string($_POST['professor']);

    $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
    $status = ($media >= 7) ? 'Aprovado' : 'Reprovado';

    $sql = "INSERT INTO aluno (`nomeAluno`, `status`) 
            VALUES ('".$nome."', '".$status."' );";
   
    $resultado = $conexao->query($sql);

    $sql2 = "SELECT idaluno FROM aluno WHERE nomeAluno = '".$nome."';";
    $resultado2 = $conexao->query($sql2);
    $row = $resultado2->fetch_assoc();
    $aluno_idaluno = $row['idaluno'];

    $sql3 = "SELECT idprofessor FROM professores WHERE nomeProfessor = '".$professor."';";
    $resultado3 = $conexao->query($sql3);
    $row2 = $resultado3->fetch_assoc();
    $professor_idprofessor = $row2['idprofessor'];
    $sql4 = "INSERT INTO notas (`nota1`, `nota2`, `nota3`, `nota4`, `media`, `aluno_idaluno`, `professores_idprofessor`) 
            VALUES ('".$nota1."', '".$nota2."' , '".$nota3."', '".$nota4."', '".$media."', '".$aluno_idaluno."', '".$professor_idprofessor."');";
    $resultado4 = $conexao->query($sql4);
    



    $conexao->close();
    header('Location: index.php', true, 301);

}

?>