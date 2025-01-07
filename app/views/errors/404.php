<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro 404</title>
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: #fff;
            border-radius: 8px;
        }
        h1 {
            font-size: 2.5em;
            color: #e74c3c;
        }
        p {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
            <h1>Erro 404</h1>
            <p>A Pagina <strong> <?= $viewName ?> </strong> não foi encontrada.</p>";
        
    </div>
</body>
</html>
