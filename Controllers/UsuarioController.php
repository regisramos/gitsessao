<?php
require_once('../../Models/UsuarioModel.php');

class UsuarioController {
    private $UsuarioModel;

    public function __construct($pdo) {
        $this->UsuarioModel = new UsuarioModel($pdo);
    }

    public function criarUsuario($usuario, $senha, $email) {
        $this->UsuarioModel->criarUsuario($usuario, $senha, $email);
    }
    public function Listarusuarios() {
        return $this->UsuarioModel->Listarusuarios();
    }

    public function exibirListausuarios() {
        $usuarios = $this->UsuarioModel->Listarusuarios();
        include 'Views/usuarios/lista.php';
    }

    public function deletarUsuarios ($id_usuario){
        $this->UsuarioModel->deletarUsuarios($id_usuario);
    }

    public function atualizarusuario($id_usuario, $usuario,$senha,$email){
        $this->UsuarioModel->atualizarusuario($id_usuario, $usuario,$senha,$email);
    }
}
?>