<?php
    function printer(array $arr){
        echo "<ul>";
        foreach($arr as $person => $data){
            echo "<li>".$person."</li><ul>";
            echo "<li>email: ".$data[0]."</li>";
            echo "<li>website: :".$data[1]."</li>";
            echo "<li>age: ".$data[2]."</li>";
            echo "<li>password: ".$data[3]."</li></ul>";
        }
        echo "</ul>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $arr = array("John"=>array("john@demo.com","www.john.com",22,"pass"),
                     "Anna"=>array("anna@demo.com", "www.anna.com",24,"pass"),
                     "Peter"=>array("peter@mail.com","www.peter.com",42,"pass"),
                     "Max"=>array("max@mail.com","www.max.com",33,"pass"));

        printer($arr);
    ?>
    
</body>
</html>