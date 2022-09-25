<?php
include 'connect.php';

print_r($_POST);

$position = $_POST['position'];

    $sql = "INSERT INTO jobs (position) VALUES('$position')";
    if ( $conn->query($sql) ) {
        session_start();
        $_SESSION['msg'] = 'Update Successfully.';

    header("location: index.php");
    
}
?>