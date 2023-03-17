<?php 
session_start();
include('connection.php');  
$email = $_POST['email'];  
$password = $_POST['password'];  

//to prevent from mysqli injection  
$email = stripcslashes($email);  
$password = stripcslashes($password);  
$email = mysqli_real_escape_string($con, $email);  
$password = mysqli_real_escape_string($con, $password);  

$sql = "select * from login where email = '$email' and password = '$password'"; 
$result = mysqli_query($con, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
$url = "../questions/question-list.php"; 

if($count == 1){  
    // Set session variables
    $_SESSION["user_id"] = $row['user_id'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["name"] = $row["name"];
    // Redirect to question list
    header("Location: $url "); 
}  
else{  
   // https://stackoverflow.com/questions/39408498/next-page-by-clicking-ok-on-alert-box  
    echo "<script>if(confirm('Login failed. Invalid email or password.')){document.location.href='../Linked-page/login-form.html'};</script>";
} 
?>


// https://phppot.com/php/php-login-script-with-session/
// https://www.tutorialspoint.com/php/php_login_example.htm