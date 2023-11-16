<?php 
    include("MyGuests.php");
    class Operations{
        private $con;
        function openConnection(){
            $servername = "localhost";
            $username = "userweb";
            $password = "abc123.";
            $dbName = "exemplo";
            
            try {
                $this->con = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
                // set the PDO error mode to exception
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        function closeConnection(){
            $this->con = null;
        }

        function __construct(){
            $this->openConnection();
        }

        function addMyGuests($myGuest){
            $this->con->beginTransaction();

            $stmt = $this->con->prepare("Insert into MyGuests (firstname, lastname, email, reg_date)");
            $firstName = $myGuest->getFirstName();
            $lastName = $myGuest->getLastName();
            $email = $myGuest->getEmail();
            $reg_date = $myGuest->getReg_date();

            $stmt->execute([$firstName, $lastName, $email, $reg_date]);
            $numberOfAddedArrows = $stmt->rowCount();
            $this->con->commit();
            return $numberOfAddedArrows;
            
        }
        function updateMyGuests($myGuest){
            $this->con->beginTransaction();

            $stmt = $this->con->prepare("update MyGuests set firstname=?, lastname=?, email=?, reg_date=? where id=?");
            $firstName = $myGuest->getFirstName();
            $lastName = $myGuest->getLastName();
            $email = $myGuest->getEmail();
            $reg_date = $myGuest->getReg_date();

            $stmt->execute([$firstName, $lastName, $email, $reg_date]);
            $numberOfAddedArrows = $stmt->rowCount();
            $this->con->commit();
            return $numberOfAddedArrows;
        }
        function getMyGuest($id){
            $sqlString = "select id, firstname, lastname, email, reg_date from MyGuests where id=?";
            $query = $this->con->prepare($sqlString);
            $query->execute([$id]);
            $tableGuest = $query->fetchObject();
            $myGuest = new MyGuests($tableGuest['id'],$tableGuest['firstname'],
                $tableGuest['lastname'],$tableGuest['email'],$tableGuest['reg_date'],);
            return $myGuest;
        }

        function getMyGuest2($id){
            $sqlString = "select id, firstname, lastname, email, reg_date from MyGuests where id=?";
            $query = $this->con->prepare($sqlString);
            $query->execute([$id]);
            $myGuest = $query->fetchObject("MyGuests");
            return $myGuest;
        }
        function getAllGuests(){
            $sqlString = "select id, firstname, lastname, email, reg_date from MyGuests";
            $query = $this->con->prepare($sqlString);
            $query->execute();
            $myGuest = $query->fetchObject("MyGuests");
            return $myGuest;
        }
      
    }

?>