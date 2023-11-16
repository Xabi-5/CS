<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjectU4</title>
</head>
<body>
    <?php
    class Person{
        private $name;
        private $age;
        private $id;

        public function __construct($name, $age, $id){
            $this->name = $name;
            $this->age = $age;
            $this->id = $id;
        }

        public function getName(){
            return $this->name;
        }
    }

    interface Information{
        public function printProperties();
    }

    class Vehicle implements Information{
        private $brand;
        private $model;
        private Person $owner;

        public function __construct($brand, $model, $owner){
            $this->brand = $brand;
            $this->model = $model;
            $this->owner = $owner;
        }

        public function printProperties(){
            echo 'Car:<br>';
            echo '-Brand: '.$this->brand.'<br>';
            echo '-Model: '.$this->model.'<br>';
            echo '-Owner: '.$this->owner->getName().'<br>';
        }
    }

    class Maths{
        public static function division($num1, $num2){
            try{
                if(is_float($num1) || is_float($num2)){
                    throw new Exception('Numbers must be integers!');
                }elseif($num2 == 0){
                    throw new Exception('The second number cannot be 0!');
                }else{
                    echo '-Division: '.intdiv($num1,$num2).' Resto: '.$num1%$num2.'<br>';
                }
            }catch(Exception $ex){
                echo '-Error: '.$ex->getMessage().'<br>';
            }
            
        }
    }
    ?>
   <?php
        $luis = new Person('Luis', 27, 01);
        $car = new Vehicle('Renault', 'R25', $luis);
        $car->printProperties();
        echo '<br>Divisions: <br>';
        Maths::division(8, 2);
        Maths::division(8, 0);
        Maths::division(3.4,7.8)
    ?>
</body>
</html>