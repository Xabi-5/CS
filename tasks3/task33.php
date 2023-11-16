<?php declare(strict_types=1);
    function fact(int $num){
        $result = 1;

        if($num < 0){
        $result = -1;
        }else{
        for ($i = $num; $i >0; $i--){
            $result *= $i;
        }
        }
        return $result;
    }
         
    ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3.2</title>
</head>
<body>
    <h1>Factorial</h1>
    <?php
    define("VALUE", -3);
    $res = fact(VALUE);
    if($res < 0){
        echo "The factorial of " .VALUE ." could not be calculated";
    }else{
        echo "The factorial of " .VALUE ." is " .$res;
    }
    ?>
</body>
</html>