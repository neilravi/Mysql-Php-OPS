<?php
$servername = "localhost";
                    $username = "site_admin";
                    $password = "site1427";
                    $dbname = "testdb";
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // use exec() because no results are returned
                        }
                    catch(PDOException $e)
                        {
                        echo "Error: " . $e->getMessage();
                        }
                    $data = $conn->query("SELECT * FROM student_info")->fetchAll();		
			
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Student List</title>
	<style type="text/css">
      .mid{text-align:center;}
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
	<div class="col-lg-5">
	<div class="row">
	<div class="col-lg-10">
	<a class="mid form-control btn-lg btn-success"href="new-registration.php">Create New Record</a>
	</div>
	</div>
	</div>
            
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">gender</th>
		      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                
                <?php
                    foreach ($data as $row) {
			echo "<tr>";		
			echo "<td> $row[stu_ID] </td>";
			echo "<td> $row[first_name] </td>";
			echo "<td> $row[last_name]</td>";
			echo "<td> $row[gender]</td>";
			echo"<td> <a href='delete-record.php?edit_record=$row[stu_ID]' class='btn btn-primary'>Edit</a>
			<a href='delete-record.php?delete_record=$row[stu_ID]' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
                </table>
            </div>
        </div> 
    </div>
 </body>
</html>              


