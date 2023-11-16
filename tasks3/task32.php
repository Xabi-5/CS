<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3.2</title>
</head>
<body>
    <h1>Power</h1>
        <?php declare(strict_types=1);
        function power(int $base, int $exp=2){
            $result = 1;
            for ($i = $exp; $i >0; $i--){
                $result *= $base;
            }
            return $result;
        }
        
        echo "<h3> $result"
        ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numberBase=3;
    $numberExp=4;
    echo "<p> The result is power" 
    ?>
</body>
</html>