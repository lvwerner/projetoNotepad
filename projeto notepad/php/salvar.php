<?php

session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    header("Location: ../html/login.html");
    exit(); // Certifique-se de sair após redirecionar para evitar a execução adicional do código
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $note = $_POST['note'];

    // Obtém o id_usuario da sessão
    $id_user = $_SESSION['nome_usuario'];

    // Conecta ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "notepad";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Insere os dados no banco de dados
    $sql = "INSERT INTO notas (conteudo)";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
        // Redireciona para a página notepad.html
        header("Location: notepad.html");
        exit();
    } else {
        echo "Erro ao inserir os dados: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
