<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Listar Aluno da Tabela Alunos</h1>
        <br>
        <a href="ex14_inserirAluno.php">Inserir Aluno</a><br>
        <a href="ex14_alterarAluno.php">Alterar Aluno</a><br>
        <a href="ex14_ListarTabelaAlunos.php">Listar Alunos</a><br>
        <a href="ex14_excluirAluno.php">Excluir Aluno</a><br>
        <a href="ex14_detalheAluno.php">Detalhe de Aluno</a><br>
        <br><br>
        <table border="1">
            <tr>
                <th>Matricula</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
            <?php
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $nomeBanco = "faeterj3dawmanha2";
            $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
            if ($conn->connect_error) {
                die("conexão com erro: " . $conn->connect_error);
            }

            $comandoSQL = "SELECT * FROM `alunos`";
            $result = $conn->query($comandoSQL);

            while ($linha = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["matricula"] . "</td>";
                echo "<td>" . $linha["nome"] . "</td>";
                echo "<td>" . $linha["email"] . "</td>";
                echo "<td>" . $linha["cpf"] . "</td>";
                echo "<td><a href='ex14_alterarAluno.php?matricula=" . $linha["matricula"] . " '>Alterar</a> | "
                        . "<a href='ex14_excluirAluno.php?matricula=" . $linha["matricula"] . " '>Deletar</a> | "
                        . "<a href='ex14_detalheAluno.php?matricula=" . $linha["matricula"] . " '>Detalhe</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>

