<?php
include 'connect.php';

print_r($_POST);

$id = $_GET['id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$jobId = $_POST['jobId'];

    $sql = "UPDATE Employees SET firstname = '$firstname', lastname = '$lastname', email = '$email', jobId = '$jobId'  WHERE id = $id";
    if ( $conn->query($sql) ) {
        session_start();
        $_SESSION['msg'] = 'Update Successfully.';

    header("location: index.php");
    
}
?>