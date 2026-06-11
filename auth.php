<?php
session_start();

function checkAuth() {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: index.php');
        exit();
    }
}
?>
