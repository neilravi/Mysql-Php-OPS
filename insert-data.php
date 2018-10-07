<?php
//database variables

$servername = "localhost";
$username = "site_admin";
$password = "site1427";
$dbname = "testdb";

// data variables

$s_id = $_POST['s_id'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$gender = $_POST['gender'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO student_info (stu_ID, first_name, last_name, gender) 
    VALUES (:s_id, :firstname, :lastname, :gender)");
    $stmt->bindParam(':s_id', $s_id);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':gender', $gender);
	$stmt->execute();

    header("location:record-list.php");

    // use exec() because no results are returned
    
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>



