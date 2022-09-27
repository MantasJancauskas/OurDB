<?php
require 'connect.php';

// print_r($_POST);
try {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $jobId = $_POST['jobId'];



    $sql = "INSERT INTO Employees (firstname, lastname, email, jobId) VALUES('$firstname', '$lastname', '$email', '$jobId')";
    if ($conn->query($sql)) {

        $_SESSION['msg'] = 'Update Successfully.';
        header("location: index.php");
        exit();
    }
} catch (Exception $e) {
    header("location: insert.php");
    $_SESSION['msg'] = 'Failed inserting a new employee, please use a unique email and apply a position.';
}
