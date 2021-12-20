<?php
$sucesso = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    if (empty($_POST["pergunta"]) || empty($_POST["pontos"]) || empty($_POST["grau"])) {
        $sucesso = "Todos os campos devem ser preechidos";
    } else {
        $pergunta = $_POST["pergunta"];
        $pontos = $_POST["pontos"];
        $grau = $_POST["grau"];

        $servidor = "localhost";
        $username = "root";
        $senha = "";
        $database = "faeterj3dawgame";
        $conn = new mysqli($servidor, $username, $senha, $database);
        if ($conn->connect_error) {
            die("Conexao Falhou, avise o administrador do sistema");
        }
        $comandoSQL = "INSERT INTO `perguntas`(`pergunta`, `pontos`, `grauDificuldade`) VALUES ('$pergunta',$pontos,'$grau')";
        $result = $conn->query($comandoSQL);
        $sucesso = "Pergunta Inserida com sucesso!<br /> Use o formulario abaixo para inserir outras.";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Inserir Pergunta</h1>
        <br>
        <a href="ex15_IncluirPerguntaBanco.php">Inserir Pergunta</a><br>
        <a href="ex15_alterarPerguntaBanco.php">Alterar Pergunta</a><br>
        <a href="ex15_listarPerguntasBanco.php">Listar Perguntas</a><br>
        <a href="ex15_excluirPerguntaBanco.php">Excluir Pergunta</a><br>
        <a href="ex15_detalhePerguntaBanco.php">Detalhe de Pergunta</a><br>
        <br>
        <h3><?php echo $sucesso; ?></h3>
        <form action="ex15_IncluirPerguntaBanco.php" method=POST>
            Pergunta: <input type = text name = "pergunta"> <br>
            pontos: <input type = number min = "1" max = "100" name ="pontos"> <br>
            grau de difilculdade: 
            <select name = "grau"> 
                <option value = "Fácil">Fácil</option> 
                <option value = "Muito Fácil"> Muito Fácil</option>
                <option value = "Médio">Médio</option>
                <option value = "Difícil">Difícil</option>
            </select>
            <br><br>
            <input type="submit" value="Inserir">
        </form>
        <br>
    </body>
</html>


