<?php
require 'connect.php';

print_r($_POST);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$jobId = $_POST['jobId'];

    $sql = "INSERT INTO Employees (firstname, lastname, email, jobId) VALUES('$firstname', '$lastname', '$email', '$jobId')";
    if ( $conn->query($sql) ) {
        session_start();
        $_SESSION['msg'] = 'Update Successfully.';

    header("location: index.php");
    
}
?>