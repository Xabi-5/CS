
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
/*
    abstract class Notas{
        protected $arrayNotas;
        public function __construct($arrayNotas){
            $this->arrayNotas = $arrayNotas;
        }
        abstract public function toString();
    
    }

    interface CalculoCentroEstudos{
        public function numeroDeAprobados();
        public function numeroDeSuspensos();
        public function notaMedia();

    }

    class NotasDaw extends Notas implements CalculoCentroEstudos{
        public function __construct($arrayNotas){
            parent::__construct($arrayNotas);
            
        }

        public function numeroDeAprobados(){
            $aprobados = 0;
            foreach($this->arrayNotas as $nota){
                if($nota >=5){
                    $aprobados++;
                }
            }
            return $aprobados;
        }
        public function numeroDeSuspensos(){
            $suspensos = 0;
            foreach($this->arrayNotas as $nota){
                if($nota <5){
                    $suspensos++;
                }
            }
            return $suspensos;
        }
        public function notaMedia(){
            $suma = 0;
            foreach($this->arrayNotas as $nota){
                    $suma+=$nota;
            }
            return round($suma/count($this->arrayNotas),2);
        }

        public function toString(){
            $str = 'Aprobados: '.$this->numeroDeAprobados().' Suspensos: '.
            $this->numeroDeSuspensos().' Nota media: '.$this->notaMedia();
            return $str;
        }
    }
    
?>
    <?php
    $arrayNotas = array(5,6,3,2,8,9,6,6,2,6,6,5,4,6,3,7,3,5,7,7,10,10);
    $notas = new NotasDaw($arrayNotas);
    echo $notas->toString(); 
    ?>
</body>
</html>