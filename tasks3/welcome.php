<html>
    <body>
        Welcome <?php echo $_POST["name"]; ?><br>
        Your password is: <?php echo $_POST["password"]; ?><br><br>
        Your city is <?php echo $_POST["city"]; ?><br><br>
        Your server is <?php echo $_POST["server"]; ?><br><br>
        You work
        <?php 
            if(!empty($_POST["modo1"]))
                echo $_POST["modo1"].", ";
                if(!empty($_POST["modo2"]))
                echo $_POST["modo2"].", ";
        ?>
    </body>
</html>