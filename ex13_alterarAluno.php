<?php

	$nomeEdita = "";
    $matriculaEdita = "";
    $dtNascEdita = "";
    $emailEdita = "";
    $cpfEdita = "";
    $foneEdita = "";
    $enderecoEdita = "";
    $cidadeEdita = "";
    $estadoEdita = "";
    $cepEdita = "";
	
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
		
		if ($alterado){
			echo "<h1> Aluno alterado com sucesso</h1>";
		} else {
			echo "<h1> Aluno não encontrado</h1>";
		}
		exit();
		
		

    } else {
		$matricula = $_GET["matricula_editar"];
		
		$arquivoAluno = fopen("alunosNovos.txt", "r") or die("Erro na abertura do arquivo");
		
		
		$encontrou = false;
		while (!feof($arquivoAluno)) {
			$linha = fgets($arquivoAluno);
			$linhasExplode = explode(";", $linha);
			
			if (isset($linhasExplode[1])) {
				if ($linhasExplode[1] == $matricula) {
					$nomeEdita = $linhasExplode[0];
					$matriculaEdita = $linhasExplode[1];
					$dtNascEdita = $linhasExplode[2];
					$emailEdita =$linhasExplode[3];
					$cpfEdita = $linhasExplode[4];
					$foneEdita = $linhasExplode[5];
					$enderecoEdita = $linhasExplode[6];
					$cidadeEdita = $linhasExplode[7];
					$estadoEdita = $linhasExplode[8];
					$cepEdita = $linhasExplode[9];
					$encontrou = true;
					
				}
			
		    }

        }
		
		fclose($arquivoAluno);
		
		if (!$encontrou) {
			echo "<h1> Aluno não encontrado</h1>";
			exit();
		}
		
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
    Matricula: <input type=text name="matricula" value='<?php echo $matriculaEdita; ?>'> <br>
    nome: <input type=text name="nome" value='<?php echo $nomeEdita; ?>'> <br>
    email: <input type=text name="email" value='<?php echo $emailEdita; ?>'> <br>
    data nascimento: <input type=text name="dtNasc" value='<?php echo $dtNascEdita; ?>'> <br>
    cpf: <input type=text name="cpf" value='<?php echo $cpfEdita; ?>'> <br>
    telefone:<input type=text name="telefone" value='<?php echo $foneEdita; ?>'> <br>
    endereço: <input type=text name="endereco" value='<?php echo $enderecoEdita; ?>'> <br>
    cidade: <input type=text name="cidade" value='<?php echo $cidadeEdita; ?>'> <br>
    estado: <input type=text name="estado" value='<?php echo $estadoEdita; ?>'> <br>
    cep: <input type=text name="cep" value='<?php echo $cepEdita; ?>'> <br>
    <br><br>
    <input type="submit" value="Inserir">
</form>
<br>
</body>
</html>
