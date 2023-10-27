<?php
class UsuarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarUsuario($usuario, $senha, $email) {
        $sql = "INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario, $senha, $email]);
   
    }  public function listarUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletarUsuarios($id_usuario) {
        $sql = "DELETE FROM usuarios WHERE id_usuario = $id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function atualizarUsuario($id_usuario, $usuario, $senha, $email) {
        $sql = "UPDATE usuarios SET usuario = ?, senha = ?, email = ?
        WHERE id_usuario = ?";
        $stmt = $this->pdo->prepare ($sql);
        $stmt->execute([$usuario, $senha, $email, $id_usuario]);
    }



    // Implementar métodos para atualizar e excluir usuarios
}
?>