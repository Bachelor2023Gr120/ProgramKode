<?php include("../questions/check_session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Options</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
        <li class="active"><a href="../Linked-page/options.php">Options</a></li>
        <li><a href="./Linked-page/about.html">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../Linked-page/logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="options">
    <h1> If you want to take the test:</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint adipisci repudiandae consequuntur vel accusantium reprehenderit nihil delectus aliquid vero, assumenda nesciunt explicabo autem, doloremque eius aliquam. Sit a libero repellat?</p>
    <button onclick="location.href='../questions/question-list.php'">Take the test</button>
    <br><br>
    <h1> If you want to display your results:</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint adipisci repudiandae consequuntur vel accusantium reprehenderit nihil delectus aliquid vero, assumenda nesciunt explicabo autem, doloremque eius aliquam. Sit a libero repellat?</p>
    <button onclick="location.href='../Results/display-result.php'">Display Result</button>
    <br><br>
    <h1> If you want to compaer to test results:</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint adipisci repudiandae consequuntur vel accusantium reprehenderit nihil delectus aliquid vero, assumenda nesciunt explicabo autem, doloremque eius aliquam. Sit a libero repellat?</p>
    <button onclick="location.href='../Results/comparResult.php'">Compar Results</button>

</div>
    
</body>
</html>