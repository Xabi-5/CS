<?php

trait TraitMostrar{
    function mostrar(string $str){
        echo $str;
    }
}

class Clase{
    use TraitMostrar;
}

$clase = new Clase;
$clase->mostrar('Example');

//Yes,a clas can inherit from multiple traits