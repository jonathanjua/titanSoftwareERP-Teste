<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .login-container h1 {
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
            const emailField = document.getElementById('login');
            const passwordField = document.getElementById('password');
            let isValid = true;


            document.querySelectorAll('.error').forEach(error => error.textContent = '');


            if (!emailField.value) {
                document.getElementById('loginError').textContent = 'O campo de login é obrigatório.';
                isValid = false;
            } else if (!/\S+@\S+\.\S+/.test(emailField.value)) {
                document.getElementById('loginError').textContent = 'Digite um email válido.';
                isValid = false;
            }

            if (!passwordField.value) {
                document.getElementById('passwordError').textContent = 'O campo de senha é obrigatório.';
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        }
    </script>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="auth/login" onsubmit="validateForm(event)">
            <div class="form-group">
                <label for="login">Login (Email):</label>
                <input type="email" id="login" name="login" placeholder="Digite seu email">
                <div class="error" id="loginError"></div>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" placeholder="Digite sua senha">
                <div class="error" id="passwordError"></div>
            </div>
            <div class="form-actions">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>

<script>
    function validateForm(event) {
        const emailField = document.getElementById('login');
        const passwordField = document.getElementById('password');
        let isValid = true;

        document.querySelectorAll('.error').forEach(error => error.textContent = '');

        if (!emailField.value) {
            document.getElementById('loginError').textContent = 'O campo de login é obrigatório.';
            isValid = false;
        } else if (!/\S+@\S+\.\S+/.test(emailField.value)) {
            document.getElementById('loginError').textContent = 'Digite um email válido.';
            isValid = false;
        }

        if (!passwordField.value) {
            document.getElementById('passwordError').textContent = 'O campo de senha é obrigatório.';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    }
</script>

</html>