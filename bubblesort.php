<html>
	<body>
		<form method="post" action="buscaDados.php">
			<label>Digite o nome do aluno: </label>
			<input type="text" name="nome" size="20">
			<input type="submit" value="BUSCAR">
		</form>
		Listar:
		<form action='bubblesort.php' method='POST'>
			<input type='text' value='1' name='nome'>
			<input type='submit' value='Listar'>
		</form>
		
		<?php
        	if(isset($_POST['nome'])){
        		$hostname = "127.0.0.1";
        		$user = "root";
        		$password = "root";
        		$database = "bubble_sortnotas";
        		
        		$conexao = new mysqli($hostname,$user,$password,$database);
        
        		$sql="SELECT * FROM `bubble_sortnotas`.`aluno`;";
        
        		$resultado = $conexao->query($sql);
        		$dados = []; //Cria um array/vetor para armazenar os dados
        
        		// Armazena os dados em um array
        		while($row = mysqli_fetch_array($resultado)){
        			$dados[] = $row[1];  // Supondo que você quer ordenar a segunda coluna
        		}
        
        		// Ordena os dados pelo método SORT
        		sort($dados);
        		
        		/*RELEMBRANDO
        		Tipos Comuns de Algoritmos de Ordenação
                    Bubble Sort (Método da Bolha): Percorre a lista comparando elementos adjacentes e
					trocando-os se não estiverem na ordem desejada.
                    Selection Sort (Método da Seleção): Encontra o menor (ou maior) elemento da
					lista e o coloca na posição correta.
                    Insertion Sort (Método da Inserção): Constrói a lista final um item de cada
					vez, inserindo cada novo elemento na posição correta dentro da porção já ordenada da lista. 
                    Quick Sort: Usa a estratégia de "divisão e conquista", dividindo o problema de ordenar
					a lista em subproblemas menores até que todos estejam resolvidos. 
                    Merge Sort: Similar ao Quick Sort, também utiliza a técnica de "divisão e conquista",
					dividindo a lista em partes menores, ordenando-as em vetores paralelos e depois combinando
					as partes.*/
            
        		// Exibe os dados ordenados
        		echo '<hr>';
				echo 'Alunos Cadastrados: <br>';
        		foreach($dados as $dado){
        			echo $dado;
        			echo '<br>';
        		}
        		//Até aqui
        		$sql2="SELECT * FROM `bubble_sortnotas`.`professores`;";
        
        		$resultado2 = $conexao->query($sql2);
        		$dados2 = []; //Cria um array/vetor para armazenar os dados
        
        		// Armazena os dados em um array
        		while($row2 = mysqli_fetch_array($resultado2)){
        			$dados2[] = $row2[1];  // Supondo que você quer ordenar a segunda coluna
        		}
        
        		
        		sort($dados2);
        		
        		echo '<hr>';
				echo 'Professores Cadastrados: <br>';
        		foreach($dados2 as $dado2){
        			echo $dado2;
        			echo '<br>';
        		}
        		$conexao -> close();
        	}
        ?>
	</body>
</html>