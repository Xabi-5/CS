<?php

class Calculator{
    private  int $constante = 3;
    private int $numero;

    public function __construct(int $numero){
        $this->numero = $numero;
    }

    public function multiplyConstante(int $x){
        return $this->constante * $x;
    }

    public function multiplyNumero(int $x){
        return $this->numero * $x;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }


}

$calculator = new Calculator(7);

echo $calculator->multiplyConstante(50).' ';

echo $calculator->multiplyNumero(50);


