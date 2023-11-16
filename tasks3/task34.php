<?php 
    function tripleCheck(array $ar){
        $arLen = count($ar);
        for($i=0; $i < $arLen -2; $i++){
            
            if(($ar[$i] == $ar[$i+1]) and ($ar[$i] == $ar[$i+2])){
                return var_export(true);
            }
        }
        return var_export(false);
    }

    function countries(array $coun){
        foreach($coun as $country => $capital){
            echo "<p>The capital of " .$country ." is " .$capital ."</p>"; 
        }
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
        echo "<h2>Triple Calculator</h2>";
        $array = array(1, 1, 2, 2, 1, 2, 1, 1, 1 );
        echo tripleCheck($array);
        echo "\n";

        echo "<h2>Countries and their capitals</h2>";
        $coun = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", 
            "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens",
            "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", 
            "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", 
            "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");
        
        echo countries($coun);
        ?>
    
</body>
</html>