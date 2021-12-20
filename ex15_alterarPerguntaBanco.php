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
            $facil = "";
            if ($linha ['grauDificuldade'] == "Fácil"){
                 $facil = 'selected';
            }

            $muitofacil = "";
            if ($linha ['grauDificuldade'] == "Muito Fácil"){
                 $muitofacil = 'selected';
            }

            $medio = "";
            if ($linha ['grauDificuldade'] == "Médio"){
                 $medio = 'selected';
            }

            $dificil = "";
            if ($linha ['grauDificuldade'] == "Difícil"){
                 $dificil = 'selected';
            }


            ?>
            <form action="ex15_AlterarPerguntaBanco.php" method=POST>
                Pergunta: <input type=text name="pergunta" value="<?php echo $linha['pergunta'] ?>"> <br>
                pontos: <input type=number name="pontos" min = "1" max = "100" value="<?php echo $linha['pontos'] ?>"> <br>
                grau de difilculdade: 
                    
                <select name = "grau"> 
                <option  <?php echo $facil; ?> value = "Fácil">Fácil</option> 
                <option  <?php echo $muitofacil; ?> value = "Muito Fácil"> Muito Fácil</option>
                <option  <?php echo $medio; ?> value = "Médio">Médio</option>
                <option  <?php echo $dificil; ?> value = "Difícil">Difícil</option>
                </select>

                <input type="hidden" name="id" value="<?php echo $linha['id'] ?>">
                <br><br>
                <input type="submit" value="Alterar Pergunta">
            </form>
            <?php
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST["id"])) {
            $id = $_POST["id"];
            if(empty($_POST["pergunta"]) || empty($_POST["pontos"]) || empty($_POST["grau"]) ){
                $sucesso = "Todos os campos devem ser preechidos";
            }else{
                $pergunta = $_POST["pergunta"];
                $pontos = $_POST["pontos"];
                $grau = $_POST["grau"];
                $comandoSQL = "UPDATE `perguntas` SET `pergunta`='$pergunta',`pontos`='$pontos',`grauDificuldade`='$grau' WHERE id = $id";
                $resultado = $conn->query($comandoSQL);
                $sucesso = "Pergunta alterada com sucesso!";
            }
        }else{
             $sucesso = "Escolha uma pergunta da lista de pergunta";
        }
        ?>
        <h3><?php echo $sucesso; ?></h3>
    </body>
</html>