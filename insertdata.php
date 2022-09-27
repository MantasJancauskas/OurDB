<?php
require 'connect.php';

print_r($_POST);
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
} catch (EXCEPTION) {
    header("location: insert.php");
    $_SESSION['msg'] = 'Create new worker failed, please use unique email.';
}
