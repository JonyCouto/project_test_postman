<?php 
    class Product{
        private static $urlData = '../data/data.json';
        public static function getAll(){ 
            $data = file_get_contents(self::$urlData);
            return $data;
        }
        public static function getById($data){
            $dataJson = file_get_contents(self::$urlData);
            $dataAssoc = json_decode($dataJson, true);
            foreach ($dataAssoc as $el) {
                if ($el['id'] == $data['id']){
                    return $el;
                } 
            }
            return null;
        }
        public static function doShop($data){
            $response = self::getById($data);
            if (is_null($response)){
                return $response = '{"msg": "Opa, produto não encontrado!"}';
            } else {
                if ($response['quantity'] >= $data['quantity']){
                    return $response = '{"msg": "Parabéns pela compra!"}';
                } else {
                    return $response = '{"msg": "Opa, essa quantidade não está disponível em estoque"}';
                }
            }
        }
    }
?>