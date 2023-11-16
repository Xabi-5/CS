<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function driverSidebar(){
    echo '<div style="width: 15%; height:600px; position: absolute; right: 0;">'
    .'<nav class="rightNavMenu"><a class="rightNavs" href="index.php?load=drivers&command=add">Add</a>'.
    '<a class="rightNavs" href="index.php?load=drivers&command=update">Update</a>'.
    '<a class="rightNavs" href="index.php?load=drivers&command=delete">Delete</a>'.
    '</nav></div></div>';
}

if(isset($_GET["command"])){
    if($_GET['command']=='add'){
            try{
                $con = new DBmanager;
                $con->openConnection();
                $arrayDrivers = $con->listDrivers();
                $con->closeConnection();
                $arrayNums = array();
                foreach($arrayDrivers as $driver){
                    array_push($arrayNums, $driver->getDriverNumber());
                }
                $arrayPossibleNums = array_diff(range(1,100), $arrayNums);

                echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Add a driver</h2>';
                echo '<form action="" method="post">';
                echo '<label for="idDriverNumber">Number:</label> <select id="idDriverNumber" name="driverNumber" required> <br><br>';
                foreach($arrayPossibleNums as $num){
                    echo '<option value="'.$num.'">'.$num.'</option>';
                }
                echo '</select><br><br>';
                echo '<label for="idName">Name:</label>  <input type="text" id="idName" name="name" required><br><br>';
                echo '<label for="idSurname">Surname:</label>  <input type="text" id="idSurname" name="surname" required><br><br>';
                echo '<label for="idAge">Age:</label>  <input type="text" id="idAge" name="age" required><br><br>';
                echo '<label for="idCountry">Country:</label>  <input type="text" id="idCountry" name="country" required><br><br>';
                echo '<input type="submit" value="Add driver">';
                echo '</form>';
                driverSidebar();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
            if(isset($_POST['driverNumber'])){
                try{
                    $driver = new Driver;
                    $driver->assignValues(test_input($_POST['driverNumber']), test_input($_POST['name']), test_input($_POST['surname']),test_input($_POST['age']), test_input($_POST['country']));
                    $con = new DBmanager;
                    $con->openConnection();
                    $con->addDriver($driver);
                    $con->closeConnection();
                    echo '<p class="success">Driver successfully added!</p>';
                    
    
                }catch(Exception $e){
                    echo 'An error occurred: '.$e->getMessage();
                }
            }
            
        
    }elseif($_GET['command']=='update'){
        try{
            $con = new DBmanager;
            $con->openConnection();
            $arrayDrivers = $con->listDrivers();
            $con->closeConnection();
            $arrayNums = array();
            foreach($arrayDrivers as $driver){
                array_push($arrayNums, $driver->getDriverNumber());
            }
            echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Update a driver</h2>';
            echo '<form action="" method="post">';
            echo '<label for="idDriverNumber">Number:</label> <select id="idDriverNumber" name="driverNumber" required> <br><br>';
            foreach($arrayNums as $num){
                echo '<option value="'.$num.'">'.$num.'</option>';
            }
            echo '</select><br><br>';
            echo '<label for="idName">Name:</label>  <input type="text" id="idName" name="name" required><br><br>';
            echo '<label for="idSurname">Surname:</label>  <input type="text" id="idSurname" name="surname" required><br><br>';
            echo '<label for="idAge">Age:</label>  <input type="text" id="idAge" name="age" required><br><br>';
            echo '<label for="idCountry">Country:</label>  <input type="text" id="idCountry" name="country" required><br><br>';
            echo '<input type="hidden" name="load" value="drivers">';
            echo '<input type="hidden" name="command" value="update">';
            echo '<input type="submit" value="Update driver">';
            echo '</form>';
            driverSidebar();
            
            
        }catch(Exception $e){
            echo 'An error occurred: '.$e->getMessage();
        }
        if(isset($_POST['driverNumber'])){
            try{
                $driver = new Driver;
                $driver->assignValues(test_input($_POST['driverNumber']), test_input($_POST['name']), test_input($_POST['surname']),
                test_input($_POST['age']), test_input($_POST['country']));
                $con = new DBmanager;
                $con->openConnection();
                $con->updateDriver($driver);
                $con->closeConnection();
                echo '<p class="success">Driver successfully updated!</p>';

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
        }

    }elseif($_GET['command']=='delete'){

        try{
            driverSidebar();
            $con = new DBmanager;
            $con->openConnection();
            $arrayDrivers = $con->listDrivers();
            $con->closeConnection();
            echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Delete a driver</h2>';
            echo '<form action="" method="post">';
            echo '<label for="idDriverNumber">Driver to delete:</label> <select id="idDriverNumber" name="driverNumber" required> <br><br>';
            foreach($arrayDrivers as $driver){
                echo '<option value="'.$driver->getDriverNumber().'">'.$driver->getDriverNumber().'. '.$driver->getName().' '.$driver->getSurname().'</option>';
            }
            echo '</select><br><br>';
            echo '<input type="submit" value="Delete driver">';
            echo '</form>';
            
        }catch(Exception $e){
            echo 'An error occurred: '.$e->getMessage();
        }
        if(isset($_POST['driverNumber'])){
            try{    
                $con = new DBmanager;
                $con->openConnection();
                $con->removeDriver(test_input($_POST['driverNumber']));
                $con->closeConnection();
                echo '<p class="success">Driver successfully deleted!</p>';
            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
        }
    }

}else{
    echo '<div style="height:600px"><div style="width: 85%;height:100%; float:left;display: flex; align-items: center; flex-direction: column">';
    try{
        echo '<h2 class="tableTitle">Drivers</h2>';
        $con = new DBmanager;
        $con->openConnection();
        echo '<table style="text-align:left; width:60%;"><tr>';
        echo '<th>Number</th>';
        echo '<th>Name</th>';
        echo '<th>Age</th>';
        echo '<th>Country</th>';
        echo '</tr>';
        $drivers = $con->listDrivers();
        $con->closeConnection(); 
        foreach ($drivers as $driver){
            echo '<tr>';
            echo '<td>'. $driver->getDriverNumber().'</td>';
            echo '<td>'. $driver->getName().' '. $driver->getSurname().'</td>';
            echo '<td>'. $driver->getAge().'</td>';
            echo '<td>'. $driver->getCountry().'</td></tr>';
        }
        echo'</table><br><br></div>';
        driverSidebar();
            

    }catch(Exception $e){
        echo 'An error occurred: '.$e->getMessage();
    }
    
}

?>