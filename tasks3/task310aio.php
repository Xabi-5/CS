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
    Welcome <?php echo $_POST["name"]; ?><br>
        Your password is: <?php echo $_POST["password"]; ?><br><br>
        Your city is <?php echo $_POST["city"]; ?><br><br>
        Your server is <?php echo $_POST["server"]; ?><br><br>
        You work
        <?php 
            if(!empty($_POST["modo1"]))
                $modo1 = $_POST["modo1"];
                if(!empty($_POST["modo2"]))
                $modo2 = $_POST["modo2"];
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="idName" >Username:</label>
        <input type="text" id="idName" name="name" required value="<?php echo $name; ?>"><br>
        <label for="idPassword" >Password:</label>
        <input type="text" id="idPassword" name="password" value="<?php echo $_POST["password"] ?>"><br>
        <label for="idCity" >City of Employment: </label>
        <input type="text" id="idCity" name="city" value="<?php echo $city; ?>"><br>

        <label for="idServer" >Web server:      
            <select id="idServer" name="server">
                 <option value="Choose" selected disabled>-- Choose a server --</option>
                 <option value="Frankfurt" <?php if(isset($server) && $job == "Frankfurt") echo "selected";?>>Frankfurt</option>
                 <option value="Amsterdam" <?php if(isset($server) && $job == "Amsterdam") echo "selected";?>>Amsterdam</option>
                 <option value="Madrid" <?php if(isset($server) && $job == "Madrid") echo "selected";?>>Madrid</option>
                 <option value="Milan" <?php if(isset($server) && $job == "Milan") echo "selected";?>>Milan</option> 
            </select>
        </label><br>
        <label>Please specify your role:    
            <input type="radio" value="Admin">Admin</input>
            <input type="radio" value="Engineer">Engineer</input>
            <input type="radio" value="Manager">Manager</input>
            <input type="radio" value="Guest">Guest</input>


        </label><br>
        <label for="idSignOn">Single Sign-on to the following:</label>
        <input type="checkbox" id="idOptionMail" name="OptionMail" value="Mail">
        <label for="idOptionMail">Mail</label> 
        <input type="checkbox" id="idOptionPayroll" name="OptionPayroll" value="Payroll">
        <label for="idOptionMail">Payroll</label> 
        <input type="checkbox" id="idOptionSelfService" name="OptionSelfService" value="Self-Service">
        <label for="idOptionMail">Self-service</label> <br>

        <input type="submit">
    </form>
</body>
</html>