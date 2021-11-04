<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $matricula = $_POST["matricula"];
        $dtNasc = $_POST["dtNasc"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];
        $fone = $_POST["telefone"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
		
		$arquivoAluno = fopen("alunosNovos.txt", "r+") or die("Erro na abertura do arquivo");
		
		$txt = '';
		$alterado = false;
		while (!feof($arquivoAluno)) {
			$linha = fgets($arquivoAluno);
			$linhasExplode = explode(";", $linha);
			
			if (isset($linhasExplode[1])) {
				if ($linhasExplode[1] == $matricula) {
					$txt .= $nome . ";" . $matricula . ";" . $dtNasc . ";" . $email . ";" . $cpf . ";" . $fone;
					$txt .= ";" . $endereco . ";" . $cidade . ";" . $estado . ";" . $cep . "\n";
					$alterado = true;
					
					} else {
					$txt .= $linha;
				}
				
			}
			
		}
		
		fclose($arquivoAluno);
		
		
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
		<h1>Alterar Aluno</h1>
		<br>		
		<br>
		<form action="ex13_alterarAluno.php" method=POST>
			Matricula: <input type=text name="matricula" value=''> <br>
			nome: <input type=text name="nome" value='<?php echo "jose da silva"; ?>'> <br>
			email: <input type=text name="email"> <br>
			data nascimento: <input type=text name="dtNasc"> <br>
			cpf: <input type=text name="cpf"> <br>
			telefone:<input type=text name="telefone"> <br>
			endereço: <input type=text name="endereco"> <br>
		    cidade: <input type=text name="cidade"> <br>
		    estado: <input type=text name="estado"> <br>
		    cep: <input type=text name="cep"> <br>
		    <br><br>
		    <input type="submit" value="Alterar">
		</form>
		<br>
	</body>
</html>
