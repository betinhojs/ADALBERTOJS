<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$x = $_POST["var1"];
	$y = $_POST["var2"];
	$soma = ($x + $y);
	}	
?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1>3DAW</h1>
<br>
<form action="ex12_Calculadora.php" method=POST>
	<h3>Somar dois números</h3>
	a:<input type=number name="var1"> +
	b:<input type=number name="var2"> =
	<?php echo "<p>O resultado da soma entre os dois números é = $soma</p>" ?>	
	<br><br>
	<input type="submit" value="Somar">
</form>
<br>
</body>
</html>
