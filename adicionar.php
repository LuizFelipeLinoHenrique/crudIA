<?php
require_once 'auth.php';
checkAuth();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Item - Gerenciador de Itens</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Gerenciador de Itens</h1>
            <div class="user-info">
                <a href="dashboard.php" class="btn-secondary">Voltar</a>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="form-card">
            <h2>Incluir Novo Registro</h2>
            <form action="actions.php?action=adicionar" method="POST">
                <div class="form-group">
                    <label for="nome">Nome do Item</label>
                    <input type="text" name="nome" id="nome" required placeholder="Ex: Cadeira de Escritório">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" rows="4" placeholder="Detalhes sobre o item..."></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary">Salvar Registro</button>
                    <a href="dashboard.php" class="btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
