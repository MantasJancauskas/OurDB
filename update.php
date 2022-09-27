<?php
require 'connect.php';

try {
$id = $_GET['id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$jobId = $_POST['jobId'];

$sql = "UPDATE employees SET firstname = '$firstname', lastname = '$lastname', email = '$email', jobId = '$jobId'  WHERE id = $id";
if ($conn->query($sql)) {
    $_SESSION['msg'] = 'Update Successfully.';
    header("location: index.php");
}
} catch(EXCEPTION) {
    header("location: edit.php");
    $_SESSION['msg'] = 'Select a job name.';
}