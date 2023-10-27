<?php 
include_once('../../config.php');

if (!isset($_GET['id_usuario'])) {
    header('Location: listarusuario.php');
    exit;
}

$id_usuario = $_GET['id_usuario'];
$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id_usuario = ?');
$stmt->execute([$id_usuario]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listarusuario.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id_usuario = ?');
    $stmt->execute([$id_usuario]);
    header('Location: listarusuario.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Deletar Usuário</title>
</head>
<body>
    <h1>Deletar Usuário</h1>
    <p>Tem certeza que deseja deletar o usuario:
        <?php echo $appointment['usuario']; ?>
        <form method="post">
            <button type="submit">Sim</button>
            <a href="listarusuario.php">Não</a>
</form></body></html>