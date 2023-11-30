<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <?php 
    include 'Operations.php';
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $con = new Operations;

    if(isset($_COOKIE['user'])){

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
            try{
                if($con->getUserName($_POST['username'], $_POST['password']) != null){
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