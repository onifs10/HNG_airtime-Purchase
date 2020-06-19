<?php


namespace Wallet;


class TestClass
{
    public static function testNetwork($input){
        if($input == "Select Network"){
            throw new \PDOException('Pls select Network');
        }else{
            return $input;
        }
    }
    public static function Country($input){
        if($input == "Select Country"){
            throw new \PDOException('Pls select Country');
        }else{
            return $input;
        }

    }
    public static function number($input){
        if(empty($input)){
            throw new \PDOException('Pls input number');
        }else{
            return $input;
        }
    }public static function amount($input){
        if(empty($input)){
            throw new \PDOException('Pls input amount');
        }else{
            return $input;
        }
    }

}