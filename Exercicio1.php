<?php 
	
	$nomes = array("Adalberto", "Agda", "Alexandre", "Amanda", "Brenda");
	$idades = array(44, 31, 30, 27, 20);
	$emails = array ("Adalberto@faeterj-rio.edu.br", "Agda@faeterj-rio.edu.br", "Alexandre@faeterj-rio.edu.br", "Amanda@faeterj-rio.edu.br", "Brenda@faeterj-rio.edu.br");
	$medias = array ( 7.5, 5.6, 8.7, 9.9, 9.7);
?>

<!DOCTYPE html>
<html>
	<body>
		
		<h1>Tabela</h1>
		
		<table border="1">
			
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Idade</th>
				<th>Média</th>
			</tr>
			
			<?php
				
				for ($x=0; $x<=4; $x++)
				{
					echo "<tr>";
					echo "<td>$nomes[$x]</td>";
					echo "<td>$emails[$x]</td>";
					echo "<td>$idades[$x]</td>";
					echo "<td>$medias[$x]</td>";
					echo "</tr>";
				}
			?>	
			
		</table>		
	</body>
</html>