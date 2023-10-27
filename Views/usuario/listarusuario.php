<!DOCTYPE html>
<html>
<head>
    <title>listar de Usuários</title>
</head>
<body>
    <h1>listar de Usuários</h1>
    <form action="listarusuario.php" method="post">
        <h2>Criar Usuário</h2>
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <input type="submit" value="Criar Usuário">
    </form>

    <?php
    require_once('../../Controllers/UsuarioController.php');
    require_once('../../Models/UsuarioModel.php');
    
    $pdo = new PDO("mysql:host=localhost;dbname=autenticacao", "root", "");
    $UsuarioController = new UsuarioController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];

        $UsuarioController->criarUsuario($usuario, $senha, $email);
    }

    echo '<h2>listarusuario de Usuários</h2>';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Usuário</th>';
    echo '<th>Email</th>';
    echo '<th>Senha</th>';
    echo '<th>Ações</th>';
    echo '</tr>';

    $usuarios = $UsuarioController->listarUsuarios();
    foreach ($usuarios as $usuario) {
        echo '<tr>';
        echo '<td>' . $usuario['usuario'] . '</td>';
        echo '<td>' . $usuario['email'] . '</td>';
        echo '<td>' . $usuario['senha'] . '</td>';
        echo '<td>';
        echo '<button onclick="deletarUsuario(' . $usuario['id_usuario'] . ')">Deletar</button>';
        echo '<button onclick="atualizarUsuario(' . $usuario['id_usuario'] . ')">Atualizar</button>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
    ?>

    <script>
        function deletarUsuario(id) {
            if (confirm("Tem certeza de que deseja deletar este usuário?")) {
                // Chamar a função PHP para deletar o usuário
                window.location.href = "deletar.php?id_usuario=" + id;
            }
        }

        function atualizarUsuario(id) {
            // Redirecionar o usuário para a página de atualização com o ID do usuário
            window.location.href = "atualizarusuario.php?id=" + id;
        }
    </script>
</body>
</html>