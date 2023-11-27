<?php 
declare(strict_types=1);
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
    
    function largestNumber(int $i, ?int $j, int $k = 5){
        $largest = 0;
        try{
            if($i < 0 || $j <0 || $k < 0){
                throw new Exception("No number can be lesser than 0");
            }
            if($i > $j){
                if($i > $k){
                    $largest = 1;
                }else{
                    $largest = 3;
                }
            }else{
                if($j > $k){
                    $largest = 2;
                }else{
                    $largest = 3;
                }
            }
            return $largest;

        }catch(Error $e){
            echo $e->getMessage();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    echo '<h3>The largest number of the three is 
    the one in the positon number: '.largestNumber(6, null). '</h3>';
    ?>
</body>
</html>

