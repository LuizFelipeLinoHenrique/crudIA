<?php
session_start();
require_once 'config/db.php';

$action = $_GET['action'] ?? '';

if ($action === 'login') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['usuario'];
        header('Location: dashboard.php');
        exit();
    } else {
        header('Location: index.php?erro=1');
        exit();
    }
}

if ($action === 'adicionar') {
    require_once 'auth.php';
    checkAuth();

    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    if ($nome) {
        $stmt = $pdo->prepare("INSERT INTO itens (nome, descricao) VALUES (?, ?)");
        $stmt->execute([$nome, $descricao]);
        header('Location: dashboard.php?sucesso=1');
        exit();
    }
}

if ($action === 'excluir') {
    require_once 'auth.php';
    checkAuth();

    $id = $_GET['id'] ?? 0;

    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM itens WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: dashboard.php?excluido=1');
        exit();
    }
}

header('Location: index.php');
exit();
?>
