<?php

require_once '../MyApp/autoload.php';


$rota = $_SERVER['REQUEST_URI'];

MyApp\Core\Router::createRoute("/do", function() {
    $f = new MyApp\Core\HelloWorld();
    $f->doSomething();
});

MyApp\Core\Router::createRoute("/else", function() {
    $f = new MyApp\Core\HelloWorld();
    $f->doSomethingElse();
});

MyApp\Core\Router::createRoute("/blah", function() {
    echo "Oi eu sou outra rota!";
});

MyApp\Core\Router::createRoute("/", function() {
    //phpinfo();
    $conn = MyApp\Services\Conexao::getInstance()->getPdo();
    $dao = new MyApp\DAO\DaoUser($conn);
    $dao->getAllUser();
    echo "Wellcome";
});

MyApp\Core\Router::executeRoute($rota);
