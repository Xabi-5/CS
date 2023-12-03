<?php
abstract class Mostrador{
    public function mostrar(string $str){
        echo $str;
    }
}

class Clase extends Mostrador{
    public function __construct()
    {
        
    }
}

$clase = new Clase;

$clase->mostrar('Example');

//The difference is that interface methods don't have a body, and a class
//can implement multiple interfaces while  only inherting one abstract class