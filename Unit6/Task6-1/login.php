<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <style>
        fieldset{
            max-width: 300px;
            height: 100px;
        }
    </style>
</head>
<body>
    <?php 
        include 'DBOperations.php';
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
            $con = new Operations;
            $user = new Login($_POST['username'], $_POST['password']);
            try{
                if($con->validLogin($user) == true){
                    setcookie('user', $_POST['username'], time() + 3600);
                    echo '<h2>Login Successful</h2>';
                    echo '<a href="index.php">Access the main page</a>';
                }else{
                    printform();
                    echo '<h2>Invalid login. Try again</h2>';
                    
                }
            }catch(Exception $e){
                echo '<h2>Invalid login. Try again</h2>';
            }
            if(isset($_COOKIE['user'])){
                header('Unit6/Task6-1/index.php');
            }
        
        }
        
            
    ?>
    

    
</body>
</html>