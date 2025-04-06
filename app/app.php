<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente da API</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        h1, h2 {
            color: #333;
        }
        .response-container {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
        .response-container h3 {
            margin-top: 0;
            color: #555;
        }
        .response-container pre {
            margin: 0;
            padding: 10px;
            background-color: #eee;
            border: 1px solid #ddd;
            overflow-x: auto;
        }
        .form-container {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f5f5f5;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-container input[type="text"],
        .form-container button {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Cliente para Consumo da API</h1>

    <div class="form-container">
        <h2>Consultar Status</h2>
        <form method="GET">
            <input type="hidden" name="action" value="status">
            <button type="submit">Verificar Status</button>
        </form>
    </div>

    <div class="form-container">
        <h2>Consultar Hora</h2>
        <form method="GET">
            <input type="hidden" name="action" value="time">
            <button type="submit">Obter Hora</button>
        </form>
    </div>

    <div class="form-container">
        <h2>Gerar Número Aleatório</h2>
        <form method="GET">
            <input type="hidden" name="action" value="random">
            <label for="min">Mínimo:</label>
            <input type="text" id="min" name="min" value="1">
            <label for="max">Máximo:</label>
            <input type="text" id="max" name="max" value="100">
            <button type="submit">Gerar</button>
        </form>
    </div>

    <?php

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $api_url = 'http://localhost/api/api/index.php?option='; // Substitua por o caminho correto para o seu arquivo da API

        $url = $api_url . $action;
        if ($action === 'random' && isset($_GET['min']) && isset($_GET['max'])) {
            $url .= '&min=' . urlencode($_GET['min']) . '&max=' . urlencode($_GET['max']);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        echo '<div class="response-container">';
        echo '<h3>Resposta da API (' . $action . ')</h3>';
        echo '<p><strong>URL da Requisição:</strong> ' . htmlspecialchars($url) . '</p>';
        echo '<p><strong>Código de Status HTTP:</strong> ' . htmlspecialchars($http_code) . '</p>';
        echo '<pre>' . htmlspecialchars($response) . '</pre>';
        echo '</div>';
    }
    ?>

</body>
</html>