<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'autenticacao';
$username = 'root';
$password = '';

// Conexão PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
?>