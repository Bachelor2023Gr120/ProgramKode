<?php include("../questions/check_session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Display</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="display-result.js"></script>
    <link rel="stylesheet" href="style.css">

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
              <li class="active"><a href="../Linked-page/Workspace.php">Workspace</a></li>
              <li><a href="../Linked-page/about.html">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="../Linked-page/logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
            </ul>
          </div>
        </div>
    </nav>


<div class="file-Upload" id="file-reader">
    <h1>Display your results</h1> <br>
    <p>
        Visualize your results with ease using our chart feature, 
        allowing you to quickly identify areas that require improvement to 
        reach compliance
    </p> <br><br>
    <label for="file">Upload File:</label>
    <input type="file" id="file" name="file">
    <button type="button" onclick="checkFile()">Submit</button>
</div>
   
     <h1 id="Results"></h1>
     <p id="chart-description"></p>
<div class="display">
    <canvas class="bar-chart" id="chart"></canvas>
    <canvas class="donut-chart" id="donut-chart"></canvas>
</div>

<div class="compare-button">
    <p id="Compare"></p>
</div>

  
</body>
</html>