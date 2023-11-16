<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1 Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>F1 Manager</h1>
    </header>
    <?php 

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    include 'DBmanager.php';
 
    if(isset($_COOKIE['user'])){
        echo '<nav class="navElement">
    <a class="topNav" href="index.php?load=drivers">Drivers</a>
    <a class="topNav" href="index.php?load=teams">Teams</a>
    <a class="topNav" href="index.php?load=cars">Cars</a>
    <a class="topNav" href="index.php?load=logout">Logout</a></nav><br><br>';
        if(isset($_GET["load"])){
            if($_GET["load"] == "drivers"){

                include 'driverManager.php';

            }elseif($_GET["load"] == "teams"){

                include 'teamManager.php';

            }elseif($_GET["load"] == "cars"){
                include 'carManager.php';

            }elseif($_GET["load"] == "logout"){
                if(isset($_COOKIE['user'])){
                    setcookie('user', '', time() -3600);
                    echo '<p>Successfully logged out</p>';
                    header("Location: index.php");
                    //echo '<a href="index.php">Back to login</a>';
                }
            }
        }

    }else{
        function printForm(){
            echo '<fieldset>
            <legend>
                Log in
            </legend>
            <form action="" method="post">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username">
                    <label for="password">Password</label>
                    <input type="password" name="password"><br><br>
                    <input type="submit" value="Log in">
                </form>
            </fieldset>';
        }
        
        if(!isset($_POST['username']) && !isset($_POST['password'])){
           printform();
        }else{
            $login = new LoginValidator;
            try{
                if($login->validLogin($_POST['username'], $_POST['password']) == true){
                    setcookie('user', $_POST['username'], time() + 300);
                    echo '<h2>Login Successful</h2>';
                    header("Location: index.php");
                }else{
                    printform();
                    echo '<h2>Invalid login. Try again</h2>';
                    
                }
            }catch(Exception $e){
                echo '<h2>Invalid login. Try again</h2>';
            }
        
        }
    }
    
    ?>
    
</body>
</html>