<?php
include_once 'DbConection.php';
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Listar Emprestimos</h1>
        <br>
        <a href="EmprestimoNovo.html">Inserir Emprestimo</a><br>
        <a href="EmprestimoListar.php">Listar Emprestimos</a><br>
        <br>
        <table border="1px">
            <tr>
                <th>Id</th>
                <th>CPF</th>
                <th>Endividamento</th>
                <th>Valor</th>
                <th>Parcelas</th>
                <th>Garantia</th>
                <th>Ações</th>
            </tr>
            <?php
            $comandoSQL = "SELECT * FROM `Emprestimos`";
            $resultado = $conn->query($comandoSQL);
            While ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["id"] . "</td>";
                echo "<td>" . $linha["cpf"] . "</td>";
                echo "<td>" . $linha["endividamento"] . "</td>";
                echo "<td>" . $linha["valor"] . "</td>";
                echo "<td>" . $linha["parcelas"] . "</td>";
                echo "<td>" . $linha["garantia"] . "</td>";
                echo "<td><a href='EmprestimoAlterar.html?id=" . $linha["id"] . "'>Alterar</a> | "
                . "<a href='EmprestimoRemover.html?id=" . $linha["id"] . "'>Remover</a> | "
                . "<a href='EmprestimoDetalhes.html?id=" . $linha["id"] . "'>Detalhe</a> | ";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>