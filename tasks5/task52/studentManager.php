<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        nav{
            display: flex;
            justify-content: left;
        }
        nav>a{
            padding-left: 50px;
            padding-right: 50px;
            text-decoration: none;
            border: 1px solid black;
            font-size: xx-large;
            background-color: green;
            color: white;
        }
        th{
            background-color: lightslategrey;
        }
        tr:nth-child(odd){
            background-color: lightgrey;
        }
    </style>
</head>
<body>


    <?php 
    include 'operationsDB.php';

    echo '<nav><a href="studentManager.php?load=select">Select</a>
                <a href="studentManager.php?load=add">Add</a>
                <a href="studentManager.php?load=update">Update</a>
                <a href="studentManager.php?load=delete">Delete</a></nav><br><br>';

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET["load"])){
            if($_GET["load"] == "select"){
                echo '<h2>Students list</h2>';
                $con = new OperationsDB;
                $con->openConnection();
                echo '<table style="text-align:left; width:100%;"><tr>';
                echo '<th>Name</th>';
                echo '<th>Surname</th>';
                echo '<th>DNI</th>';
                echo '<th>Age</th>';
                echo '</tr>';
                $arrayStudents = $con->studentsList();
                foreach ($arrayStudents as $stu){
                    echo '<tr>';
                    echo '<td>'. $stu->getName().'</td>';
                    echo '<td>'. $stu->getSurname().'</td>';
                    echo '<td>'. $stu->getDni().'</td>';
                    echo '<td>  '. $stu->getAge().'</td>';
                }
                $con->closeConnection();
                echo'</table><br><br>';

            }elseif($_GET["load"] == "add"){
                echo '<h2>Add Student</h2>';
                if(isset($_GET["DNI"])){
                    $dni = $_GET["DNI"];
                    $name = $_GET["name"];
                    $surname = $_GET["surname"];
                    $age = $_GET["age"];
                    $student = new Student();
                    $student->assignValues($dni, $name, $surname, $age);
                    $con = new OperationsDb;
                    $con->openConnection();
                    $con->addStudent($student);
                    $con->closeConnection();
                    echo 'Student added successfully!';
                }else{
                    echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
                    echo '<label for="idName">Name:</label>  <input type="text" id="idName" name="name" required><br><br>';
                    echo '<label for="idSurname">Surname:</label>  <input type="text" id="idSurname" name="surname" required><br><br>';
                    echo '<label for="idDNI">DNI:</label>  <input type="text" id="idDNI" name="DNI" required><br><br>';
                    echo '<label for="idAge">Age:</label>  <input type="text" id="idAge" name="age" required><br><br>';
                    echo '<input type="hidden" name="load" value="add">';
                    echo '<input type="submit" value="Add user">';
                    echo '</form>';
                }
               

            }elseif($_GET["load"] == "update"){
                echo '<h2>Update Student</h2>';
                if(isset($_GET["DNI"])){
                    $dni = $_GET["DNI"];
                    $name = $_GET["name"];
                    $surname = $_GET["surname"];
                    $age = $_GET["age"];
                    $student = new Student();
                    $student->assignValues($dni, $name, $surname, $age);
                    $con = new OperationsDb;
                    $con->openConnection();
                    $arrayStudents = $con->studentsList();
                    function exists($arr, $dni){
                        $result = false;
                        foreach ($arr as $stu){
                            if($stu->getDni() == $dni){
                                $result = true;
                            }
                        }
                        return $result;
                    }
                    if(exists($arrayStudents, $dni)){
                        $con->modifyStudent($student);
                        echo 'Student updated successfully!';
                    }else{
                        echo 'Student not found';
                    }
                    $con->closeConnection();
                    
                }else{
                    echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
                    echo '<label for="idName">Name:</label>  <input type="text" id="idName" name="name" required><br><br>';
                    echo '<label for="idSurname">Surname:</label>  <input type="text" id="idSurname" name="surname" required><br><br>';
                    echo '<label for="idDNI">DNI:</label>  <input type="text" id="idDNI" name="DNI" required><br><br>';
                    echo '<label for="idAge">Age:</label>  <input type="text" id="idAge" name="age" required><br><br>';
                    echo '<input type="hidden" name="load" value="update">';
                    echo '<input type="submit" value="Update user">';
                    echo '</form>';
                }

            }elseif($_GET["load"] == "delete"){
                echo '<h2>Delete Student</h2>';
                if(isset($_GET["DNI"])){
                    $dni = $_GET["DNI"];
                    $con = new OperationsDb;
                    $con->openConnection();
                    $arrayStudents = $con->studentsList();
                    function exists($arr, $dni){
                        $result = false;
                        foreach ($arr as $stu){
                            if($stu->getDni() == $dni){
                                $result = true;
                            }
                        }
                        return $result;
                    }
                    if(exists($arrayStudents, $dni)){
                        $con->deleteStudent($dni);
                        echo 'Student removed successfully!';
                    }else{
                        echo 'Student not found';
                    }
                    $con->closeConnection();
                    
                }else{
                    echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
                   
                    echo '<label for="idDNI">DNI:</label>  <input type="text" id="idDNI" name="DNI" required><br><br>';
                    echo '<input type="hidden" name="load" value="delete">';
                    echo '<input type="submit" value="Delete student">';
                    echo '</form>';
                }
            }
        }
    }

    // function fieldset(){
    //     echo '<fieldset><legend>Add a student</legend>';
    //     echo '<table>';
    //     echo '<tr><label for="addDNI">DNI:  </label><input type="text" name="addDni"><br></tr>';
    //     echo '<tr><label for="addName">Name:  </label><input type="text" name="addName"><br></tr>';
    //     echo '<tr><label for="addSurname">Surname:  </label><input type="text" name="addSurname"><br></tr>';
    //     echo '<tr><label for="addAge">Age:  </label><input type="text" name="addAge"><br></tr>';
    //     echo '</table>';
    //     echo '<input type="submit" value="Add">';
    //     echo '</fieldset>';
        
    // }

    // $con = new OperationsDB;
    // $con->openConnection();
    // echo '<h1>List of Students</h1>';
    // echo '<table><tr>';
    // echo '<th>Name</th>';
    // echo '<th>Surname</th>';
    // echo '<th>DNI</th>';
    // echo '<th>Age</th>';
    // echo '</tr>';
    // $arrayStudents = $con->studentsList();
    // foreach ($arrayStudents as $stu){
    //     printStudent($stu);
    // }
    // echo'</table><br><br>';
    // fieldset()
    
    
    //Main page showing students, three buttons at the bottom to add, delete or update 

    ?>
    
</body>
</html>