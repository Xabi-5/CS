<!DOCTYPE html>
<html>

<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li:last-child {
            border-right: none;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
    <?php
    function dniValidator(string $numbers, string $letter)
    {
        $letter = strtoupper($letter);
        $letters = array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E');
        $valid = false;
        if (is_numeric($numbers)) {
            if (ctype_alpha($letter)) {
                $numbersInt = intval($numbers);
                $correspondingLetter = $letters[$numbersInt % 23];
                if ($correspondingLetter == $letter) {
                    $valid = true;
                }
            }
        }
        return $valid;
    }

    function isPictureValid()
    {
        $uploadOk = 1;
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        echo "target_dir: " . $target_dir . "<br>";
        echo "target_file: " . $target_file . "<br>";
        echo "fileType: " . $fileType . "<br>";
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo '<img src="<?php echo $targetFile; ?>" alt="Uploaded Image">';
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }
    ?>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") {
        echo '
        <ul>
          <li><a class="active" href="index.php?load=inicio">Home</a></li>
          <li><a href="index.php?load=formulario">Form</a></li>
          <li><a href="index.php?load=dni">DNI check</a></li>
        </ul>
        </div>';
        if (isset($_GET['load'])) {
            $page = $_GET['load'];
            if ($page == 'inicio') {
                echo '<p>42°52′40″N 8°32′40″W </p>';
                echo '<p>Today is ' . date("F jS\, Y  ") . '</p>';
                echo '<p>Sun will rise at ' . date_sunrise(time(), SUNFUNCS_RET_STRING, 42.88, -8.54, 90.5, 2) .
                    ' and set at ' . date_sunset(time(), SUNFUNCS_RET_STRING, 42.88, -8.54, 90.5, 2) . ' in Santiago de Compostela';
            }
            //<input type="hidden" name="load" value="formulario">
            elseif ($page == 'formulario') {
                include "test.php";
                
            } elseif ($page == 'dni') {
                echo '<form method ="get" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="dniNumbers">Introduce the DNI numbers:</label></td>
                        <td><label for="dniLetter">Introduce the DNI letter:</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="dniNumbers" maxlength="8" minlength="8" required><br><br></td>
                        <td><input type="text" name="dniLetter" maxlength="1" minlength="1" required><br><br></td>
                    </tr>
                    </table>
                    <input type="hidden" name="load" value="dni">
                    <input type="submit" name="validate" value="Validate dni">                    
                </form>';
                if (isset($_GET['dniLetter'])) {
                    $valid = dniValidator($_GET['dniNumbers'], $_GET['dniLetter']);
                    if ($valid) {
                        echo '<p style="color:green;">The DNI introduced is valid!</p>';
                    } else {
                        echo '<p style="color:red;">The DNI introduced is NOT valid</p>';
                    }
                }
            }
        }
    }
    ?>


</body>

</html>