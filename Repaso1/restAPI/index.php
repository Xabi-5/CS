<?php 
    declare(strict_types= 1);

    //Cada vez que encontre unha clases que non sepa, irá a buscala polo nome no
    //ficheiro seleccionado e vai a cargala automáticamente
    spl_autoload_register(function ($class) {
        require __DIR__ . "/src/$class.php";
    });

    //Maneja as excepcións que se produzan coa DB
    // set_error_handler("ErrorHandler::handleError");
    // set_exception_handler("ErrorHandler::handleException");

    //Devolve todas as requests en JSON
    header("Content-type: application/json; charset=UTF-8");

    $parts = explode("/", $_SERVER['REQUEST_URI']);
    if($parts[2] != "products"){
        http_response_code(404);
        exit;
    }
    $id = $parts[3] ?? null;

    $database = new Database("localhost", "review", "gestor", "abc123.");

    $database->getConnection();
    
    $gateway = new ProductGateway($database);


    $controller = new ProductController($gateway);

    $controller->processRequest($_SERVER['REQUEST_METHOD'], $id);

    