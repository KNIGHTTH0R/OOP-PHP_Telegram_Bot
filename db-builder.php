<?php

    //connect to db
    require "connection.php";
    $conn= dbConnect(); //check connection.php for more about that

    //create tables
    $q= "CREATE TABLE IF NOT EXISTS users (
        var1 INT NOT NULL AUTO_INCREMENT,
        var2 VARCHAR(255),
        PRIMARY KEY(var1)
    );";
    if ($conn->query($q)) {
        echo "Table successfully created";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $handle= fopen("./logs/builder_".time(), "w");
        fwrite($handle,$conn->error);
        fclose($handle);
    }

?>