<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php 
    include 'Driver.php';
    include 'Car.php';
    include 'Team.php';
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
            $this->conn = null;
        }

        public function addDriver(Driver $driver){
            try{
                $this->conn->beginTransaction();
                $query = $this->conn->prepare("insert into driver (driverNumber, name, surname, age, country) 
                VALUES (?, ?, ?, ?, ?)");
                $driverNumber = $driver->getDriverNumber();
                $name = $driver->getName();
                $surname = $driver->getSurname();
                $age  = $driver->getAge();
                $country = $driver->getCountry();
                $query->execute([$driverNumber, $name, $surname, $age, $country]);
                $numberOfAddedRows = $query->rowCount();
                $this->conn->commit();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function getDriver($driverNumber){
            try{
                $sqlString = "select driverNumber,name, surname, age, country from driver where driverNumber=?";
                $query = $this->conn->prepare($sqlString);
                $query->execute([$driverNumber]);
                $driver = $query->fetchObject('Driver');
                return $driver;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
           
        }
        public function removeDriver($driverNumber){
            try{
                $sqlString = "delete from driver where driverNumber = ?";
                $query = $this->conn->prepare($sqlString);
                $query->execute([$driverNumber]);
                $numberOfAddedRows = $query->rowCount();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function updateDriver(Driver $driver){
            try{
                $this->conn->beginTransaction();
                $query = $this->conn->prepare("update driver set name =?, surname =?, age =?, country=? where driverNumber=?");
                $query->execute([$driver->getName(), $driver->getSurname(), $driver->getAge(), $driver->getCountry(), $driver->getDriverNumber()]);
                $numberOfAddedRows = $query->rowCount();
                $this->conn->commit();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function listDrivers(){
            try{
                $sqlString = "select driverNumber, name, surname, age, country from driver";
                $query = $this->conn->prepare($sqlString);
                $query->execute();
                $driverList = array();
                while($driver = $query->fetchObject('Driver')){
                    $driverList[] = $driver;
                }
                return $driverList;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
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
                $sqlString = "select * from car";
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

        public function addTeam(Team $team){

            try{
                $this->conn->beginTransaction();
                $query = $this->conn->prepare("insert into team (name, colour, country, 
                headquarters, driver1, driver2, car) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $name = $team->getName();
                $colour = $team->getColour();
                $country = $team->getCountry();
                $hq = $team->getHeadquarters();
                $driver1 = $team->getDriver1();
                $driver2 = $team->getDriver2();
                $car = $team->getCar();
                $query->execute([$name, $colour, $country, $hq, $driver1, $driver2, $car]);
                $numberOfAddedRows = $query->rowCount();
                $this->conn->commit();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function getTeam(String $name){
            try{
                $sqlString = "select * from team where name like ?";
                $query = $this->conn->prepare($sqlString);
                $query->execute([$name]);
                $team = $query->fetchObject('Team');
                return $team;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function removeTeam(int $teamID){
            try{
                $sqlString = "delete from team where teamID = ?";
                $query = $this->conn->prepare($sqlString);
                $query->execute([$teamID]);
                $numberOfAddedRows = $query->rowCount();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function updateTeam(Team $team){
            try{
                $this->conn->beginTransaction();
                $query = $this->conn->prepare("update team set name =?, colour =?, country=?, 
                headquarters =?, driver1=?, driver2=?, car=? where teamID = ?");
                $query->execute([$team->getName(),  $team->getColour(), $team->getCountry(),
                $team->getHeadquarters(), $team->getDriver1(), $team->getDriver2(),
                $team->getCar(), $team->getTeamID()]);
                $numberOfAddedRows = $query->rowCount();
                $this->conn->commit();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }
        public function listTeams(){
            try{
                $sqlString = "select teamID, name, colour, country, 
                headquarters, driver1, driver2, car from team";
                $query = $this->conn->prepare($sqlString);
                $query->execute();
                $teamList = array();
                while($team = $query->fetchObject('Team')){
                    $teamList[] = $team;
                }
                return $teamList;

            }catch(PDOException $e) {
                throw $e;
                $this->conn->rollBack();
            }
            
        }

        
    }
   
?>
</body>
</html>