<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function teamSidebar(){
    echo '<div style="width: 15%; height:600px; position: absolute; right: 0;">'
    .'<nav class="rightNavMenu"><a class="rightNavs" href="index.php?load=teams&command=add">Add</a>'.
    '<a class="rightNavs" href="index.php?load=teams&command=update">Update</a>'.
    '<a class="rightNavs" href="index.php?load=teams&command=delete">Delete</a>'.
    '</nav></div></div>';
}
if(isset($_GET["command"])){
    if($_GET["command"] == "add"){

        try{
            $con = new DBmanager;
            $con->openConnection();
            $arrayDrivers = $con->listDrivers();
            $arrayCars = $con->listCars();
            echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Add a team</h2>';
            echo '<form action="" method="post">';
            echo '<label for="idTeamName">Name:</label>  <input type="text" id="idTeamName" name="name" required><br><br>';
            echo '<label for="idTeamColour">Colour:</label>  <input type="color" id="idTeamColour" name="colour"><br><br>';
            echo '<label for="idTeamCountry">Country:</label>  <input type="text" id="idTeamCountry" name="country" required><br><br>';
            echo '<label for="idTeamHQ">Headquarters:</label>  <input type="text" id="idTeamHQ" name="headquarters" required><br><br>';
            echo '<label for="idDriverNumber1">Driver 1:</label> <select id="idDriverNumber1" name="driverNumber1" required> <br><br>';
            echo '<option value="null"></option>';
            foreach($arrayDrivers as $driver){
                echo '<option value="'.$driver->getDriverNumber().'">'.$driver->getName().' '.$driver->getSurname().'</option>';
            }
            echo '</select><br><br>';
            echo '<label for="idDriverNumber2">Driver 2:</label> <select id="idDriverNumber2" name="driverNumber2" required> <br><br>';
            echo '<option value="null"></option>';
            foreach($arrayDrivers as $driver){
                echo '<option value="'.$driver->getDriverNumber().'">'.$driver->getName().' '.$driver->getSurname().'</option>';
            }
            echo '</select><br><br>';
            echo '<label for="idCar">Car:</label> <select id="idCar" name="car" required> <br><br>';
            echo '<option value="null"></option>';
            foreach($arrayCars as $car){
                echo '<option value="'.$car->getCarID().'">'.$car->getChassis().'</option>';
            }
            echo '</select><br><br>';
            echo '<input type="submit" value="Add team">';
            echo '</form>';
            teamSidebar();
            $con->closeConnection();

        }catch(Exception $e){
            echo 'An error occurred: '.$e->getMessage();
        }
        
        if(isset($_POST['name'])){
            try{
                $team = new Team;
                $team->setValues(test_input($_POST['name']), test_input($_POST['car']), test_input($_POST['driverNumber1']),
                test_input($_POST['driverNumber2']), test_input($_POST['colour']), test_input($_POST['country']),test_input($_POST['headquarters']));
                $con = new DBmanager;
                $con->openConnection();
                $con->addTeam($team);
                echo '<p class="success">Team successfully added!</p>';
                teamSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
        }

    }elseif($_GET["command"] == "update"){
        
            try{
                $con = new DBmanager;
                $con->openConnection();
                $arrayDrivers = $con->listDrivers();
                $arrayCars = $con->listCars();
                $arrayTeams = $con->listTeams();
                    
                echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Update a team</h2>';
                echo '<form action="" method="post">';
                echo '<label for="TeamID">Team to update:</label> <select id="TeamID" name="teamID"> <br><br>';
                echo '<option value="null"></option>';
                foreach($arrayTeams as $team){
                    echo '<option value="'.$team->getTeamID().'">'.$team->getName().'</option>';
                }
                echo '</select><br><br>';
                echo '<label for="idTeamName">Name:</label>  <input type="text" id="idTeamName" name="name" required><br><br>';
                echo '<label for="idTeamColour">Colour:</label>  <input type="color" id="idTeamColour" name="colour"><br><br>';
                echo '<label for="idTeamCountry">Country:</label>  <input type="text" id="idTeamCountry" name="country" required><br><br>';
                echo '<label for="idTeamHQ">Headquarters:</label>  <input type="text" id="idTeamHQ" name="headquarters" required><br><br>';
                echo '<label for="idDriverNumber1">Driver 1:</label> <select id="idDriverNumber1" name="driverNumber1" required> <br><br>';
                echo '<option value="null"></option>';
                foreach($arrayDrivers as $driver){
                    echo '<option value="'.$driver->getDriverNumber().'">'.$driver->getName().' '.$driver->getSurname().'</option>';
                }
                echo '</select><br><br>';
                echo '<label for="idDriverNumber2">Driver 2:</label> <select id="idDriverNumber2" name="driverNumber2" required> <br><br>';
                echo '<option value="null"></option>';
                foreach($arrayDrivers as $driver){
                    echo '<option value="'.$driver->getDriverNumber().'">'.$driver->getName().' '.$driver->getSurname().'</option>';
                }
                echo '</select><br><br>';
                echo '<label for="idCar">Car:</label> <select id="idCar" name="car" required> <br><br>';
                echo '<option value="null"></option>';
                foreach($arrayCars as $car){
                    echo '<option value="'.$car->getCarID().'">'.$car->getChassis().'</option>';
                }
                echo '</select><br><br>';
                echo '<input type="hidden" name="load" value="teams">';
                echo '<input type="hidden" name="command" value="update">';
                echo '<input type="submit" value="Update team">';
                echo '</form>';
                teamSidebar();
                $con->closeConnection();

            }catch(Exception $e){
                echo 'An error occurred: '.$e->getMessage();
            }
            if(isset($_POST['name'])){
                try{
                    $team = new Team;
                    $team->setValues(test_input($_POST['name']), test_input($_POST['car']), test_input($_POST['driverNumber1']),
                    test_input($_POST['driverNumber2']), test_input($_POST['colour']), test_input($_POST['country']),test_input($_POST['headquarters']));
                    $team->setTeamID(test_input($_POST['teamID']));
                    $con = new DBmanager;
                    $con->openConnection();
                    $con->updateTeam($team);
                    echo '<p class="success">Team successfully updated!</p>';
                    $con->closeConnection();

                }catch(Exception $e){
                    echo 'An error occurred: '.$e->getMessage();
                }   
        }
        
    }elseif($_GET["command"] == "delete"){
        try{
            $con = new DBmanager;
            $con->openConnection();
            $arrayTeams = $con->listTeams();
            echo '<div style="display: flex; align-items: center; flex-direction: column"><h2>Delete a team</h2>';
            echo '<form action="" method="post">';
            echo '<label for="TeamID">Team to delete:</label> <select id="TeamID" name="teamID"> <br><br>';
            echo '<option value="null"></option>';
            foreach($arrayTeams as $team){
                echo '<option value="'.$team->getTeamID().'">'.$team->getName().'</option>';
            }
            echo '</select><br><br>';
            echo '<input type="hidden" name="load" value="teams">';
            echo '<input type="hidden" name="command" value="delete">';
            echo '<input type="submit" value="Delete team">';
            echo '</form>';
            teamSidebar();
            $con->closeConnection();
        }catch(Exception $e){
            echo 'An error occurred: '.$e->getMessage();
        }
        if(isset($_POST['teamID'])){
            try{
                $con = new DBmanager;
                $con->openConnection();
                $con->removeTeam(test_input($_POST['teamID']));
                echo '<p class="success">Team successfully deleted!</p>';
                $con->closeConnection();

            }catch(Exception $e){
                echo 'Something went wrong'.$e->getMessage();
            }
            
        }

    }
}else{
    try{
       
        echo '<div style="height:600px"><div style="width: 85%;height:100%; float:left;display: flex; align-items: center; flex-direction: column">';
        echo '<h2 class="tableTitle">Teams</h2>';
        $con = new DBmanager;
        $con->openConnection();
        echo '<table style="text-align:left; width:100%"><tr>';
        echo '<th style="width: 10px">Colour</th>';
        echo '<th style="text-align: center">Name</th>';
        echo '<th>Country</th>';
        echo '<th>Headquarters</th>';
        echo '<th>Car</th>';
        echo '<th style="text-align:center">Drivers</th>';
        echo '</tr>';
        $teams = $con->listTeams();
        foreach ($teams as $team){
            $driver1 = $con->getDriver($team->getDriver1());
            $str1 = '';
            if(!empty($driver1)){
                $str1 = $driver1->getDriverNumber().'. ' .$driver1->getName().' '.$driver1->getSurname();
            }
            $driver2 = $con->getDriver($team->getDriver2());
            $str2='';
            if(!empty($driver2)){
                $str2 = $driver2->getDriverNumber().'. ' .$driver2->getName().' '.$driver2->getSurname();
            }
            $strcar ='';
            if(empty($team->getCar())){
                $strcar = '';
            }else{
                $car = $con->getCar($team->getCar());
                $strcar = $car->getChassis();
            }
            echo '<tr>';
            echo '<td style="background-color: '.$team->getColour().'";></td>';
            echo '<td style="text-align: center">'. $team->getName().'</td>';
            echo '<td>'. $team->getCountry().'</td>';
            echo '<td>'. $team->getHeadquarters().'</td>';
            echo '<td>'. $strcar.'</td>';
            echo '<td style="text-align:center">'.$str1.'<br>---------------<br>'.
            $str2.'</td></tr>';
        }
        echo'</table><br><br>';
        teamSidebar();
        $con->closeConnection();
        
    }catch(Exception $e){
        echo 'Something went wrong'.$e->getMessage();
    }
    
}
?>