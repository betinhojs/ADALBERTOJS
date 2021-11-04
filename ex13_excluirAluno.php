<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matricula = $_POST["matricula"];
		$arquivoAluno = fopen("alunosNovos.txt", "r+") or die("Erro na abertura do arquivo");
        
		$txt = '';
		$alterado = false;
		while (!feof($arquivoAluno)) {
			$linha = fgets($arquivoAluno);
			$linhasExplode = explode(";", $linha);
			
			if (isset($linhasExplode[1])) {
				if ($linhasExplode[1] != $matricula) {
					$txt .= $linha;
					$alterado = true;
				}
				
			}
			
		}
		
		fclose($arquivoAluno);
		
		// deleta
		unlink("alunosNovos.txt");
        
		// reescreve
		file_put_contents("alunosNovos.txt", $txt, FILE_APPEND);
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1>Excluir Aluno</h1>
		<br>
		
		<br>
		<form action="ex13_excluirAluno.php" method=POST>
			Matricula: <input type=text name="matricula"> <br>
			
			<br><br>
			<input type="submit" value="Excluir">			
			
		</form>
		<br>
	</body>
</html>
