<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3.1</title>
</head>
<body>
    <h1>Factorial</h1>
    <?php
    $num=5;
    $result = 1;
    for ($i = $num; $i >0; $i--){
        $result *= $i;
    }
    echo "<h3>The factorial of  $num  is  $result<h3>"
    ?>

</body>
</html>