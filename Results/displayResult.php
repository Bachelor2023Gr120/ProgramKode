<?php include("../Authentication/check_session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Display</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

    <script src="displayResult.js"></script>
    <link rel="stylesheet" href="displayResultStyle.css">

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
              <li class="active"><a href="../Pages/Workspace.php">Workspace</a></li>
              <li><a href="../Pages/about.html">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="../Authentication/logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
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



   <div class="main-content">
          <h1 id="Results"></h1>
          <p id="chart-description"></p>
            <div>
                <div id="show-instructions" >
                <h4 id="show-instructions-txt" style="display: none;">Learn how to use this webpage effectively with our instructions.</h4>
                <button id="show-instructions-btn" style="display: none;">Instructions</button>
                </div>
                
                    <div id="instruction-box" style="display: none;">
                      <button id="close-instructions-btn">X</button>
                      <div id="instruction-text"></div>
                    </div>
            </div>

            <div class="charts">
           
                <canvas class="bar-chart" id="chart" width="940" height="620" style="display: block; height: 660px; width: 420px;"></canvas>
                <canvas class="donut-chart" id="donut-chart" width="940" height="620" style="display: block; height: 660px; width: 420px;"></canvas>
                
            </div>

            <div class="answers">
                  <div id="questions"></div>
                  <div id="userAnswers"></div>
            </div>

            <div class="compare-button">
                <p id="Compare"></p>
            </div>
      </div>
  
</body>
</html>