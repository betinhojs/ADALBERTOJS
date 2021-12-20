<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && isset($_GET["pergunta"]) && isset($_GET["pontos"]) && isset($_GET["grau"])) {
    $pergunta = $_GET["pergunta"];
    $pontos = $_GET["pontos"];
    $grau = $_GET["grau"];
    $id = $_GET["id"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "faeterj3dawgame";
    $conn = new mysqli($servidor, $username, $senha, $database);
    if ($conn->connect_error) {
        die("Conexao Falhou, avise o administrador do sistema");
    }
    $comandoSQL = "UPDATE `perguntas` SET `pergunta`='$pergunta',`pontos`='$pontos',`grauDificuldade`='$grau' WHERE id = $id";
    $result = $conn->query($comandoSQL);
    echo json_encode(['status' => 'Sucesso ao alterar a pergunta']);
} else {
    echo json_encode(['status' => 'Erro na requisição']);
}