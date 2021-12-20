<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Listar Perguntas</h1>
        <br>
        <a href="ex16_IncluirPergunta.html">Inserir Pergunta</a><br>
        <a href="ex16_alterarPerguntas.html">Alterar Pergunta</a><br>
        <a href="ex16_listarPerguntas.php">Listar Perguntas</a><br>
        <a href="ex16_excluirPergunta.html">Excluir Pergunta</a><br>
        <a href="ex16_detalhePergunta.html">Detalhe de Pergunta</a><br>
        <br>
        <table border="1px">
            <tr>
                <th>Pergunta</th>
                <th>Pontos</th>
                <th>Grau de dificuldade</th>
                <th>Ações</th>
            </tr>
            <?php
            $servidor = "localhost";
            $username = "root";
            $senha = "";
            $database = "faeterj3dawgame";
            $conn = new mysqli($servidor, $username, $senha, $database);
            if ($conn->connect_error) {
                die("Conexao Falhou, avise o administrador do sistema");
            }
            $comandoSQL = "SELECT * FROM `perguntas`";
            $resultado = $conn->query($comandoSQL);
            While ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["pergunta"] . "</td>";
                echo "<td>" . $linha["pontos"] . "</td>";
                echo "<td>" . $linha["grauDificuldade"] . "</td>";
                echo "<td><a href='ex16_alterarPerguntas.html?id=" . $linha["id"] . "'>Alterar</a> | "
                        . "<a href='ex16_excluirPergunta.html?id=" . $linha["id"] . "'>Remover</a> | "
                        . "<a href='ex16_detalhePergunta.html?id=" . $linha["id"] . "'>Detalhe</a> | ";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>