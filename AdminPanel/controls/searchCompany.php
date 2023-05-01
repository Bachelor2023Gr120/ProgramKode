<h2>Company List</h2>
<hr>                
  <form method="post" id="CompanyModify">
  <label>Search</label> <br>
  <input type="text" name="ComSearch" placeholder="Company name..">
  <input class="btn btn-primary" style="padding: 4px;" type="submit" name="ComSubmit">                  
   </form>              

<?php
 $con = new PDO("mysql:host=localhost;dbname=usercompanydb",'root', '');

if (isset($_POST["ComSubmit"])) {
    $str = $_POST["ComSearch"];

    $sth = $con->prepare("SELECT * FROM `company` WHERE `company_name` LIKE '%$str%';");

    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();

    if ($sth->rowCount() > 0) {
        echo "<table class='table'>
            <tr>
                <th>CompanyId</th>
                <th>Company Name</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>";

        while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>
                <td>{$row->company_id}</td>
                <td>{$row->company_name}</td>
                <td>{$row->website}</td>
                <td>
                    <a class='btn btn-info btn-sm' onclick=\"UpdateCompanyData($row->company_id)\"><span class='glyphicon glyphicon-pencil'></span> Modify Company</a>
                    <a class='btn btn-danger btn-sm' onclick=\"DeleteCompany($row->company_id)\"><span class='glyphicon glyphicon-trash'></span> Delete Company</a>
                </td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "<table class='table'>
            <tr>
                <th>CompanyId</th>
                <th>Company Name</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
            <tr>
                <th colspan=\"4\" style=\"text-align: center;\"><p>No results found.</p></th>
            </tr>
        </table>";
    }
}
?>
