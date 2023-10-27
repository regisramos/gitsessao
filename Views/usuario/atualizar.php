<?php
    include 'config.php';
    if (!isset($_GET['id_usuario'])) {
        header('Location: listarusuario.php');
        exit;
    }
    $id_usuario = $_GET['id_usuario'];

    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id_usuario =? ');
    $stmt->execute([$id_usuario]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$appointment) {
        header('Location: listarusuario.php');
        exit;
    }
    $usuario = $appointment['usuario'];
    $email = $appointment['email'];
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Atualizar Usuario</title>
</head>
<body>
    <h1>Atualizar Usuario</h1>
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="<?php echo $usuario; ?>" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br>

        <button type="submit">Atualizar</button>
</form>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];

$stmt = $pdo->prepare('UPDATE autenticacao SET usuario = ?, email = ?, WHERE id_usuario = ?');
$stmt->execute([$usuario,$email,$id_usuario]);
header('Location: listarusuario.php');
exit;
}
?>

        