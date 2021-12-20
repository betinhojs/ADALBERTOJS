<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["pergunta"]) && isset($_GET["pontos"]) && isset($_GET["grau"])) {
    $pergunta = $_GET["pergunta"];
    $pontos = $_GET["pontos"];
    $grau = $_GET["grau"];

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
    echo json_encode(['status' => 'Sucesso ao inserir a pergunta']);
}else{
    echo json_encode(['status' => 'Erro na requisição']);
}