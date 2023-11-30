<?php 
    class User{
        private int $id; private string $dni;
        private string $name;
         private string $address;
         private string $login;
         private string $password;
        public function __construct(){

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
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of dni
         */ 
        public function getDni()
        {
                return $this->dni;
        }

        /**
         * Set the value of dni
         *
         * @return  self
         */ 
        public function setDni($dni)
        {
                $this->dni = $dni;

                return $this;
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
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

         /**
          * Get the value of address
          */ 
         public function getAddress()
         {
                  return $this->address;
         }

         /**
          * Set the value of address
          *
          * @return  self
          */ 
         public function setAddress($address)
         {
                  $this->address = $address;

                  return $this;
         }

         /**
          * Get the value of login
          */ 
         public function getLogin()
         {
                  return $this->login;
         }

         /**
          * Set the value of login
          *
          * @return  self
          */ 
         public function setLogin($login)
         {
                  $this->login = $login;

                  return $this;
         }

         /**
          * Get the value of password
          */ 
         public function getPassword()
         {
                  return $this->password;
         }

         /**
          * Set the value of password
          *
          * @return  self
          */ 
         public function setPassword($password)
         {
                  $this->password = $password;

                  return $this;
         }
    }