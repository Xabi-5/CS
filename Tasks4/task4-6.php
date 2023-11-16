<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      trait CalculoCentroEstudos{
        public function numeroDeAprobados(array $notas){
            $aprobados = 0;
            foreach($notas as $nota){
                if($nota >=5){
                    $aprobados++;
                }
            }
            return $aprobados;
        }
        public function numeroDeSuspensos(array $notas){
            $suspensos = 0;
            foreach($notas as $nota){
                if($nota >=5){
                    $suspensos++;
                }
            }
            return $suspensos;
        }
        public function notaMedia(array $notas){
            $suma = 0;
            foreach($notas as $nota){
                    $suma+=$nota;
            }
            return round($suma/count($notas),2);
        }
      }  

      trait MostraCalculos{
        public function saudo(){
            echo 'Benvido ao centro de cálculos';
        }
        public function mostraCalculosCentroEstudos($aprobados, $suspensos,$media){
            echo '<p>Aprobados: '.$aprobados.'</p><br>';
            echo '<p>Suspensos: '.$suspensos.'</p><br>';
            echo '<p>Media: '.$media.'</p><br>';
        }
      }

        class NotasTrait{
            private $arrayNotas= array(5,6,3,2,8,9,6,6,2,6,6,5,4,6,3,7,3,5,7,7,10,10);
            use CalculoCentroEstudos;
            use MostraCalculos;
            public function getArrayNotas(){
                return $this->arrayNotas;
            }
      }
      $calculator = new NotasTrait;
      $calculator->mostraCalculosCentroEstudos($calculator->numeroDeAprobados($calculator->getArrayNotas()),
      $calculator->numeroDeSuspensos($calculator->getArrayNotas()),
      $calculator->notaMedia($calculator->getArrayNotas()));
     ?>
</body>
</html>