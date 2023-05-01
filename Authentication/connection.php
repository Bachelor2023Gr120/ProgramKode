<?php      
        // Variables used in the database connection
    $host = "localhost";  //Database serveren
    $email = "root";  
    $password = '';  
    $db_name = "usercompanydb";  
                    // Establishing the connection to the MySql/DB
    $con = mysqli_connect($host, $email, $password, $db_name);  
    if(mysqli_connect_errno()) {  //If there is error to connect
         //Print the error message          
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
        //https://www.geeksforgeeks.org/how-to-create-admin-login-page-using-php/

    }  
?> 


