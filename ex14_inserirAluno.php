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
        <form action="ex14_inserirAlunoNoBanco.php" method=POST>
            Matricula: <input type=text name="matricula" value=''> <br>
            nome: <input type=text name="nome" value=''> <br>
            email: <input type=text name="email" value='' > <br>
            cpf: <input type=text name="cpf" value=''> <br>
            <br><br>
            <input type="submit" value="Gravar">
        </form>
        <br>
    </body>
</html>

