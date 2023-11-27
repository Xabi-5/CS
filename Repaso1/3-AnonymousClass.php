<?php 

    $object = new class{
        private $number = 5;
        public function factorial(){
            $result = 1;
            for($i = $this->number; $i >0; $i-- ){
                $result*=$i;
            }
            return $result;
        }

    };
    echo $object->factorial();

?>