<?php
// FILEPATH: /c:/xampp/htdocs/projeto notepad/php/sair.php

// Inicia a sessão
session_start();

// Destroi todos os dados da sessão
session_destroy();

// Redireciona para outra página após encerrar a sessão
header("Location: ../html/login.html");
exit;
?>
