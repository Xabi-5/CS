<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <form method="post" action="" enctype="multipart/form-data">
        <h1>Complete your CV</h1><br>
        <label for="username">Name:</label><br>
        <input type="text" name="username" value="<?php echo $_POST["username"] ?>" <?php if (isset($_POST['username'])) echo " disabled " ?>required><br><br>
        <label for="surname">Surname:</label><br>
        <input type="text" name="surname" value="<?php echo $_POST["surname"] ?>" <?php if (isset($_POST['surname'])) echo " disabled " ?> required><br><br>
        <input type="hidden" name="load" value="formulario">
        <?php if (isset($_FILES["fileToUpload"])) {
            isPictureValid();
        } else echo '<label for="photo">Add a photo: </label>
        <input type="file" name="fileToUpload">' ?>
        <br><br>
        <input type="checkbox" name="news" <?php if (isset($_POST['news'])) echo "checked disabled" ?>>
        <label for="news">Subscribe to news</label><br><br>
        <input type="submit" value="Save changes">
        <input type="reset" value="Reset data">
    </form>
</body>

</html>