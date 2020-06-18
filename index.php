<?php
include_once __DIR__ . '/vendor/autoload.php';
use Wallet\Wallet;
$dotenv =  Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//die(var_dump($_SERVER));
$wallet = new Wallet($_ENV['Secret_Key']);
