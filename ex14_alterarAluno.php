<?php
$matricula = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["matricula"])) {
    $matricula = $_GET["matricula"];
}else{
    echo 'Precisa enviar a matricula do aluna que deseja alterar.';
    echo '<br />';
    echo '<a href="ex14_ListarTabelaAlunos.php" >Voltar</a>';
    die();
    
}
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBanco = "faeterj3dawmanha2";
$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
if ($conn->connect_error) {
    die("conexão com erro: " . $conn->connect_error);
}
$comandoSQL = "SELECT * FROM `alunos` where matricula='$matricula'";
$result = $conn->query($comandoSQL);
$linha = $result->fetch_assoc();
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
        <form action="ex14_alterarAlunoNoBanco.php" method=POST>
            Matricula: <input type=text name="matricula" value=<?php echo $linha["matricula"] ?>> <br>
            nome: <input type=text name="nome" value='<?php echo $linha["nome"] ?>'> <br>
            email: <input type=text name="email" value=<?php echo $linha["email"] ?>> <br>
            cpf: <input type=text name="cpf" value=<?php echo $linha["cpf"] ?>> <br>
            <br><br>
            <input type="submit" value="Alterar">
        </form>
        <br>
    </body>
</html>

