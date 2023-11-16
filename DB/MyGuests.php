<?php 
    class MyGuests{
        private $id;
        private $firstName;
        private $lastName;
        private $email;
        private $reg_date;

        function __construct($id,$firstName,$lastName,$email,$reg_date){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->reg_date = $reg_date;
        }
        function __toString(){
            $str = '<br>ID: '.$this->id.'<br>First name: '.$this->firstName
            .'<br>Last name: '.$this->lastName.'<br>Email:'.$this->email
            .'<br>Registration date: '.$this->reg_date;
            return $str;
        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getFirstName()
        {
                return $this->firstName;
        }

        public function setFirstName($firstName)
        {
                $this->firstName = $firstName;

                return $this;
        }

        public function getLastName()
        {
                return $this->lastName;
        }

        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getReg_date()
        {
                return $this->reg_date;
        }

        public function setReg_date($reg_date)
        {
                $this->reg_date = $reg_date;

                return $this;
        }

        
    }

?>