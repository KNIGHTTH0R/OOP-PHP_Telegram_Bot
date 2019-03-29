<?php

    function dbConnect() {
        $server= "localhost";
        $user= "root";
        $psw= "password";
        $db= "db_abcd1234";

        //try to connect
        $conn= new mysqli($server, $user, $psw, $db);
        if ($conn->connect_error) {

            //connection error
            $handle= fopen("./logs/db_".time(),"w");
            fwrite($handle,"Connection error:".conn->connect_error);
            fclose($handle);
            die("Connection failed: " . $conn->connect_error);
        }
        
        //successfully connected to db
        return $conn;
    }
    

?>