<?php 
class Student{
    private int $id;
    private string $dni;
    private string $name;
    private string $surname;
    private int $age;

    public function __construct(){
        
    }

    public function assignValues($dni,$name,$surname, $age){
        $this->dni = $dni;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
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
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
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
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }
}

//Crear base de datos

class OperationsDb{
    private PDO $conn;
    public function openConnection(){
        $servername = "localhost";
        $username = "manager";
        $password = "abc123.";
        $dbName = "school";
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function closeConnection(){
        $this->conn = null;
    }
    public function addStudent(Student $student){
        $this->conn->beginTransaction();
        $query = $this->conn->prepare("insert into student (dni, name, surname, age) VALUES (?, ?, ?, ?)");
        $dni = $student->getDni();
        $name = $student->getName();
        $surname = $student->getSurname();
        $age = $student->getAge();
        $query->execute([$dni, $name, $surname, $age]);
        $numberOfAddedRows = $query->rowCount();
        $this->conn->commit();
        return $numberOfAddedRows;
    }
    public function getStudent(String $dni){
        $sqlString = "select id, dni, name, surname, age from student where dni=?";
        $query = $this->conn->prepare($sqlString);
        $query->execute([$dni]);
        $student = $query->fetchObject('Student');
        return $student;
    }

    public function deleteStudent(String $dni){
        $sqlString = "delete from student where dni=?";
        $query = $this->conn->prepare($sqlString);
        $query->execute([$dni]);
        $numberOfAddedRows = $query->rowCount();
        return $numberOfAddedRows;
    }

    public function modifyStudent(Student $student){
        $this->conn->beginTransaction();
        $query = $this->conn->prepare("update student set name=?, surname=?, age=? where dni = ?");
        $query->execute([$student->getName(), $student->getSurname(), $student->getAge(), $student->getDni()]);
        $numberOfAddedRows = $query->rowCount();
        $this->conn->commit();
        return $numberOfAddedRows;
    }

    public function studentsList(){
        $sqlString = "select id, dni, name, surname, age from student";
        $query = $this->conn->prepare($sqlString);
        $query->execute();
        $studentList = array();
        while($student = $query->fetchObject('student')){
            $studentList[] = $student;
        }
        return $studentList;
    }

    
}
// echo 'A';
// $stu = new Student;
// $stu->assignValues(6,"70707070K", "Jeremy", "Clarkson", 70);
// $stu2 = new Student;
// $stu2->assignValues(6,"11111111A", "Luna", "Lovegood", 21);

// $con = new OperationsDB();
// $con->openConnection();
// $arr = $con->studentsList();
// foreach($arr as $student){
//     echo $student->getName().' '.$student->getSurname();
// }
// echo $con->addStudent($stu);
// $stu3 = $con->getStudent("70707070K");
// echo $con->modifyStudent($stu2);
// echo $con->getStudent("70707070K")->getName();
// echo $con->deleteStudent("70707070K");
// echo '<br>Adding stu3'.$con->addStudent($stu).'<br>';
// echo $con->getStudent("70707070K")->getName();

// echo $con->deleteStudent("70707070K");
?>
