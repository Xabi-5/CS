<?php 


function driverSidebar(){
    echo '<div style="width: 15%; height:600px; position: absolute; right: 0;">'
    .'<nav class="rightNavMenu"><a class="rightNavs" href="index.php?load=drivers&command=add">Add</a>'.
    '<a class="rightNavs" href="index.php?load=drivers&command=update">Update</a>'.
    '<a class="rightNavs" href="index.php?load=drivers&command=delete">Delete</a>'.
    '</nav></div></div>';
}

if(isset($_GET["command"])){
    if($_GET['command']=='add'){
        if(isset($_GET['driverNumber'])){
            try{
                $driver = new Driver;
                $driver->assignValues(test_input($_GET['driverNumber']), test_input($_GET['name']), test_input($_GET['surname']),test_input($_GET['age']), test_input($_GET['country']));
                $con = new DBmanager;
                $con->openConnection();
                $con->addDriver($driver);
                echo "Driver successfully added!";
                driverSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }

        }else{
            try{
                $con = new DBmanager;
                $con->openConnection();
                $arrayDrivers = $con->listDrivers();
                $arrayNums = array();
                foreach($arrayDrivers as $driver){
                    array_push($arrayNums, $driver->getDriverNumber());
                }
                $arrayPossibleNums = array_diff(range(1,100), $arrayNums);

                echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Add a driver</h2>';
                echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
                echo '<label for="idDriverNumber">Number:</label> <select id="idDriverNumber" name="driverNumber" required> <br><br>';
                foreach($arrayPossibleNums as $num){
                    echo '<option value="'.$num.'">'.$num.'</option>';
                }
                echo '</select><br><br>';
                echo '<label for="idName">Name:</label>  <input type="text" id="idName" name="name" required><br><br>';
                echo '<label for="idSurname">Surname:</label>  <input type="text" id="idSurname" name="surname" required><br><br>';
                echo '<label for="idAge">Age:</label>  <input type="text" id="idAge" name="age" required><br><br>';
                echo '<label for="idCountry">Country:</label>  <input type="text" id="idCountry" name="country" required><br><br>';
                echo '<input type="hidden" name="load" value="drivers">';
                echo '<input type="hidden" name="command" value="add">';
                echo '<input type="submit" value="Add driver">';
                echo '</form>';
                driverSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
            
        }
        
    }elseif($_GET['command']=='update'){
        if(isset($_GET['driverNumber'])){
            try{
                $driver = new Driver;
                $driver->assignValues(test_input($_GET['driverNumber']), test_input($_GET['name']), test_input($_GET['surname']),
                test_input($_GET['age']), test_input($_GET['country']));
                $con = new DBmanager;
                $con->openConnection();
                $con->updateDriver($driver);
                echo "Driver successfully updated!";
                driverSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
           
            

        }else{
            try{
                $con = new DBmanager;
                $con->openConnection();
                $arrayDrivers = $con->listDrivers();
                $arrayNums = array();
                foreach($arrayDrivers as $driver){
                    array_push($arrayNums, $driver->getDriverNumber());
                }
                echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Update a driver</h2>';
                echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
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
                $con->closeConnection();
                
            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
           
        }


    }elseif($_GET['command']=='delete'){
        if(isset($_GET['driverNumber'])){
            try{
                $con = new DBmanager;
                $con->openConnection();
                $con->removeDriver(test_input($_GET['driverNumber']));
                echo "Driver successfully deleted!";
                driverSidebar();
                $con->closeConnection();
            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
           
        }else{
            try{
                $con = new DBmanager;
                $con->openConnection();
                $arrayDrivers = $con->listDrivers();
                echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Delete a driver</h2>';
                echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
                echo '<label for="idDriverNumber">Driver to delete:</label> <select id="idDriverNumber" name="driverNumber" required> <br><br>';
                foreach($arrayDrivers as $driver){
                    echo '<option value="'.$driver->getDriverNumber().'">'.$driver->getDriverNumber().'. '.$driver->getName().' '.$driver->getSurname().'</option>';
                }
                echo '</select><br><br>';
                echo '<input type="hidden" name="load" value="drivers">';
                echo '<input type="hidden" name="command" value="delete">';
                echo '<input type="submit" value="Delete driver">';
                echo '</form>';
                driverSidebar();
                $con->closeConnection();

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
        foreach ($drivers as $driver){
            echo '<tr>';
            echo '<td>'. $driver->getDriverNumber().'</td>';
            echo '<td>'. $driver->getName().' '. $driver->getSurname().'</td>';
            echo '<td>'. $driver->getAge().'</td>';
            echo '<td>'. $driver->getCountry().'</td></tr>';
        }
        echo'</table><br><br></div>';
        driverSidebar();
        $con->closeConnection();     

    }catch(Exception $e){
        echo 'An error occurred: '.$e->getMessage();
    }
    
}

?>