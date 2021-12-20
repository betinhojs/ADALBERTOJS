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
    $comandoSQL = "SELECT * FROM `perguntas` where id = $id";
    $resultado = $conn->query($comandoSQL);
    $linha = $resultado->fetch_assoc();
    echo json_encode(['status' => $linha]);
}else{
    echo json_encode(['status' => 'Erro na requisição']);
}