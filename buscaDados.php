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

    $sql="SELECT * FROM `bubble_sortnotas`.`aluno` WHERE nomeAluno LIKE '%".$nome."%';";
    $resultado = $conexao->query($sql);
    $row = $resultado->fetch_assoc();

    $sql2="SELECT * FROM `bubble_sortnotas`.`notas` WHERE aluno_idaluno = '".$row['idaluno']."';";
    $resultado2 = $conexao->query($sql2);
    $row2 = $resultado2->fetch_assoc();

    echo "<table border='1'>
            <tr>
                <th>Nome do Aluno</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Nota 4</th>
                <th>Média</th>
                <th>Status</th>
            </tr>";
            echo "<tr>";
                echo "<td>".$nome."</td>";
                echo "<td>".$row2['nota1']."</td>";
                echo "<td>".$row2['nota2']."</td>";
                echo "<td>".$row2['nota3']."</td>";
                echo "<td>".$row2['nota4']."</td>";
                echo "<td>".$row2['media']."</td>";
                echo "<td>".$row['status']."</td>";
            echo "</tr>";
    echo "</table>";
			echo "<br>";
		    echo "<a href='bubblesort.php' class='sair'>Sair</a>";

}

?>