<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Alterar Pergunta</h1>
        <br>
        <a href="ex15_IncluirPerguntaBanco.php">Inserir Pergunta</a><br>
        <a href="ex15_alterarPerguntaBanco.php">Alterar Pergunta</a><br>
        <a href="ex15_listarPerguntasBanco.php">Listar Perguntas</a><br>
        <a href="ex15_excluirPerguntaBanco.php">Excluir Pergunta</a><br>
        <a href="ex15_detalhePerguntaBanco.php">Detalhe de Pergunta</a><br>
        <br>

        <?php
        $sucesso = "";
        $servidor = "localhost";
        $username = "root";
        $senha = "";
        $database = "faeterj3dawgame";
        $conn = new mysqli($servidor, $username, $senha, $database);
        if ($conn->connect_error) {
            die("Conexao Falhou, avise o administrador do sistema");
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $id = $_GET["id"];

            $comandoSQL = "SELECT * FROM `perguntas` where id = $id";
            $resultado = $conn->query($comandoSQL);
            $linha = $resultado->fetch_assoc();
            ?>
            <div>
                Pergunta: <input type=text name="pergunta" readonly="readonly" value="<?php echo $linha['pergunta'] ?>"> <br>
                pontos: <input type=text name="pontos" readonly="readonly" value="<?php echo $linha['pontos'] ?>"> <br>
                grau de difilculdade: <input type=text name="grau" readonly="readonly" value="<?php echo $linha['grauDificuldade'] ?>"> <br>
                <input type="hidden" name="id" value="<?php echo $linha['id'] ?>">
                <br><br>
            </div>
            <?php
        }else{
           $sucesso = "Escolha uma pergunta da lista";
        }
        ?>
        <h3><?php echo $sucesso; ?></h3>
    </body>
</html>