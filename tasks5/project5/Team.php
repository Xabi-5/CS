<?php 
    class Team{
        private $teamID;
        private $name;
        private $car;
        private $driver1;
        private $driver2;
        private $colour;
        private $country;
        private $headquarters;

        public function __construct(){}

        public function setValues($name, $car, $driver1, $driver2, $colour, $country, $headquarters){
            $this->name = $name;
            $this->car = $car;
            $this->driver1 = $driver1;
            $this->driver2 = $driver2;
            $this->colour = $colour;
            $this->country = $country;
            $this->headquarters = $headquarters;
        }

        /**
         * Get the value of teamID
         */ 
        public function getTeamID()
        {
                return $this->teamID;
        }

        /**
         * Set the value of teamID
         */ 
        public function setTeamID($teamID)
        {
                $this->teamID = $teamID;
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
         * Get the value of car
         */ 
        public function getCar()
        {
                return $this->car;
        }

        /**
         * Set the value of car
         */ 
        public function setCar($car)
        {
                $this->car = $car;
        }

        /**
         * Get the value of driver1
         */ 
        public function getDriver1()
        {
                return $this->driver1;
        }

        /**
         * Set the value of driver1
         */ 
        public function setDriver1($driver1)
        {
                $this->driver1 = $driver1;
        }

        /**
         * Get the value of driver2
         */ 
        public function getDriver2()
        {
                return $this->driver2;
        }

        /**
         * Set the value of driver2
         */ 
        public function setDriver2($driver2)
        {
                $this->driver2 = $driver2;
        }

        /**
         * Get the value of colour
         */ 
        public function getColour()
        {
                return $this->colour;
        }

        /**
         * Set the value of colour
         */ 
        public function setColour($colour)
        {
                $this->colour = $colour;
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
         * Get the value of headquarters
         */ 
        public function getHeadquarters()
        {
                return $this->headquarters;
        }

        /**
         * Set the value of headquarters
         */ 
        public function setHeadquarters($headquarters)
        {
                $this->headquarters = $headquarters;
        }
    }
?>