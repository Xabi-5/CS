<?php 
interface  interfaz{
    public function mostrar(string $str);
}

class clase implements interfaz{
    public function __construct()
    {
        
    }
    public function mostrar(string $str){
        echo $str;
    }
}

$clase =  new Clase;

$clase->mostrar('Example');