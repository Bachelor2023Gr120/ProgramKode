<!DOCTYPE html>
<html lang="en">
<head>
  <title>About</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon"  type="image/x-icon" href="../images/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="style.css">

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
        <a href="../index.php" >
          <img class="logo-img" src="../Images/logo.png" alt="Card image">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="../index.php">Home</a></li>
          <li><a href="../Pages/Workspace.php">Workspace</a></li>
          <li><a href="../Pages/about.php">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
          session_start();
          if(isset($_SESSION['user_id'])) {
              // User is logged in, display username and Logout button
              echo '<li><a href="../AdminPanel/adminPanel.php"><span class="glyphicon glyphicon-pencil"></span> Admin Panel</a></li>';
              echo '<li><a><span style="margin:0; padding: 0;"id="username-display"></span></a></li>';
              echo '<li><a href="../Authentication/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
          } else {
              // User is not logged in, display Login button
              echo '<li><a href="../Pages/login-form.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
          }
          ?>   
        </ul>
      </div>
    </div>
  </nav>
  <div style="text-align: center; justify-content: center;" >
    <h1 style="font-weight: bold;">Welcome to CyberTest4You</h1>
        <span><img class="page-logo" style=" margin-left: 45%; height: 10%; width: 10%;" src="../Images/logoB.png" alt="Card image">
        </span>
        <div class="container">
              <div class="aboutContant">
                          <span>
                            <p>We're a team of students working on a bachelor's project in collaboration with <a href="https://www.soprasteria.no"><b>Sopra Steria</b></a>, 
                              <br>aimed at helping companies improve their information security and compliance practices.</p><br>
                          </span>
                          <span>
                            <p>Our purpose is to provide businesses with a platform that helps them assess their information security maturity, 
                              <br>understand their legal and regulatory requirements, and make informed decisions about how to protect their data and assets.</p><br>
                          </span>
                          <span>
                            <p>Our project is focused on developing a user-friendly tool that allows businesses to self-assess their information security maturity level
                              <br> based on the <b>ISO 27001 standard</b>. In addition to the self-assessment tool, we provide information about laws and regulations 
                              <br>that businesses need to comply with based on their industry sectors and the services they provide.</p><br>
                          </span>
                          <span>
                            <p>Our team consists of three highly motivated students with a passion for cybersecurity, and we share a common goal of making a positive impact in the world.</p>
                          </span>
                          <p>Thank you for visiting our website, and we hope you find our tools and information helpful in improving your information security practices.</p>
                        </div>
                        <div class="contactInfo">
                          <span>
                            <h2>Contact Us:</h2>
                            <p>If you have any questions or comments, please feel free to contact us using the contact form on our website. We're always happy to hear from you!</p>
                            <div>
                              <div">
                                <h2>Team Members:</h2>
                                <span>
                                  <h3>Murad Dimen</h3><a href="mailto: Moradha@moradha@stud.ntnu.no">moradha@stud.ntnu.no</a>
                                </span>
                                <span>
                                  <h3>Jonas Simonsen</h3><a href="mailto:jonasfsi@stud.ntnu.no">jonasfsi@stud.ntnu.no</a>
                                </span>
                                <span>
                                  <h3>Sondre Bakke</h3><a href="mailto: sondrsba@stud.ntnu.no">sondrsba@stud.ntnu.no</a>
                                </span>
                              </div>
                              <div>
                                <hr>
                                <h2>Sopra Steria:</h2>
                                <span>
                                  <h3>Tea Knudsen</h3>><a href="mailto: tea.knudsen@soprasteria.com">tea.knudsen@soprasteria.com</a>
                                  <p></p>
                                </span>
                              
                              </div>
                            </div>
                            
                          </span>


                    </div>

      <script>
        const Username = "<?php echo $_SESSION['name']; ?>";
        const usernameDisplay = document.getElementById("username-display");
        usernameDisplay.textContent = `${Username}`;
      </script>

</body>
</html>
