<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "faeterj3dawmanha2";
    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("conexão com erro: " . $conn->connect_error);
    }

    $comandoSQL = "INSERT INTO `alunos` (`nome`, `matricula`, `email`, `cpf`) VALUES ('$nome','$matricula','$email','$cpf')";
    $result = $conn->query($comandoSQL);
}
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Alterar Aluno</h1>
        <br>
        <a href="ex14_inserirAluno.php">Inserir Aluno</a><br>
        <a href="ex14_alterarAluno.php">Alterar Aluno</a><br>
        <a href="ex14_ListarTabelaAlunos.php">Listar Alunos</a><br>
        <a href="ex14_excluirAluno.php">Excluir Aluno</a><br>
        <a href="ex14_detalheAluno.php">Detalhe de Aluno</a><br>
        <br>
        <?php echo "Aluno $matricula Inserido com sucesso"; ?>

    </body>
</html>
