<?php
require_once 'auth.php';
checkAuth();
require_once 'config/db.php';

$stmt = $pdo->query("SELECT * FROM itens ORDER BY data_criacao DESC");
$itens = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gerenciador de Itens</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Gerenciador de Itens</h1>
            <div class="user-info">
                Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>! 
                <a href="logout.php" class="btn-logout">Sair</a>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="actions-bar">
            <h2>Lista de Itens</h2>
            <a href="adicionar.php" class="btn-primary">Incluir Novo Registro</a>
        </div>

        <?php if (isset($_GET['sucesso'])): ?>
            <p class="success-msg">Item adicionado com sucesso!</p>
        <?php endif; ?>
        <?php if (isset($_GET['excluido'])): ?>
            <p class="warning-msg">Item excluído com sucesso.</p>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($itens) > 0): ?>
                    <?php foreach ($itens as $item): ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo htmlspecialchars($item['nome']); ?></td>
                            <td><?php echo htmlspecialchars($item['descricao']); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($item['data_criacao'])); ?></td>
                            <td>
                                <a href="actions.php?action=excluir&id=<?php echo $item['id']; ?>" 
                                   class="btn-danger" 
                                   onclick="return confirm('Tem certeza que deseja excluir este item?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nenhum item cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
