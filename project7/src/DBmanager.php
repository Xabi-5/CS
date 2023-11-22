<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php 
    
    include 'Car.php';
    
    class DBmanager{
        
        private PDO $conn;

        public function openConnection(){
            try{
                $servername = "localhost";
                $username = "f1manager";
                $password = "abc123.";
                $dbName = "formula1";
                $this->conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo "DB Error: " . $e->getMessage();
                $this->conn->rollBack();
            }
       
        }

        public function closeConnection(){
            unset($this->conn);
        }


        public function addCar(Car $car){
            try{
                $this->conn->beginTransaction();
                $query = $this->conn->prepare("insert into car (chassis, engine, engineManufacturer) 
                VALUES (?, ?, ?)");
                $chassis = $car->getChassis();
                $engine = $car->getEngine();
                $engineManufacturer = $car->getEngineManufacturer();
                $query->execute([$chassis, $engine, $engineManufacturer]);
                $numberOfAddedRows = $query->rowCount();
                $this->conn->commit();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function getCar(int $carID){
            try{
                $sqlString = "select * from car where carID = ?";
                $query = $this->conn->prepare($sqlString);
                $query->execute([$carID]);
                $car = $query->fetchObject('Car');
                return $car;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function removeCar(int $carID){
            try{
                $sqlString = "delete from car where carID = ?";
                $query = $this->conn->prepare($sqlString);
                $query->execute([$carID]);
                $numberOfAddedRows = $query->rowCount();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function updateCar(Car $car){
            try{
                $this->conn->beginTransaction();
                $query = $this->conn->prepare("update car set chassis =?, engine =?, engineManufacturer =? where carID = ?");
                $query->execute([$car->getChassis(), $car->getEngine(), $car->getEngineManufacturer(), $car->getCarID()]);
                $numberOfAddedRows = $query->rowCount();
                $this->conn->commit();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function listCars(){
            try{
                $sqlString = "SELECT * FROM car";
                $query = $this->conn->prepare($sqlString);
                $query->execute();
                $carList = array();
                while($car = $query->fetchObject('Car')){
                    $carList[] = $car;
                }
                return $carList;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }

    }

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
</body>
</html>