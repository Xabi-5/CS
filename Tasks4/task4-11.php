<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Menú Orientado a Objetos con PHP</title>
</head>
<body>
<?php
class Menu{
    private $vertical;
    private $opcions = array();
    public function __construct($type){
        try{
            if($type == 'vertical'){
                $this->vertical = true;
            }elseif($type == 'horizontal'){
                $this->vertical = false;
            }else{
                throw new Exception('Type not valid');
            }

        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function insertar(Opcion $opt){
        array_push($this->opcions, $opt);
    }

    public function dibujar(){
        if($this->vertical == true){
            echo '<table>';
            foreach($this->opcions as $opt){
                echo '<tr><td>
                <a style="color:'.$opt->getColour().';" href="'.$opt->getLink().
                '">'.$opt->getTitle().'</a>
                            </td></tr>';
            }
            echo '</table>';
        }else{
            echo '<table><tr>';
            foreach($this->opcions as $opt){
                echo '<td>
                <a style="color:'.$opt->getColour().';" href="'.$opt->getLink().
                '">'.$opt->getTitle().'</a>
                            </td>';
            }
            echo '</tr></table>';
        }
    }
}
class Opcion{
    private $title;
    private $link;
    private $colour;

    public function __construct($title, $link, $colour){
        $this->title = $title;
        $this->link = $link;
        $this->colour = $colour;
    }
    
    public function getColour()
    {
        return $this->colour;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

$menu1=new Menu('vertical');

$opcion1=new Opcion('Google','http://www.google.com','#C3D9FF');
$menu1->insertar($opcion1);
$opcion2=new Opcion('Yahoo','http://www.yahoo.com','#CDEB8B');
$menu1->insertar($opcion2);
$opcion3=new Opcion('MSN','http://www.msn.com','#C3D9FF');
$menu1->insertar($opcion3);
$menu1->dibujar();
?>
    
</body>
</html>