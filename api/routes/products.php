<?php
    require_once('../class/Product.php');
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method){
        case 'GET':
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET');
            // servir dados
            $response = Product::getAll();
            echo $response;
            break;
        case 'POST':
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST');
            // enviar um pedido de compra
            $data = $_POST;
            $response = Product::doShop($data);
            echo $response;
            break;
        case 'OPTIONS':
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST');
            break;
        default:
            echo '{"Erro:" "Método não autorizado!"}';
            break;
    }
?>