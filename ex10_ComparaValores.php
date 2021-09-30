<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1>3DAW</h1>
		<?php
			$x = $_GET["var1"];
			$y = $_GET["var2"];
			
			if ($x == $y) {
				echo "<p>x é igual a y, x = $x</p>";
			}
			if ($x != $y) {
				echo "<p>x não é igual a y, x = $x e y = $y</p>";
			}
			if ($x === $y) {
				echo "<p>x é identico a y, x = $x e y = $y</p>";
			}
			if ($x !== $y) {
				echo "<p>x não é identico a y, x = $x e y = $y</p>";
			}
			if ($x <> $y) {
				echo "<p>x é diferente de y, x = $x e y = $y</p>";
			}
			if ($x < $y) {
				echo "<p>x é menor que y, x = $x e y = $y</p>";
			}
			if ($x > $y) {
				echo "<p>x é maior que y, x = $x e y = $y</p>";
			}
			if ($x <= $y) {
				echo "<p>x é menor ou igual a y, x = $x e y = $y</p>";
			}
			if ($x >= $y) {
				echo "<p>x é maior ou igual a y, x = $x e y = $y</p>";
			}
			if (($x >=5 ) and ($x<=6)) {
				echo "<p>x é maior ou igual a 5 e menor ou igual a 6, x = $x </p>";
			}
			if (($y >=5 ) and ($y<=6)) {
				echo "<p>y é maior ou igual a 5 e menor ou igual a 6, y = $y</p>";
			} 
			
			echo "<h1>Escolha outros números para fazer as devidas comparações.</h1>";
			
		?>
		<br>
		<form action="ex10_ComparaValores.php" method=GET>
			<h3>Valores</h3>
			<input type=number name="var1"> +
			<input type=number name="var2"> =
			<br><br>
			<input type="submit" value="Comparar">
		</form>
		<br>
	</body>
</html>
