<?php
    function organiser(string $str){
        $array = explode(';', $str);
        echo "<table><th>City</th><th>Country</th><th>Continent</th>";
        foreach($array as $place){
            $location = explode(",",$place);
            echo "<tr><td>".$location[0]."</td><td>".$location[1]."</td><td>".$location[2]."</td></tr>";
        }
        echo "</table>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $information="Tokyo,Japan,Asia;Mexico City,Mexico,America;New York City,USA,America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,America;Cairo,Egypt,Africa;London,UK,Europe";
        organiser($information); 
    ?>
    
</body>
</html>