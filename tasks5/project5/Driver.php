<?php
    class Driver{
        private $name;
        private $surname;
        private $age;
        private $driverNumber;
        private $country;

        public function __construct(){

        }
        /**
         * Sets all the values of a driver except driverID
         */
        public function assignValues($driverNumber, $name, $surname, $age, $country){
            $this->driverNumber = $driverNumber;
            $this->name = $name;
            $this->surname = $surname;
            $this->age = $age;
            $this->country = $country;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
            return $this->name;
        }

        /**
         * Set the value of name
         */ 
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * Get the value of surname
         */ 
        public function getSurname()
        {
            return $this->surname;
        }

        /**
         * Set the value of surname
         */ 
        public function setSurname($surname)
        {
            $this->surname = $surname;
        }

        /**
         * Get the value of age
         */ 
        public function getAge()
        {
            return $this->age;
        }

        /**
         * Set the value of age
         */ 
        public function setAge($age)
        {
            $this->age = $age;
        }

        /**
         * Get the value of country
         */ 
        public function getCountry()
        {
            return $this->country;
        }

        /**
         * Set the value of country
         */ 
        public function setCountry($country)
        {
            $this->country = $country;
        }

        /**
         * Get the value of driverNumber
         */ 
        public function getDriverNumber()
        {
            return $this->driverNumber;
        }

        /**
         * Set the value of driverNumber
         */ 
        public function setDriverNumber($driverNumber)
        {
            $this->driverNumber = $driverNumber;
        }
    }
?>