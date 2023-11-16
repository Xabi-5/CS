<?php 
    class Vehiculo{
        private $cor;
        private $numeroRodas;
        private $cilindrada;
        private $potencia;

        //Constructor
        function __construct($cor = null, $numeroRodas = 2, $cilindrada = 0, $potencia = 0){
            $this->cor = $cor;
            $this->numeroRodas = $numeroRodas;
            $this->cilindrada = $cilindrada;
            $this->potencia = $potencia;
        }
             
        //Getters and Setters

        /**
         * Get the value of cor
         */ 
        public function getCor()
        {
                return $this->cor;
        }

        /**
         * Set the value of cor
         *
         * @return  self
         */ 
        public function setCor($cor)
        {
                $this->cor = $cor;

                return $this;
        }

        /**
         * Get the value of numeroRodas
         */ 
        public function getNumeroRodas()
        {
                return $this->numeroRodas;
        }

        /**
         * Set the value of numeroRodas
         *
         * @return  self
         */ 
        public function setNumeroRodas($numeroRodas)
        {
                $this->numeroRodas = $numeroRodas;

                return $this;
        }

        /**
         * Get the value of cilindrada
         */ 
        public function getCilindrada()
        {
                return $this->cilindrada;
        }

        /**
         * Set the value of cilindrada
         *
         * @return  self
         */ 
        public function setCilindrada($cilindrada)
        {
                $this->cilindrada = $cilindrada;

                return $this;
        }

        /**
         * Get the value of potencia
         */ 
        public function getPotencia()
        {
                return $this->potencia;
        }

        /**
         * Set the value of potencia
         *
         * @return  self
         */ 
        public function setPotencia($potencia)
        {
                $this->potencia = $potencia;

                return $this;
        }


    }

    class Camion extends Vehiculo{
        private $eixes;
        
        //Constructor
        function __construct($cor = null, $numeroRodas = 2, $cilindrada = 0, $potencia = 0, $eixes = 0){
            parent::__construct($cor, $numeroRodas, $cilindrada, $potencia);
            $this->eixes = $eixes;
        }

        /**
         * Get the value of eixes
         */ 
        public function getEixes()
        {
                return $this->eixes;
        }

        /**
         * Set the value of eixes
         *
         * @return  self
         */ 
        public function setEixes($eixes)
        {
                $this->eixes = $eixes;

                return $this;
        }
        public function toString(){
                $str = 'Color: '.$this->getCor().' | '.'Numero rodas: '.$this->getNumeroRodas().
                ' | ' . 'Cilindrada: '.$this->getCilindrada().' | ' .'Potencia: '.$this->getPotencia().
                ' | '.'Ocupantes: '.$this->getEixes();
                return $str;
        }
    }
    class Motocicleta extends Vehiculo{
        private $ocupantes;

        //Constructor
        function __construct($cor = null, $numeroRodas = 2, $cilindrada = 0, $potencia = 0, $ocupantes = 0){
            parent::__construct($cor, $numeroRodas, $cilindrada, $potencia);
            $this->ocupantes = $ocupantes;
        }

        /**
         * Get the value of ocupantes
         */ 
        public function getOcupantes()
        {
                return $this->ocupantes;
        }

        /**
         * Set the value of ocupantes
         *
         * @return  self
         */ 
        public function setOcupantes($ocupantes)
        {
                $this->ocupantes = $ocupantes;

                return $this;
        }

        public function toString(){
                $str = 'Color: '.$this->getCor().' | '.'Numero rodas: '.$this->getNumeroRodas().
                ' | '.'Cilindrada: '.$this->getCilindrada().' | '.'Potencia: '.$this->getPotencia().
                ' | '.'Ocupantes: '.$this->getOcupantes();
                return $str;
        }
    }

    //Programa principal
    $moto = new Motocicleta('roxa', 0, 125, 25, 0);


    $moto2 = new Motocicleta('verde', 0, 125, 25, 2);

    $camion = new Camion('azul',4, 4000, 300, 2);

    $camion2 = new Camion(null,24, 15000, null, 6);

    $moto->setOcupantes(2);
    echo $moto2->getCilindrada();
    echo '<br>';
    $camion2->setPotencia(800);
    
    echo $moto->toString();
    echo '<br>';
    echo $moto2->toString();
    echo '<br>';
    echo $camion->toString();
    echo '<br>';
    echo $camion2->toString();

?>