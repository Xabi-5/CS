<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        td{
            padding: 10px
        }
        td:nth-child(1){
            font-weight: bold;
        }
        tr:nth-child(even){
            background-color: lightgreen;
        }
    </style>
</head>
<body>
    <?php 
      $days = array( Array ('Español', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'),
      Array ('Galego','Luns', 'Martes', 'Mércores', 'Xoves', 'Venres', 'Sábado', 'Domingo'),
      Array ('English', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
      Array ('French', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'),
      Array('Italian', 'Lunedi', 'Martedi','Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica'),
      Array('Lombard', 'Lunedì', 'Martedì','Mercoldì', 'Giovedì', 'Venerdì', 'Sabet', 'Domenega'),
      Array('Greek', 'Δευτέρα', 'Τρίτη', 'Τετάρτη', 'Πέμπτη', 'Παρασκευή', 'Σάββατο', 'Κυριακή' )
    ); 
    
    echo '<table>';
    foreach($days as $language){
        echo '<tr>';
        foreach($language as $dataCell){
            echo '<td>'.$dataCell.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
    <table>

    </table>
</body>
</html>