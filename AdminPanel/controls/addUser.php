<h2>Add User</h2>
<hr>
<form method="POST" class="form-row" action="./controls/addUser.php">

            <div class="form-group col-md-6" >
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Name"  name="name" required>
            </div>
            
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
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
                <select id="inputState" class="form-control" name="company_id" required>
                    <?php
                        $conn = new PDO("mysql:host=192.168.1.25; dbname=usercompanydb",'root', 'passord');
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $company_id= $_POST['company_id'];
    //$company_id_val = ($company_id == 'NTNU') ? 1002 : 1001;
    $admin = isset($_POST['admin']) ? 1 : 0;


    $conn = new PDO("mysql:host=192.168.1.25; dbname='usercompanydb'",'root', 'passord');

    // prepare the query with placeholders
    $stmt = $conn->prepare("INSERT INTO `user` ( `name`, `email`, `password`, `company_id`, `admin`) 
                                    VALUES ( :name, :email, :password, :company_id, :admin)");

    // bind the values to the placeholders
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':company_id', $company_id);
    //$stmt->bindParam(':company_id', $company_id_val);
    $stmt->bindParam(':admin', $admin);

    // execute the query
    if ($stmt->execute()) {
        header("Location: ../adminPanel.php");
    } else {
        echo "<script>if(confirm('Error adding company.'))
           {document.location.href=' ../adminPanel.php'};</script>";
    }

    // close the database connection
    $conn = null;
}
?>


