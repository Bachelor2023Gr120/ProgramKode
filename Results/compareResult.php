<?php include("../Authentication/check_session.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Result Comparing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon"  type="image/x-icon" href="../images/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

  <link rel="stylesheet" href="compareResultStyle.css">
  <script src="compareResult.js"></script>
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
          <li><a href="../Pages/about.html">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
          if(isset($_SESSION['user_id'])) {
              // User is logged in, display username and Logout button
              echo '<li><a href="#"><span style="margin:0; padding: 0;"id="username-display"></span></a></li>';
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
 
    <form class="content" id="content">
      <h1>Compare test results</h1>
        <p>
        To utilize these features, you will need two results files for comparison. 
        Simply select both files and initiate the comparison.
        </p>
      <label for="file1">Upload File 1:</label>
      <input type="file" id="file1" name="file1">
      <br><br>
      <label for="file2">Upload File 2:</label>
      <input type="file" id="file2" name="file2">
      <br><br>
      <button type="button" onclick="checkFile()">Submit</button>
    </form>
 


  <h1 id="Titel"></h1>
  <div class="CompareFiles">
    <p id="Comparison-Description"></p>
    <canvas id="chart"></canvas>
  </div>
  
      <script>
        const Username = "<?php echo $_SESSION['name']; ?>";
        const usernameDisplay = document.getElementById("username-display");
        usernameDisplay.textContent = `${Username}`;
      </script>
</body>
</html>
