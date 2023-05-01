<?php include("../Authentication/check_session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Workspace</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"  type="image/x-icon" href="../images/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="./workspaceStyle.css">
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
      </div>
    </div>
  </nav>
  <div class="description-text">
      <h1>WorkSpace</h1>
      <p>It's here where everything happens. The workspace page is designed to be intuitive and easy to use. <br>
      You'll find a wide range of jobs presented on beautifully designed cards. Each card is accompanied by a detailed description, <br>
       making it easy to choose the appropriate tool for your needs. To meet your needs, our models are accurately engineered and customized.
      </p>
  </div>


  <div class="page-container">
     <div class="grid-containers">

         <div class="containers">
           <div class="card-body">
             <h2 class="card-title">Questionnaire</h2>
             <p class="card-text"> This questionnaire is based on <b>Annex A</b> of the <b>ISO27001</b> standard and consists of 
                <b>14</b> categories of security controls, each with several control measures presented in the 
                form of questions.
                The questionnaire includes a total of  <b>114</b> questions, and we kindly request that you respond 
                to each question with one of the available answers. It is essential to answer 
                every question, and leaving any question unanswered is not permitted.
                Once the questionnaire is completed, a  <b>JSON</b> file will be downloaded. The downloaded file 
                can be utilized in subsequent steps of the model.
              </p>
              <button class="btn btn-primary"  onclick="location.href='../questions/questionList.php'">Start Questionnaire</button>
            </div>
         </div>

         <div class="containers">
           <div class="card-body">
             <h2 class="card-title">Display your questionnaire result</h2>
             <p class="card-text"> This tool helps organizations assess their compliance level with the <b>ISO27001</b> standard. 
            To get started, simply take our questionnaire, which is presented above. Once completed, 
            you can upload the <b>JSON</b> file and view the results displayed in easy-to-understand graphs. 
            These graphs will provide you with a clear understanding of your organization's compliance 
            level with <b>ISO27001</b>, allowing you to take the necessary steps to improve your organization's
            security posture.
              </p>
              <button class="btn btn-primary"  onclick="location.href='../Results/displayResult.php'">Display</button>
           </div>
     </div>

     <div class="containers" onclick="location.href='../Results/compareResult.php'">
           <div class="card-body">
             <h2 class="card-title">Compare your questionnaire results</h2>
             <p class="card-text">   The comparison tool allows you to easily compare the results of your current and previous 
            questionnaires in an interactive graph. By analyzing the data side by side, you can quickly 
            identify areas of improvement and see the progress you've made over time.
              </p>
              <button class="btn btn-primary"  onclick="location.href='../Results/compareResult.php'">Compare</button>
           </div>
     </div>
         
         <div class="containers" onclick="location.href='../legal/legal.php'">
           <div class="card-body">
             <h2 class="card-title">Legal regulations</h2>
             <p class="card-text"> Questionaire based on what information security laws a organization is required to follow.
              </p>
              <button class="btn btn-primary"  onclick="location.href='../legal/legal.php'">Start Questionaire Legal regulations</button>
           </div>
     </div>


     <div class="containers" onclick="location.href='../legal/legalShowResults.php'">
           <div class="card-body">
             <h2 class="card-title">Display results for legal Questionaire</h2>
             <p class="card-text">This shows how you did in both  in both bar chart as well as in a doughnut chart
              </p>
              <button class="btn btn-primary" onclick="location.href='../legal/legalShowResults.php'">Show Results Legal regulations</button>
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