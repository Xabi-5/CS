<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
</head>
<body>
    <?php 
        $past = time() - 3600;
        foreach($_COOKIE as $key => $value){
            setcookie($key, $value, $past,"/");
        }

        echo '<h2>You have logged out</h2>';
        echo '<a href="login.php">Login</a>';
    ?>
</body>
</html>