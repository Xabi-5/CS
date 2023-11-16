<?php 
function carSidebar(){
    echo '<div style="width: 15%; height:600px; position: absolute; right: 0;">'
    .'<nav class="rightNavMenu"><a class="rightNavs" href="index.php?load=cars&command=add">Add</a>'.
    '<a class="rightNavs" href="index.php?load=cars&command=update">Update</a>'.
    '<a class="rightNavs" href="index.php?load=cars&command=delete">Delete</a>'.
    '</nav></div></div>';
}

if(isset($_GET["command"])){
    if($_GET['command']=='add'){
        if(isset($_GET['chassis'])){
            try{
                $car = new Car;
                $car->assignValues(test_input($_GET['chassis']),test_input($_GET['engine']), test_input($_GET['engineManufacturer']));
                $con = new DBmanager;
                $con->openConnection();
                $con->addCar($car);
                echo "Car successfully added!";
                carSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
            
            
        }else{
            echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Add a car</h2>';
            echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
            echo '<label for="idChassis">Chassis:</label>  <input type="text" id="idChassis" name="chassis" required><br><br>';
            echo '<label for="idEngine">Engine:</label>  <input type="text" id="idEngine" name="engine" required><br><br>';
            echo '<label for="idManufacturer">Engine manufacturer:</label>  <input type="text" id="idManufacturer" name="engineManufacturer" required><br><br>';
            echo '<input type="hidden" name="load" value="cars">';
            echo '<input type="hidden" name="command" value="add">';
            echo '<input type="submit" value="Add car">';
            echo '</form>';
            carSidebar();
        }
        
    }elseif($_GET['command']=='update'){
        if(isset($_GET['carID'])){
            try{
                $car = new Car;
                $car->assignValues(test_input($_GET['chassis']),test_input($_GET['engine']), test_input($_GET['engineManufacturer']));
                $car->setCarID(test_input($_GET['carID']));
                $con = new DBmanager;
                $con->openConnection();
                $con->updateCar($car);
                echo "Car successfully updated!";
                carSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
            
            

        }else{
            try{
                $con = new DBmanager;
                $con->openConnection();
                $arryCars = $con->listCars();
    
                echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Update a car</h2>';
                echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
                echo '<label for="carID">Car to update:</label> <select id="carID" name="carID" required> <br><br>';
                foreach($arrayCars as $cars){
                    echo '<option value="'.$car->getCarID().'">'.$car->getChassis().'</option>';
                }
                echo '</select><br><br>';
                echo '<label for="idChassis">Chassis:</label>  <input type="text" id="idChassis" name="chassis" required><br><br>';
                echo '<label for="idEngine">Engine:</label>  <input type="text" id="idEngine" name="engine" required><br><br>';
                echo '<label for="idManufacturer">Engine manufacturer:</label>  <input type="text" id="idManufacturer" name="engineManufacturer" required><br><br>';
                echo '<input type="hidden" name="load" value="cars">';
                echo '<input type="hidden" name="command" value="add">';
                echo '<input type="submit" value="Update car">';
                echo '</form>';
                
                carSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
            
        }


    }elseif($_GET['command']=='delete'){
        if(isset($_GET['carID'])){
            try{
                $con = new DBmanager;
                $con->openConnection();
                $con->removeCar(test_input($_GET['carID']));
                echo "Car successfully deleted!";
                carSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
            

        }else{
            try{
                $con = new DBmanager;
                $con->openConnection();
                $arryCars = $con->listCars();
    
                echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Delete a car</h2>';
                echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
                echo '<label for="carID">Car to delete:</label> <select id="carID" name="carID" required> <br><br>';
                foreach($arrayCars as $cars){
                    echo '<option value="'.$car->getCarID().'">'.$car->getChassis().'</option>';
                }
                echo '</select><br><br>';
                echo '<input type="hidden" name="load" value="cars">';
                echo '<input type="hidden" name="command" value="add">';
                echo '<input type="submit" value="Delete car">';
                echo '</form>';
                carSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
            
        }
    }

}else{
    
    try{
        echo '<div style="height:600px"><div style="width: 85%;height:100%; float:left;display: flex; align-items: center; flex-direction: column">'; 
        echo '<h2 class="tableTitle">Cars</h2>';
        $con = new DBmanager;
        $con->openConnection();
        echo '<table style="text-align:left; width:60%;"><tr>';
        echo '<th>Chassis</th>';
        echo '<th>Engine Manufacturer</th>';
        echo '<th>Engine</th>';
        echo '</tr>';
        $cars = $con->listCars();
        foreach ($cars as $car){
            echo '<tr>';
            echo '<td>'. $car->getChassis().'</td>';
            echo '<td>'. $car->getEngineManufacturer().'</td>';
            echo '<td>'. $car->getEngine().'</td></tr>';
        }
        echo'</table><br><br>';
        carSidebar();
        
        $con->closeConnection();

    }catch(Exception $e){
        echo 'An error occurred: '.$e->getMessage();
    }
    
    
}


?>