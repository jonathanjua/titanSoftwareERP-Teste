<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .menu {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }
        .menu a {
            text-decoration: none;
            background: #007BFF;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        .menu a:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Funcionários Cadastrados</h1>

        <!-- Menu de Navegação -->
        <div class="menu">
            <a href="/employees/create">Cadastrar Funcionário</a>
            <a href="/company/create">Cadastrar Empresa</a>
        </div>

        <!-- Tabela de Funcionários -->
        <?php if (!empty($employees)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Empresa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?= htmlspecialchars($employee['id_funcionario']) ?></td>
                            <td><?= htmlspecialchars($employee['nome']) ?></td>
                            <td><?= htmlspecialchars($employee['cpf']) ?></td>
                            <td><?= htmlspecialchars($employee['email']) ?></td>
                            <td><?= htmlspecialchars($employee['company_name']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum funcionário cadastrado no momento.</p>
        <?php endif; ?>
    </div>
</body>
</html>
