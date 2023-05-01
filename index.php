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
          <li><a href="./Pages/Workspace.php">Workspace</a></li>
          <li><a href="./Pages/about.html">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
          session_start();
          if(isset($_SESSION['user_id'])) {
              // User is logged in, display username and Logout button
              echo '<li><a href="#"><span style="margin:0; padding: 0;"id="username-display"></span></a></li>';
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

<h1>Welcome</h1>
<div class="main-content"> 
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat
    cupidatat non proident, sunt in culpa qui officia deserunt mollit 
    anim id est laborum consectetur adipiscing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad 
    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
    aliquip ex ea commodo consequat.
   </p>      
   <h3>Test</h3>
      <p>Lorem ipsum...</p>
   <h2>Cards</h2>
     <p>
      anim id est laborum consectetur adipiscing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad 
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut
      aliquip ex ea commodo consequat.
     </p> 
</div>


<div class="page-container">
     <div class="grid-containers">
         <div class="containers" onclick="location.href='./Pages/healthcare.html'">
           <img class="card-img" src="./Images/Healthcare.jpg" alt="Card image">
           <div class="card-body">
             <h2 class="card-title">Healthcare</h2>
             <p class="card-text"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est id repellendus 
              optio atque expedita ullam dolores enim, ea numquam. Ad deserunt sapiente
              accusantium consequatur temporibus quos nisi, iure ex nam. Some example text 
              some example text. John Doe is an architect and engineer
              </p>
            </div>
         </div>
         
         <div class="containers" onclick="location.href='./Pages/financial.html'">
           <img class="card-img" src="./Images/financial.jpg" alt="Card image">
           <div class="card-body">
             <h2 class="card-title">Financial</h2>
             <p class="card-text"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est id repellendus 
              optio atque expedita ullam dolores enim, ea numquam. Ad deserunt sapiente
              accusantium consequatur temporibus quos nisi, iure ex nam. Some example text 
              some example text. John Doe is an architect and engineer
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