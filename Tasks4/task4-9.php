<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   
    <?php 
        $object=(new Class(){
            private $x = 5;
            private $y = 3;

            public function multiplicar(){
                return $this->x * $this->y;
            }
            public function exponencial(){
                return $this->x ** $this->y;
            }

        });
        echo $object->multiplicar();
        echo '<br>'.$object->exponencial();
    ?>
</body>
</html>