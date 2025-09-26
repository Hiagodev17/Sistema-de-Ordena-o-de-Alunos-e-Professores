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
    $materia = $conexao->real_escape_string($_POST['materia']);

    $sql = "INSERT INTO professores (`nomeProfessor`, `materia`) 
            VALUES ('".$nome."', '".$materia."' );";
   
    $resultado = $conexao->query($sql);

    $conexao->close();
    header('Location: index.php', true, 301);

}

?>