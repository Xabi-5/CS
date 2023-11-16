<?php 
    class Login{
        private $id;
        private $user;
        private $userPassw;

        public function __construct($user, $userPassw){
            $this->user = $user;
            $this->userPassw = $userPassw;
        }

        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */ 
        public function setId($id)
        {
                $this->id = $id;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         */ 
        public function setUser($user)
        {
                $this->user = $user;
        }

        /**
         * Get the value of userPassw
         */ 
        public function getUserPassw()
        {
                return $this->userPassw;
        }

        /**
         * Set the value of userPassw
         */ 
        public function setUserPassw($userPassw)
        {
                $this->userPassw = $userPassw;
        }
    }

    class Example{
        private int $code;
        private string $description;

        public function __construct(int $code, String $description){
            $this->code = $code;
            $this->description = $description;
        }

        /**
         * Get the value of code
         */ 
        public function getCode()
        {
                return $this->code;
        }

        /**
         * Set the value of code
         *
         * @return  self
         */ 
        public function setCode($code)
        {
                $this->code = $code;

                return $this;
        }

        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of code
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }
    }

    class Operations{
        private PDO $con;

        public function __construct(){
            $this->openConnection();
        }

        public function openConnection(){
            try{
                $servername = "localhost";
                $username = "userweb";
                $password = "abc123.";
                $dbName = "dbname";
                $this->con = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo "DB Error: " . $e->getMessage();
                $this->con->rollBack();
            }
       
        }

        public function closeConnection(){
            unset($this->con);
        }

        public function addUser(Login $login){
            try{
                $this->con->beginTransaction();
                $query = $this->con->prepare("insert into login (id, user, userPassw) 
                VALUES (?, ?, ?)");
                $query->execute([$login->getId(), $login->getUser(), $login->getUserPassw()]);
                $numberOfAddedRows = $query->rowCount();
                $this->con->commit();
                return $numberOfAddedRows;

            }catch(PDOException $e) {
                throw $e;
                $this->con->rollBack();
            }
        }

        public function validLogin(Login $login){
            try{
                $sqlString = "select userPassw from login where user=?";
                $query = $this->con->prepare($sqlString);
                $query->execute([$login->getUser()]);
                
                $validData = $query->fetchColumn();
                if(!empty($validData)){
                    if($validData == $login->getUserPassw()){
                        
                        return true;
                        
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
                
                
            }catch(PDOException $e) {
                throw $e;
                $this->con->rollBack();
            }

        }

        
    }
?>