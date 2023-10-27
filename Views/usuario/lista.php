<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

// Conecte ao banco de dados usando PDO
try {
    $pdo = new PDO ("mysql:host=localhost;dbname=autenticacao","root", ""); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}}
?>
<!DOCTYPE html>
<html>
<head>
<h1>listar de Usuario</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>usuario</th>
            <th>email</th>
            <th>senha</th>
            </tr>
        <?php if (!empty($usuarios) && is_array($usuarios)) : ?>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario['id_competidor']; ?></td>
                    <td><?php echo $usuario['usuario']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $usuario['id_competidor']; ?>">Editar</a>
                        <a href="deletar.php?id=<?php echo $usuario['id_competidor']; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4">Nenhum usuário encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>