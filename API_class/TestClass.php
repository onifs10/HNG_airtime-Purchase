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
    public static function testCountry($input){
        if($input == "Select Country"){
            throw new \PDOException('Pls select Country');
        }else{
            return $input;
        }

    }
    public static function testNumber($input){
        if(empty($input)){
            throw new \PDOException('Pls input number');
        }else{
            return $input;
        }
    }public static function testAmount($input){
        if(empty($input)){
            throw new \PDOException('Pls input amount');
        }else{
            return $input;
        }
    }

}