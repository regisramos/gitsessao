<?php
require_once '../../config.php';
require_once '../../Controllers/UsuarioController.php';

$UsuarioController = new UsuarioController($pdo);

if (isset($_POST['usuario']) && 
    isset($_POST['email'])) 
{
    $UsuarioController->criarUsuario($_POST['usuario'], $_POST['senha'], $_POST['email']);
}

if (isset($_POST['deletar_Usuario'])){
    $UsuarioController->deletarUsuarios($_POST['deletar_Usuario_id']);
}

if (isset($_POST['atualizar_Usuario_id'])){
    $UsuarioController->atualizarUsuario($_POST['atualizar_Usuario_id'],
    $_POST['atualizar_usuario'], $_POST['atualizar_senha'], $_POST['atualizar_email']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form method="post">
        <input type="text" name="usuario" placeholder="Nome de Usuario"
        required><br>
        <input type="password" name="senha" placeholder="Senha"
        required><br>
        <input type="email" name="email" placeholder="Email" required>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>