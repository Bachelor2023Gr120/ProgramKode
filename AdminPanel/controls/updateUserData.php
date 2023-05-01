<h2>Upadate User Data</h2>
<hr>
<form method="POST" class="form-row">

            <div class="form-group col-md-6" >
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Name"  
                   name="name" required>
            </div>
            
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="inputEmail4" 
                  placeholder="Email" name="email"  required>
            </div>

            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="Password" name="password" required>
                    <small id="passwordHelpInline" class="text-muted">
                         Must be 8-20 characters long.
                    </small>
            </div>

            <div class="form-group col-md-4">
                <label for="inputState">Company</label>
                <select id="inputState" class="form-control" name="company" required>
                    <?php
                        $conn = new PDO("mysql:host=localhost; dbname=usercompanydb",'root', '');
                        $stmt = $conn->query("SELECT company_id, company_name FROM company");
                        while ($row = $stmt->fetch()) {
                        echo "<option value='" . $row['company_id'] . "'>" . $row['company_name'] . "</option>";
                        }
                    ?>
                </select>
                </div>


                <div class="form-group col-md-8">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="admin">
                <label class="form-check-label" for="gridCheck">
                    Are the user Admin
                </label>
                </div>
            </div>
    
            <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
	</form>




<?php
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the user ID from the $_POST array
    $user_id = $_GET['user_id'];
  
    // get the form data from the $_POST array
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $company = $_POST['company'];
    $admin = $_POST['admin'];
    $user_id = $_POST['user_id'];
  
    // update the user record in the database
    $conn = new PDO("mysql:host=localhost; dbname=usercompanydb",'root', '');
    $stmt = $conn->prepare("UPDATE user SET name = :name, email = :email, password = :password, company_id = :company, admin = :admin WHERE user_id = :user_id");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':admin', $admin);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
  
    // close the database connection
    $conn = null;
}
?>


