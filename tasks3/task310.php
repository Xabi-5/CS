<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<h1>Novell Services Login</h1>
<body>
    <form action="welcome.php" method="post">
        <label for="idName" value="<?php echo $name ?>">Username:</label>
        <input type="text" id="idName" name="name" required><br>
        <label for="idPassword">Password:</label>
        <input type="text" id="idPassword" name="password"><br>
        <label for="idCity">City of Employment: </label>
        <input type="text" id="idCity" name="city"><br>

        <label for="idServer">Web server:      
            <select id="idServer" name="server">
                 <option value="Choose" selected disabled>-- Choose a server --</option>
                 <option value="Frankfurt">Frankfurt</option>
                 <option value="Amsterdam">Amsterdam</option>
                 <option value="Frankfurt">Frankfurt</option>
                 <option value="Madrid">Madrid</option>
                 <option value="Milan">Milan</option> 
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