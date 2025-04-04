<?php 

    define('API_BASE', 'http://localhost/api-AMB/api/?option=');

    echo '<h1>Aplicação</h1>';

    //verifica se a requisição é válida
    if($resultado['status']=='ERROR'){
        die('Erro na requisição!');
    }

    



    function api_request($option){
        $cliente = curl_init(API_BASE . $option);
        curl_setopt($cliente, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($cliente);
        return json_decode($response, true);
    }
?>