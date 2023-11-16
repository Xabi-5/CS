<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error {color: #FF0000;}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<h1>Novell Services Login</h1>
<body>
    <?php
    function test_input($data){
        $data = trim($data);
        $data=stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 

    if($_SERVER["REQUEST_METHOD"] == "POST"){ //if there's data in the form
        $name = $password = $nameErr = "";
        $name = test_input(($_POST["name"]));
        if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            $nameErr = "Only letters and white space allowed";
            $name ="";
        }
        $password = test_input(($_POST["password"]));
        $city = test_input(($_POST["city"]));
        $server = test_input(($_POST["server"]));

        
    }
       
    ?>
  
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="idName" >Username:</label>
        <input type="text" id="idName" name="name" required value="<?php echo $name; ?>"><br><br>
        <label for="idPassword" >Password:</label>
        <input type="text" id="idPassword" name="password" value="<?php echo $_POST["password"] ?>"><br><br>
        <label for="idCity" >City of Employment: </label>
        <input type="text" id="idCity" name="city" value="<?php echo $city; ?>"><br><br>

        <label for="idServer" >Web server:      
            <select id="idServer" name="server">
                 <option value="Choose" selected disabled>-- Choose a server --</option>
                 <option value="Frankfurt" <?php if(isset($server) && $server == "Frankfurt") echo "selected";?>>Frankfurt</option>
                 <option value="Amsterdam" <?php if(isset($server) && $server == "Amsterdam") echo "selected";?>>Amsterdam</option>
                 <option value="Madrid" <?php if(isset($server) && $server == "Madrid") echo "selected";?>>Madrid</option>
                 <option value="Milan" <?php if(isset($server) && $server == "Milan") echo "selected";?>>Milan</option> 
            </select>
        </label><br><br>
        <label>Please specify your role:    
            <input type="radio" name="role" value="Admin" <?php if($_POST["role"] == "Admin") echo " checked";?>>Admin</input>
            <input type="radio" name="role" value="Engineer" <?php if($_POST["role"] == "Engineer") echo "checked";?>>Engineer</input>
            <input type="radio" name="role" value="Manager" <?php if($_POST["role"] == "Manager")echo "checked";?>>Manager</input>
            <input type="radio" name="role" value="Guest" <?php if($_POST["role"] == "Guest") echo "checked  s";?>>Guest</input>


        </label><br><br>
        <label for="idSignOn">Single Sign-on to the following:</label>
        <input type="checkbox" id="idOptionMail" name="optionMail" value="Mail" <?php if(isset($_POST["optionMail"])) echo "checked";?>>
        <label for="idOptionMail">Mail</label> 
        <input type="checkbox" id="idOptionPayroll" name="optionPayroll" value="Payroll" <?php if(isset($_POST["optionPayroll"])) echo "checked";?>>
        <label for="idOptionMail">Payroll</label> 
        <input type="checkbox" id="idOptionSelfService" name="optionSelfService" value="Self-Service" <?php if(isset($_POST["optionSelfService"])) echo "checked";?>>
        <label for="idOptionMail">Self-service</label> <br><br>

        <input type="submit" value="Login">
        <input type="button" value="Reset">
    </form>
</body>
</html>