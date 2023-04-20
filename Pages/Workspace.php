<?php include("../Authentication/check_session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Options</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
      <a class="navbar-brand" href="../Index.html">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../Index.html">Home</a></li>
        <li class="active"><a href="../Pages/options.php">Workspace</a></li>
        <li><a href="../Pages/about.html">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../Authentication/logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="options">
    <h1> Questionnaire</h1>
    <p>
      This questionnaire is based on <b>Annex A</b> of the <b>ISO27001</b> standard and consists of 
      <b>14</b> categories of security controls, each with several control measures presented in the 
      form of questions.
      The questionnaire includes a total of  <b>114</b> questions, and we kindly request that you respond 
      to each question with one of the available answers. It is essential to answer 
      every question, and leaving any question unanswered is not permitted.
      Once the questionnaire is completed, a  <b>JSON</b> file will be downloaded. The downloaded file 
      can be utilized in subsequent steps of the model.
    </p>
    <button onclick="location.href='../questions/questionList.php'">Start Questionnaire</button>
    <br><br>
    <h1>Display Result</h1>
    <p>
      This tool helps organizations assess their compliance level with the <b>ISO27001</b> standard. 
      To get started, simply take our questionnaire, which is presented above. Once completed, 
      you can upload the <b>JSON</b> file and view the results displayed in easy-to-understand graphs. 
      These graphs will provide you with a clear understanding of your organization's compliance 
      level with <b>ISO27001</b>, allowing you to take the necessary steps to improve your organization's
       security posture.
    </p>
    <button onclick="location.href='../Results/displayResult.php'">Display Result</button>
    <br><br>
    <h1>Compare Results</h1>
    <p>
      The comparison tool allows you to easily compare the results of your current and previous 
      questionnaires in an interactive graph. By analyzing the data side by side, you can quickly 
      identify areas of improvement and see the progress you've made over time.
    </p>
    <button onclick="location.href='../Results/compareResult.php'">Compare Results</button>

</div>
    
</body>
</html>