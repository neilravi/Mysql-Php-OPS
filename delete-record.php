<?php
$servername = "localhost";
$username = "site_admin";
$password = "site_admin";
$dbname = "testdb";
$delete=$_GET['delete_record'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM student_info WHERE stu_ID=$delete";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
<a href="record-list.php">Go To Record Page</a>
