<?php
require 'connect.php';

if (isset($_GET['id']) and $_GET['id']) {
    $sql = 'DELETE FROM jobs WHERE j_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $res = $stmt->execute();

    $stmt->close();
    mysqli_close($conn);

    header("Location: show.php");
    die();
}
