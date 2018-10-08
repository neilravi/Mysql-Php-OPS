<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "site_admin";
$password = "site_admin";
$dbname = "testdb";
$record=$_GET['edit_record'];



try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }
$data = $conn->query("SELECT * FROM student_info where stu_ID='$record'")->fetchAll();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Registration</title>
    <style type="text/css">
      .mid{text-align:center;}
    </style>
  </head>
<body>
<h1 class="mid">New Registraion form</h1>
<div class="container">
  <div class="row">
    <div class="col-lg-10">

<form method="post" action="insert-data.php">
  First name:<br>
  <input class="form-control" type="text" name="fname" value="<?php $data[first_name]?>"><br>
  Last name:<br>
  <input class="form-control" type="text" name="lname" value="<? $data[last_name]?>"><br>
  Gender:
  <select class="form-control" name="gender">
    <option value="male">male</option>
    <option value="female">female</option>
  </select><br>
  <input class="form-control btn btn-success" type="submit" name="s1" value="submit">
</form>
</div>
</div>
</div>
</body>
</html>
