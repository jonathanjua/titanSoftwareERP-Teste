<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Usuários</h1>
    <a href="/users/create">Novo Usuário</a>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?php echo htmlspecialchars($user['name']); ?> - 
                <a href="/users/<?php echo $user['id']; ?>">Detalhes</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
