<?php 
class Calculator{
        private $num1;
        private $num2;

        //Constructor
        function __construct($num1 = 0,$num2 = 0){
            $this->num1 = $num1;
            $this->num2 = $num2;
        }
        
        //Setters
        function set_num1($num1){
            $this->num1 = $num1;
        }
        function set_num2($num2){
            $this->num2 = $num2;
        }

        //Getters
        function get_num1(){
            return $this->num1;
        }
        function get_num2(){
            return $this->num2 ;
        }

        //Methods
        function multiply(){
            return $this->num1 * $this->num2;
        }

        function add(){
            return $this->num1 + $this->num2;
        }

        function toString(){
            return 'The value of num1 is '.$this->num1.' and the value of num2 is '.$this->num2."\n";
        }

}
    $firstCalcule = new Calculator();
    $firstCalcule->set_num1(5);
    $firstCalcule->set_num2(3);

    echo $firstCalcule->toString();

    $secondCalcule = new Calculator(8,7);
    echo $secondCalcule->toString()."\n";
    echo "The multiplication result is ".$secondCalcule->multiply()."\n";
    echo "The adding result is ".$secondCalcule->add()."\n";
?>