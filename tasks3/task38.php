<?php 
    function generateArray(){
        $numbers = [];
        for($i=0;$i <30;$i++){
            $num = rand(0,20);
            $numbers[$i] = $num;
        }
        return $numbers;
    }
    function printer(array $arr){
        echo "<p>";
        foreach($arr as $number){
            echo $number." ";
        }
        echo "</p>";
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
    echo "<p>1.Crear un array con 30 
    posicions e que conteñaa números ao azar entre 0 e 20 incluídos</p>";
    $arrNum = generateArray();
    echo"<p>2.Imprimir o array creado anteriormente</p>";
    printer($arrNum);
    echo "<p>3.Crear un array cos seguintes datos";
    $characters = array("Superman", "Krusty", "Bob", "Mel", "Barney");
    printer($characters);
    echo "<p>4.Borrar a última posición do array";
    array_pop($characters);
    printer($characters);
    echo "<p>5.Imprimir a posición onde está a cadea Superman";
    echo "<p>".array_search("Superman", $characters)."</p>";
    echo "<p>6.Engadir os seguintes elementos ao final do array";
    array_push($characters,"Carl","Lenny","Burns","Lisa");
    printer($characters);
    echo "<p>7.Ordenar os elementos do array e imprimir o array ordenado";
    sort($characters);
    printer($characters);
    echo "<p>8.Borrar desde a posición 4 2 elementos";
    array_splice($characters,4,2);
    printer($characters);
    echo "<p>9.Engadir os seguintes elementos ao comezo do array";
    array_unshift($characters,"Manzana","Melón","Sandía");
    printer($characters);
    echo "<p>10.Crear unha copia do array cos elementos do 3 ao 5";
    $micopia = array_slice($characters,2,3);
    printer($micopia);
    echo "<p>11.Engadir o elemento pera ao final do array";
    array_push($characters,"pera");
    printer($characters);
    echo "<p>12.Crear un array concatenando os dous anteriores";
    $concatenated = array_merge($characters, $micopia);
    printer($concatenated);
    ?> 
        
</body>
</html>