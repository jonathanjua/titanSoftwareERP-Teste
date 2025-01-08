<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        .form-actions {
            text-align: center;
        }
        .form-actions button {
            padding: 10px 20px;
            background-color: #007BFF;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .form-actions button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function validateForm(event) {
            const nomeField = document.getElementById('nome');
            const cpfField = document.getElementById('cpf');
            const emailField = document.getElementById('email');
            const idEmpresaField = document.getElementById('id_empresa');
            let isValid = true;

            // Limpar mensagens de erro
            document.querySelectorAll('.error').forEach(e => e.textContent = '');

            // Validar Nome
            if (!nomeField.value.trim()) {
                document.getElementById('nomeError').textContent = 'O nome é obrigatório.';
                isValid = false;
            }

            // Validar CPF
            if (!cpfField.value.trim()) {
                document.getElementById('cpfError').textContent = 'O CPF é obrigatório.';
                isValid = false;
            } else if (cpfField.value.length !== 11) {
                document.getElementById('cpfError').textContent = 'O CPF deve ter 11 dígitos.';
                isValid = false;
            }

            // Validar Email
            if (!emailField.value.trim()) {
                document.getElementById('emailError').textContent = 'O email é obrigatório.';
                isValid = false;
            } else if (!/\S+@\S+\.\S+/.test(emailField.value)) {
                document.getElementById('emailError').textContent = 'O email não é válido.';
                isValid = false;
            }

            // Validar Empresa
            if (!idEmpresaField.value) {
                document.getElementById('idEmpresaError').textContent = 'Selecione uma empresa.';
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h1>Cadastrar Funcionário</h1>
        <form method="POST" action="/employees/store" onsubmit="validateForm(event)">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome">
                <div class="error" id="nomeError"></div>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="Digite o CPF (somente números)" maxlength="11">
                <div class="error" id="cpfError"></div>
            </div>
            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" id="rg" name="rg" placeholder="Digite o RG">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Digite o email">
                <div class="error" id="emailError"></div>
            </div>
            <div class="form-group">
                <label for="id_empresa">Empresa:</label>
                <select id="id_empresa" name="id_empresa">
                    <option value="">Selecione uma empresa</option>
                    <?php foreach ($companys as $company): ?>
                        <option value="<?= htmlspecialchars($company['id_empresa']) ?>">
                            <?= htmlspecialchars($company['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="error" id="idEmpresaError"></div>
            </div>
            <div class="form-actions">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
