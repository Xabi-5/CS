<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        include 'DBOperations.php';
        $object1 = unserialize($_SESSION['example1']);
        $object2 = unserialize($_COOKIE['example2']);
        echo 'O primeiro código é '.$object1->getCode().'-'.$object1->getDescription();
        echo '<br>';
        echo 'O segundo código é '.$object2->getCode().'-'.$object2->getDescription();
        
    ?>
</body>
</html>