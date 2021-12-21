<?php

include_once 'DbConection.php';

//adiciona novo emprestimo no banco de dados
if (isset($_GET['acao']) && $_GET['acao'] == "adicionar") {
    if (!isset($_GET['cpf']) || !isset($_GET['endividamento']) || !isset($_GET['valor']) || !isset($_GET['parcelas']) || !isset($_GET['garantia'])) {
        echo json_encode(['status' => 'Alguns campos estão vazios, verifique seu formulário']);
    } else {
        extract($_GET);
        $comandoSQL = "INSERT INTO `emprestimos`(`cpf`, `endividamento`, `valor`, `parcelas`, `garantia`) VALUES "
                . "('$cpf','$endividamento','$valor','$parcelas','$garantia')";
        $result = $conn->query($comandoSQL);
        echo json_encode(['status' => 'Sucesso ao inserir o Novo Emprestimo']);
    }
}

//busca dados do emprestimo
if (isset($_GET['acao']) && $_GET['acao'] == "buscar") {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $comandoSQL = "SELECT * FROM `emprestimos` where id = " . $_GET['id'];
        $resultado = $conn->query($comandoSQL);
        $linha = $resultado->fetch_assoc();
        echo json_encode(['status' => $linha]);
    } else {
        echo json_encode(['status' => 'Identificador de cliente invalido']);
    }
}

//atualiza os dados do cliente
if (isset($_GET['acao']) && $_GET['acao'] == "atualizar") {
    if (!isset($_GET['cpf']) || !isset($_GET['endividamento']) || !isset($_GET['valor']) || !isset($_GET['parcelas']) || !isset($_GET['garantia'])) {
        echo json_encode(['status' => 'Alguns campos estão vazios ou tem informação inválida, verifique seu formulário']);
    } else {
        extract($_GET);
        $comandoSQL = "UPDATE `emprestimos` SET "
                . "`cpf` = '$cpf' , `endividamento` = '$endividamento', `valor`= '$valor', `parcelas`= '$parcelas', `garantia` = '$garantia' "
                . "WHERE id = " . $_GET['id'];
        $result = $conn->query($comandoSQL);
        echo json_encode(['status' => 'Sucesso ao alterar os dados do Emprestimo']);
    }
}

//remove os dados do cliente
if (isset($_GET['acao']) && $_GET['acao'] == "remover") {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $comandoSQL = "DELETE FROM `emprestimos` WHERE `id` = " . $_GET['id'];
        $result = $conn->query($comandoSQL);
        echo json_encode(['status' => 'Sucesso ao remover o Emprestimo']);
    } else {
        echo json_encode(['status' => 'Não foi possivel remover. Sua requisição não contem um Id valido']);
    }
}