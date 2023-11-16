<?php
class MyGuests{
  private $id;
  private $firstName;
  private $lastName;
  private $email;
  private $reg_date;
  function __toString(){
    $cadea= "<br>ID: ".$this->id." <br>First name: ".$this->firstName;
    $cadea.="<br>Last name: $this->lastName <br>Email: $this->email";
    $cadea.="<br>Reg date: $this->reg_date";
    return $cadea;
  }

  function getId(){
    return $this->id;
  }
  function setId($id){
    $this->id=$id;
  }
  function getFirstName(){
    return $this->firstName;
  }
  function setFirstName($firstName){
    $this->firstName=$firstName;
  }
  function getLastName(){
    return $this->lastName;
  }
  function setLastName($lastName){
    $this->lastName=$lastName;
  }
  function getEmail(){
    return $this->email;
  }
  function setEmail($email){
    $this->email=$email;
  }
  function getReg_date(){
    return $this->reg_date;
  }
  function setReg_date($reg_date){
    $this->reg_date=$reg_date;
  }
}//class
class Operations{
  private $conn;
  function __construct(){
    $this->openConnection();
  }
  function openConnection(){
    $servername = "localhost";
    $username = "userweb";
    $password = "abc123.";
    $dbName = "exemplo";
    $this->conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  function closeConnection(){
    $this->conn = null;
  }
  //Function that receives an object of MyGuest and adds a guest in the database using that information
  function addMyGuest($myGuest){
    $this->conn->beginTransaction();
    $stmt = $this->conn->prepare("insert into MyGuests (firstname, lastname, email, reg_date) VALUES (?, ?, ?, ?)");
    $firstName = $myGuest->getFirstName();
    $lastName = $myGuest->getLastName();
    $email = $myGuest->getEmail();
    $reg_date = $myGuest->getReg_date();
    $stmt->execute([$firstName, $lastName, $email, $reg_date]);
    $numberOfAddedRows = $stmt->rowCount();
    $this->conn->commit();
    return $numberOfAddedRows;
  }
  function updateMyGuest($guest){
    $update = $this->conn->prepare("update MyGuests set firstname=?, lastname=?, email=?, reg_date=? where id=?");
    $update->execute([$guest->getFirstname(), $guest->getLastname(), $guest->getEmail(), $guest->getReg_date(), $guest->getId()]);
    $numberOfModifiedRows = $update->rowCount();
    return $numberOfModifiedRows;
  }
  function deleteMyGuest($delID){
    $delete = $this->conn->prepare("delete from MyGuests where id=?");
    $delete->execute([$delID]);
    $numberOfDeletedRows = $delete->rowCount();
    return $numberOfDeletedRows;
  }
  //Function that receives an id, brings the data from the database and returns the guest with that id
  function getMyGuest($id){
    //QUERY a row of data
    $sqlString = "select id, firstname, lastname, email, reg_date from MyGuests where id=?";
    $consulta = $this->conn->prepare($sqlString);
    $consulta->execute([$id]);
    //Fetch the row into the MyGuests object
    $myGuest = $consulta->fetchObject('MyGuests');
    return $myGuest;
  }

  function getMyGuest2($id){
    //QUERY a row of data
    $sqlString = "select id, firstname, lastname, email, reg_date from MyGuests where id=?";
    $consulta = $this->conn->prepare($sqlString);
    $consulta->execute([$id]);
    $tableGuest = $consulta->fetch();
    echo "EXECUTION getMyGuest2: ".$tableGuest["firstname"]."-".$tableGuest["email"];
  }

  //Query all guests from the database
  //We have defined a class that represents a table of the database
  //The properties of the class have exactly the same name as the fields of the table
  //The class must have a constructor with no arguments
  //fetchObject returns an object of the class that represents the table.
  function getAllGuests(){
    $sqlString = "select id, firstname, lastname, email, reg_date from MyGuests";
    $consulta = $this->conn->prepare($sqlString);
    $consulta->execute();
    $guestList = array();
    while($myGuest = $consulta->fetchObject('MyGuests')){
      $guestList[] = $myGuest;
    }
    return $guestList;
  }
}//class
?>