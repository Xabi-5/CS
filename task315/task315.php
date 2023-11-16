<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $target_dir = "/Descargas/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($fileType != "json") {
        echo "<p>Invalid format, it must be .json</p>";
        }else{
            $myfile = fopen($target_file,"r");
            $jsonString = fread($myfile,filesize($target_file));
            echo "a".$jsonString;
            fclose($myfile);
            $arr =json_decode($jsonString, true);
            foreach($arr as $k1 => $v1){
                foreach($v1 as $k2 => $v2){
                    echo $k2." ->".$v2;
                }
            }
        }   
        
    }
?>
    <form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post" enctype="multipart/form-data">
    Select the file you want to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="submit button" id="submitButton">
    
    </form>
</body>
</html>