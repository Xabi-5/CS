<?php 
    class Alien{
        private $name;
        private static $numberOfAliens =0;
        public function __construct(string $name){
            $this->name;
            if(is_null(Alien::$numberOfAliens)){
                Alien::$numberOfAliens = 1;
            }else{
                Alien::$numberOfAliens++;
            }
            
        }

        public static function getNumberOfaliens(){
            return Alien::$numberOfAliens;
        }

    }

    $alienQuantity = 322;

    for($i=0;$i<$alienQuantity;$i++){
        new Alien('');
    }

    echo Alien::getNumberOfaliens();
    

?>