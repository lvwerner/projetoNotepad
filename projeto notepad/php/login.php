<?php
session_start();

// Configurações do banco de dados
$host = "localhost";
$usuario_banco = "root";
$senha_banco = "";
$nome_banco = "notepad";

// Conectar ao banco de dados
$conn = new mysqli($host, $usuario_banco, $senha_banco, $nome_banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter dados do formulário
$nome = $_POST['name'];
$senha = $_POST['password'];

// Proteger contra injeção SQL (recomendação: use instruções preparadas)
$nome = $conn->real_escape_string($nome);
$senha = $conn->real_escape_string($senha);

// Consulta SQL para verificar o usuário
$query = "SELECT * FROM usuario WHERE nome='$nome' AND senha='$senha'";
$result = $conn->query($query);

// Verificar se há correspondência
if ($result->num_rows > 0) {
    // Login bem-sucedido, criar sessão
    $_SESSION['nome_usuario'] = $nome;
    
    // Redirecionar para a página desejada após o login
    header("Location: ../html/notepad.php");
} else {
    // Login falhou, redirecionar para a página de login com uma mensagem de erro
    header("Location: ../html/login.html?erro=1");
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
