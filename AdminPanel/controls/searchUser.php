<h2>User List</h2>
<hr>
  <form method="post" id="UserModify"> 
  <label>Search</label> <br>
  <input type="text" name="UserSearch" placeholder="Username..">
  <input class="btn btn-primary" style="padding: 4px;" type="submit" name="UserSubmit">                  
   </form>              

<?php
 $con = new PDO("mysql:host=localhost;dbname=usercompanydb",'root', '');

if (isset($_POST["UserSubmit"])) {
$str = $_POST["UserSearch"];

$sth = $con->prepare(" SELECT `user`.*, company.company_name
FROM `user`
INNER JOIN company ON `user`.company_id LIKE company.company_id
WHERE `user`.name LIKE '%$str%';");

$sth->setFetchMode(PDO::FETCH_OBJ);
$sth->execute();

  if ($sth->rowCount() > 0) {
    echo "<table class='table'>
     <tr>
         <th>UserId</th>
        <th>Name</th>
        <th>Email</th>
        <th>Company</th>
         <th>Actions</th>
          </tr>";

       while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
         echo "<tr>
            <td>{$row->user_id}</td>
             <td>{$row->name}</td>
              <td>{$row->email}</td>
              <td>{$row->company_name}</td>
                  <td>
              <a class='btn btn-info btn-sm'onclick=\"UpdateUserData($row->user_id)\"><span class='glyphicon glyphicon-pencil'></span> Modify</a>
              <a class='btn btn-danger btn-sm' onclick=\"DeleteUser($row->user_id)\"><span class='glyphicon glyphicon-trash'></span> Delete</a>
                 </td>
                 </tr>";
                 }

                  echo "</table>";
   } else {
    echo "<table class='table'>
    <tr>
        <th>UserId</th>
       <th>Name</th>
       <th>Email</th>
       <th>Company</th>
        <th>Actions</th>
         </tr>";
       echo "
       <th colspan=\"5\" style=\"  text-align: center;\"><p>No results found.</p></th>";



           }
             }
?>