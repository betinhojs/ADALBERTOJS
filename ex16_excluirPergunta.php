<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "faeterj3dawgame";
    $conn = new mysqli($servidor, $username, $senha, $database);
    if ($conn->connect_error) {
        die("Conexao Falhou, avise o administrador do sistema");
    }
    $comandoSQL = "DELETE FROM `perguntas` WHERE `id` = '$id'";
    $result = $conn->query($comandoSQL);
    echo json_encode(['status' => 'Sucesso ao remover a pergunta']);
} else {
    echo json_encode(['status' => 'Erro na requisição']);
}