<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $listaBebidas = array($cocacola = array("text" => "Coca Cola", "precio" => 2.1),
                            $pepsicola = array("text" => "Pepsi Cola", "precio" => 2),
                            $fantanaranja = array("text" => "Fanta Naranja", "precio" => 2.5),
                            $trinamanza = array("text" => "Trina Manzana", "precio" => 2.3));
    
    echo "<select name='opcion'>";
    foreach($listaBebidas as $bebida){
        foreach($bebida as $tipo => $dato){
            if($tipo == "text"){
                echo "<option value='".$bebida."'>".$dato;
            }else{
                echo " (".$dato." €)</option>";
            }
        }
    }
    echo "</select>"
    ?>
</body>
</html>