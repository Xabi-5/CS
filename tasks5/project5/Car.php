<?php
    class Car{
        private $chassis;
        private $carID;
        private $engine;
        private $engineManufacturer;

        public function __construct(){}

        /**
         * Sets all the values of a car except carID
         */
        public function assignValues($chassis, $engine, $engineManufacturer) {
            $this->chassis = $chassis;
            $this->engine = $engine;
            $this->engineManufacturer = $engineManufacturer;
        }

        /**
         * Get the value of chassis
         */ 
        public function getChassis()
        {
            return $this->chassis;
        }

        /**
         * Set the value of chassis

         */ 
        public function setChassis($chassis)
        {
            $this->chassis = $chassis;
        }

        /**
         * Get the value of carID
         */ 
        public function getCarID()
        {
            return $this->carID;
        }

        /**
         * Set the value of carID
         */ 
        public function setCarID($carID)
        {
            $this->carID = $carID;

        }

        /**
         * Get the value of engine
         */ 
        public function getEngine()
        {
            return $this->engine;
        }

        /**
         * Set the value of engine
         */ 
        public function setEngine($engine)
        {
            $this->engine = $engine;

        }

        /**
         * Get the value of engineManufacturer
         */ 
        public function getEngineManufacturer()
        {
                return $this->engineManufacturer;
        }

        /**
         * Set the value of engineManufacturer
         */ 
        public function setEngineManufacturer($engineManufacturer)
        {
                $this->engineManufacturer = $engineManufacturer;
        }
    }
?>