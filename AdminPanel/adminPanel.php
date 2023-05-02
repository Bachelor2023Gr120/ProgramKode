<?php include("../Authentication/check_session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"  type="image/x-icon" href="../images/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="adminPanelStyle.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./adminPanel.js"></script>

  
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
        <a class="navbar-brand" href="../index.php">Logo</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="../index.php">Home</a></li>
          <li class="active"><a href="../Pages/Workspace.php">Workspace</a></li>
          <li><a href="../Pages/about.php">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav navbar-right">
          <?php
          if(isset($_SESSION['user_id'])) {
              // User is logged in, display username and Logout button
              echo '<li><a href="../AdminPanel/adminPanel.php"><span class="glyphicon glyphicon-pencil"></span> Admin Panel</a></li>';
              echo '<li><a><span style="margin:0; padding: 0;"id="username"></span></a></li>';
              echo '<li><a href="../Authentication/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';

          } else {
              // User is not logged in, display Login button
              echo '<li><a href="./Pages/login-form.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
          }
          ?>        
        </ul>
        
        </ul>
      </div>
    </div>
  </nav>


  <div>
      <h1>Admin Panel</h1>
            <div class="dashboard">
                          <div class="controls"> 
                                    <h3>Controls</h3>
                                    <span>
                                          <p>Add a new user </p>
                                          <button class="btn btn-primary" name='add_user' onclick="loadUserForm()" type='submit'>Add User</button>
                                          <p>Modify user data</p>
                                         <button class="btn btn-primary" name='Search_user' onclick="loadSearchUserForm()" type='submit'>Modify User</button>
                                    </span>
                                    <span>
                                          <p>Add a new company</p>
                                          <button class="btn btn-primary" name='add_company' onclick="loadCompanyForm()" type='submit'>Add Company</button>
                                          <p>Modify Company data</p>
                                          <button class="btn btn-primary" name='Search_Company' onclick="loadSearchCompanyForm()" type='submit'>Modify Company</button>
                                    </span>
                                      
                                       
                                     
                           </div> 
                           
                           
                           <div class="contentList" style="border-left: 6px solid #EEE; height: 100%;">
                                        <div class="users" id="userSearchForm" style="">
                                          <?php include('./controls/searchUser.php'); ?>
                                        </div>
                                        <div class="CompanyList" id="companyList" style="">
                                            <?php include('./controls/searchCompany.php'); ?>
                                          </div>
                            </div>

                 
           </div>
      </div>  

              
        <script>
        const Username = "<?php echo $_SESSION['name']; ?>";
        const usernameDisplay = document.getElementById("username");
        usernameDisplay.textContent = `${Username}`;
      </script>
      
  </body>
</html>