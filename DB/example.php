<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Querying data</h1>

    <?php 
    require_once("Operations.php");
    try{
        $oper = new Operations();
        echo "Conexion creada";
        $guest2 = $oper->getMyGuest(1);
        echo "Result of the query: "
    }
    catch(PDOException $e) {
    echo "DB Error: " . $e->getMessage();
    $conn->rollBack();
    }
    catch(Exception $e) {
    echo "Error: " . $e->getMessage();
    $conn->rollBack();
    }finally{
        $oper->closeConnection();
    }
    ?>
</body>
</html>


