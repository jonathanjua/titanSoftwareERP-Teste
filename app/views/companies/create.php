<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Empresa</title>
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
        .form-group input {
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
            let isValid = true;

            // Limpar mensagens de erro
            document.getElementById('nomeError').textContent = '';

            // Validar campo Nome
            if (!nomeField.value.trim()) {
                document.getElementById('nomeError').textContent = 'O nome da empresa é obrigatório.';
                isValid = false;
            } else if (nomeField.value.length > 40) {
                document.getElementById('nomeError').textContent = 'O nome da empresa deve ter no máximo 40 caracteres.';
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
        <h1>Cadastrar Empresa</h1>
        <form method="POST" action="/company/store" onsubmit="validateForm(event)">
            <div class="form-group">
                <label for="nome">Nome da Empresa:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome da empresa">
                <div class="error" id="nomeError"></div>
            </div>
            <div class="form-actions">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
