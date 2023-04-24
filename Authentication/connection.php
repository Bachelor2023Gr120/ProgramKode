<?php      
        // Variables used in the database connection
    $host = "192.168.1.25";  //Database Serveren
    $email = "root";  
    $password = 'password';  
    $db_name = "logindb";  
                    // Establishing the connection to the MySql/DB
    $con = mysqli_connect($host, $email, $password,$db_name);  
    if(mysqli_connect_errno()) {  //If there is error to connect
         //Print the error message          
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?> 



