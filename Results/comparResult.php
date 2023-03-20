<?php include("../questions/check_session.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Result Comparing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="style.css">
  <script src="comparResult.js"></script>

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
        <a class="navbar-brand" href="../Index.html">Logo</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="../Index.html">Home</a></li>
          <li class="active"><a href="./Linked-page/Workspace.php">Workspace</a></li>
          <li><a href="../Linked-page/about.html">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="../Linked-page/logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
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
  

</body>
</html>
