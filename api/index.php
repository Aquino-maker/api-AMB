<?php 
    //Preparando a requisição

    $data = [];
    
    date_default_timezone_set('America/Sao_Paulo');
    $invalid_Option = false;

    //Requisição
    if(isset($_GET['option'])){
        switch($_GET['option']){
            case 'status';
            define_response($data, 'API is running OK!');
            $invalid_Option = true;
            break;

            case 'time';
            time_response($data,  date('d/m/Y H:i:s'));
            $invalid_Option = true;
            break;
        }
    
        if(!$invalid_Option){
            echo 'Invalid Option';
        }
    }

    //Resposta
    response($data);

    function define_response(&$data, $stats){
       
        $data['status'] = 'SUCCESS';
        $data['data'] = $stats;
    }

    function time_response(&$data, $datetime){
        $data['time'] =  $datetime;
    }


    function response($data){
    header("Content-Type:application/json");
    echo json_encode($data);
}   
?>