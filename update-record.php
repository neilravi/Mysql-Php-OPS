<?php
$servername = "localhost";
$username = "site_admin";
$password = "site1427";
$dbname = "testdb";
$record=$_GET['edit_record'];

$s_id = $_POST['s_id'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$gender = $_POST['gender'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE student_info SET stu_ID=$s_id, first_name=$firstname, last_name=$lastname, gender=$gender WHERE id=$record";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() ." records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
?>

