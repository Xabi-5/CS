<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        class ExPropia extends Exception{
            public function __construct($message){
                parent::__construct($message);
                echo $this->getMessage();
            }
        }

        class ExPropiaClass{
            public static function testNumber(float $num){
                if($num == 0){
                    throw new ExPropia ('Número non válido -> o valor debe ser diferente de 0');
                }else{
                    echo 'Número válido';
                }
            }
        }
        for($i=0;$i<30;$i++){
            $numRand = rand(-5,5);
            echo 'Número '.$numRand.': ';
            echo ExPropiaClass::testNumber($numRand).'<br>';
        }

       
    ?>
</body>
</html>