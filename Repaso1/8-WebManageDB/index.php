<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
    header{
        display: grid;
        grid-template-columns: 3fr 1fr;
    }
    #userDiv{
    border: 1px solid black;
    margin-left: 30%;
    }   
    nav{
    display: flex;
    justify-content: space-around;}
    table, td, th{
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
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

    if(isset($_COOKIE['user']) || isset($_COOKIE['admin'])){
        if(isset($_GET["load"])){
            echo '<header>
                    <nav>
                        <a href="index.php?load=welcome">Welcome</a>
                        <a href="index.php?load=list">List of products</a>';

            if(isset($_COOKIE['admin'])){
                echo  '<a href="index.php?load=add">Add a new product</a>';
                echo '  </nav>
                <div id="userDiv">
                    '.$_COOKIE['admin'].'
                </div>
            </header>';
            }elseif (isset($_COOKIE['user'])) {
                echo '  </nav>
                    <div id="userDiv">
                        '.$_COOKIE['user'].'
                    </div>
                </header>';
            }
            //poñer nome user aqui
            if($_GET["load"] == "welcome"){

                include 'Welcome.php';

            }elseif($_GET["load"] == "list"){

                include 'listProduct.php';

            }elseif($_GET["load"] == "add"){
                if(isset($_COOKIE['admin'])){
                    include 'addProduct.php';
                }else{
                    echo 'You must be an administrator to access this resource';
                }
                
            }elseif($_GET["load"] == "modify"){
                if(isset($_COOKIE['admin'])){
                    include 'modifyProduct.php';
                }else{
                    echo 'You must be an administrator to access this resource';
                }

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
            try{
                $login = $con->getUserName($_POST['username'], $_POST['password']);
                if($login != null){
                    if($login[1] == 0){
                        setcookie('user', $_POST['username'], time() + 120);
                        echo '<h2>Login Successful</h2>';
                        header("Location: index.php?load=welcome");
                    }else if($login[1] == 1) {
                        setcookie('admin', $_POST['username'], time() + 120);
                        echo '<h2>Login Successful</h2>';
                        header("Location: index.php?load=welcome");
                    }
                    
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