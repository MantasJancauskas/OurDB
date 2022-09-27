<?php
require 'connect.php';

// print_r($_POST);
try {
    $position = $_POST['position'];    
    $sql = "INSERT INTO jobs (position) VALUES('$position')";
    if ($conn->query($sql)) {
        $_SESSION['msg'] = 'Update Successfully.';
        header("location: index.php");
        exit();
    }
} catch (EXCEPTION) {
    header("location: newjob.php");
    $_SESSION['msg'] = "Can't create same position.";

}
