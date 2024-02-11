<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    header("Location: ../html/login.html");
    exit(); // Certifique-se de sair após redirecionar para evitar a execução adicional do código
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Note Pad</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <nav>
    <h1>NotePad </h1>
    <ul>
      <a href="index.html">
        <li id="menu">Início</li>
      </a>
      <a href="notepad.html">
        <li id="menu">Notepad</li>
      </a>
      <a href="calculadora.js">
        <li id="menu">Calculadora</li>
      </a>
      <a href="../php/sair.php">
        <li id="menu">Sair</li>
      </a>
    </ul>
  </nav>
  <main>
    <form action="../php/salvar.php" method="POST">
      <textarea name="note" id="note" type="text" cols="30" rows="10"></textarea><br>
      <button type="submit">Salvar</button>
      <a href="../html/anotacoes.php"><button type="button">Ver anotações </button></a>
    </form>
  </main>
</body>

</html>