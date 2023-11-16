<?php 
    function findString($str1, $str2){
        $found = preg_match("/".$str2."/i",$str1);
        if ($found ==0){
            return var_export(false);
        }else{
            return var_export(true);
        }
    }

    function deleteBlanks(string $str1){
        $str1 = preg_replace("/\s+/","", $str1);
        return $str1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo findString("camaleon", "leon");
        echo "<p></p>";
       $str = "asdfjdslf sj lsjf sldfj ldj   \n";
       $str = deleteBlanks($str);
       echo $str;
        ?>
    
</body>
</html>