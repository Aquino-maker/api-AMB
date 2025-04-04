<?php
$data = [];

date_default_timezone_set('America/Sao_Paulo');
$validOption = false;

// Verifica a opção
if (isset($_GET['option'])) {
    switch ($_GET['option']) {
        case 'status':
            define_response($data, 'API is running OK!');
            $validOption = true;
            break;

        case 'time':
            define_response($data, date('d.m.Y H:i:s'));
            $validOption = true;
            break;

        case 'random':
            $min = isset($_GET['min']) ? intval($_GET['min']) : 1;
            $max = isset($_GET['max']) ? intval($_GET['max']) : 100;

            if ($min >= $max) {
                error_response($data, 'Parâmetros inválidos: min deve ser menor que max.');
            }

            define_response($data, rand($min, $max));
            $validOption = true;
            break;
    }

    if (!$validOption) {
        error_response($data, 'Invalid Option', 404);
    }
} else {
    error_response($data, 'Parâmetro "option" ausente.', 400);
}

response($data);

// Funções
function define_response(&$data, $result) {
    $data['status'] = 'SUCCESS';
    $data['data'] = $result;
}

function error_response(&$data, $message, $status = 400) {
    $data['status'] = 'ERROR';
    $data['message'] = $message;
    response($data, $status);
}

function response($data, $status = 200) {
    header("Content-Type:application/json");
    http_response_code($status);
    echo json_encode($data);
    exit;
}
