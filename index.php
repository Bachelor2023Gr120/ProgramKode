<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"  type="image/x-icon" href="./images/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="Style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a href="./index.php" >
          <img class="logo-img" src="./Images/logo.png" alt="Card image">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="./index.php">Home</a></li>
          <li><a href="./Pages/TestingCenter.php">Testing Center</a></li>
          <li><a href="./Pages/about.php">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
          session_start();
          if(isset($_SESSION['user_id'])) {
              // User is logged in, display username and Logout button
              //echo '<li><a href="./AdminPanel/adminPanel.php"><span class="glyphicon glyphicon-pencil"></span> Admin Panel</a></li>';
              echo '<li><a><span style="margin:0; padding: 0;"id="username-display"></span></a></li>';
              echo '<li><a href="./Authentication/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
          } else {
              // User is not logged in, display Login button
              echo '<li><a href="./Pages/login-form.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
          }
          ?>        
        </ul>
      </div>
    </div>
  </nav>

<h1 style="font-weight: bold;">Welcome to CyberTest4You</h1>
<div class="main-content"> 
  <p>Press the “test center” tab to start the tests.</p>      
   <h3></h3>
      <p></p>
      <br><br><br><br><br>
   <h2> Choose your sector of expertise:</h2>
     <p>
     </p> 
</div>


<div class="page-container">
     <div class="grid-containers">
         <div class="containers" onclick="location.href='./Pages/healthcare.php'">
           <img class="card-img" src="./Images/Healthcare.jpg" alt="Card image">
           <div class="card-body">
             <h2 class="card-title">Healthcare</h2>
             <p class="card-text"> The healthcare sector is one of the most important sectors we have in our society. It is crucial that patients receive the help that they need. Because of their importance, these institutions are often targets for cyberattacks. They can also have bad security habits which can lead to leaking of data. 
There are three main goals the healthcare sector needs to ensure. These consist of integrity, availability and confidentiality. There are also a set of local Norwegian laws they need to comply with. This test is made to test this compliance.
Please note that the questions are from “the Norm” which is an established standard for information security within the healthcare sector. Only the questions related to information security is included in this version of the test.
              </p>
            </div>
         </div>
         
         <div class="containers" onclick="location.href='./Pages/financial.php'">
           <img class="card-img" src="./Images/financial.jpg" alt="Card image">
           <div class="card-body">
             <h2 class="card-title">Financial</h2>
             <p class="card-text"> The financial sector is constantly evolving and is a great target for cyberattacks. Companies within this sector needs to handle a lot of sensitive data. A great pressure from international institutions and local governments also leads to a lot of strict regulations. Failure to comply can lead to devastating consequences, both from attackers, but also big economical fines for not following regulations to a sufficient degree. It can also lead to a great loss in reputation. 
The financial sector needs to pay attention to a lot of regulations. Within EU, GDPR (General Data Protection Regulation) is the most important regulation for IT-security. Compliance to this can be tested in the general ISO27001 test on our webpage.
This test is for testing the compliance of the company to the law called “Regulations on the use of information and communication technology” which is published by the Norwegian Ministry of Finance. This is the most important law related to finance and IT-security.
              </p>
             
           </div>
     </div>
  </div>

  <script>
        const Username = "<?php echo $_SESSION['name']; ?>";
        const usernameDisplay = document.getElementById("username-display");
        usernameDisplay.textContent = `${Username}`;
      </script>
</body>
</html>
