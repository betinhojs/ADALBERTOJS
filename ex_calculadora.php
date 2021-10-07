<?php
	
	function somar ($num1,$num2){
		$soma=$num1+$num2;
		return $soma;
	}
	
	function subtrair ($num1,$num2){
		$subtracao=$num1-$num2;
		return $subtracao;
	}
	
	function multiplicar ($num1,$num2){
		$multiplicacao=$num1*$num2;
		return $multiplicacao;
	}
	
	function dividir ($num1,$num2){
		$divisao=$num1/$num2;
		return $divisao;
	}
	
	//function potencia ($num1,$num2){    
	//$potenciacao=$num1**$num2;
	//return $potenciacao;
	//}	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Calculadora</title>
	</head>
	<body>
		<h1>Para achar a raiz quadrada selecionar apenas o primeiro número.</h1>
		<form action="ex_calculadora.php" method=POST>	
			<input type = "number" name="numero1">
			<select name = "opcoes"> 
				<option value= "0">Somar</option>
				<option value= "1">Subtrair</option>
				<option value= "2">Multiplicar</option>
				<option value= "3">Dividir</option>
				<option value= "4">Potenciação</option>
				<option value= "5">Raiz Quadrada</option>
			</select>
			<input type = "number" name="numero2"><br><br>
			<input type = "submit" name="calcular" value="Calcular"><br><br>	
		</form>
	</body>	
</html>
<?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){                             
		$n1 = $_POST["numero1"];
		$n2 = $_POST["numero2"];
		$op = $_POST["opcoes"];
		
		switch($op){
			
			case 0:echo "$n1 + $n2 = " . somar($n1,$n2);break;
			case 1:echo "$n1 - $n2 = " . subtrair($n1,$n2);break;
			case 2:echo "$n1 * $n2 = " . multiplicar($n1,$n2);break;
			case 3:echo "$n1 / $n2 = " . dividir($n1,$n2);break;
			case 4:echo "$n1 elevado a $n2 = " . pow($n1,$n2);break;
			case 5:echo "A raiz quadrada de $n1 = " . sqrt($n1);break;
			
		}
	}
?>
