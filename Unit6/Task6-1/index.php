<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
        if(isset($_COOKIE["user"])){
            session_start();
        include 'DBOperations.php';
        function printForm(){
            echo '<fieldset>
            <legend>
                Log in
            </legend>
            <form action="" method="post">
                    <label for="code1">First Code </label>
                    <input type="number" name="code1" id="code1">
                    <label for="code1">Second Code </label>
                    <input type="number" name="code2" id="code2">
                    <label for="description1">First Description</label>
                    <input type="description1" name="description1"><br><br>
                    <label for="description2">Second Description</label>
                    <input type="description2" name="description2"><br><br>
                    <input type="submit" value="Log in">
                </form>
            </fieldset>';
        }
        if(!isset($_POST['code1'])){
            printForm();
        }else{
            $firstExample = new Example($_POST['code1'], $_POST['description1']);

            $secondExample = new Example($_POST['code2'], $_POST['description2']);

            $_SESSION['example1'] = serialize($firstExample);
            setcookie('example2', serialize($secondExample), time() + 3600);

            echo '<h2>Objects successfully created</h2>';
            echo '    <a href="next.php">Next</a>';
        }
        echo '<a href="logout.php">Logout</a>';
    }else{
        echo 'Vostede debe estar identificado: ';
        echo '<a href="login.php">Login</a>';
    }
        
    ?>
</body>
</html>