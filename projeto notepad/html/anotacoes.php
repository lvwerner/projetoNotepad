<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    header("Location: login.html");
    exit(); // Certifique-se de sair após redirecionar para evitar a execução adicional do código
}

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notepad";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consultar os dados do banco de dados
$sql = "SELECT conteudo FROM notas";
$result = $conn->query($sql);

// Exibir os dados em uma grade de 3 em 3
echo "<div style='display: grid; grid-template-columns: repeat(3, 1fr); grid-gap: 10px;'>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 5px;'>" . $row['conteudo'] . "</div>";
    }
} else {
    echo "Nenhum dado encontrado.";
}

echo "</div>";

// Fechar a conexão com o banco de dados
$conn->close();
?>
