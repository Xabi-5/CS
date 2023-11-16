<?php 

//Open connection
require "MySQLConnect.php";

//Work with the database
try{
    //Begin transaction
    $conn->beginTransaction();

    $sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    
    // use exec() because no results are returned
    $conn->exec($sql);

    $conn->commit();

}catch(PDOException $e) {
    echo "DB Error: " . $e->getMessage();
    $conn->rollBack();
}catch(Exception $e) {
    echo "Error: " . $e->getMessage();
    $conn->rollBack();
}finally{
    //Close connection
    $conn = null;
}
?>