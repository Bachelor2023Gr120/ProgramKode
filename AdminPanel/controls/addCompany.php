
<form method="POST" class="form-row" action="./controls/addCompany.php">
<h2>Add Company</h2>
<hr>

            <div class="form-group col-md-6" >
                <label for="name">Company Name</label>
                <input type="text" class="form-control" placeholder="NTNU"  name="company_name" required>
            </div>
            
            <div class="form-group col-md-6">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="inputWebsite4" placeholder="example.com" name="website" required>
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
    $company_name = $_POST['company_name'];
    $website = $_POST['website'];

    // connect to the database
    $conn = new PDO("mysql:host=192.168.1.25; dbname=usercompanydb",'root', 'passord');

    // prepare the query with placeholders
    $stmt = $conn->prepare("INSERT INTO company (company_name, website) VALUES (:company_name, :website)");

    // bind the values to the placeholders
    $stmt->bindParam(':company_name', $company_name);
    $stmt->bindParam(':website', $website);

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








