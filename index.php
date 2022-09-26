<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>People manager</title>
    <style>
        .container {
            min-height: 95vh;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container p-4">
        <?php

        $sql = 'SELECT id, firstname, lastname, email, jobId, j.position FROM employees
            LEFT JOIN jobs AS j ON j.j_id = jobId';
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) { ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Email</th>
                        <th scope="col">Position</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    print('<tr>'
                        . '<td>' . $row['id'] . '</td>'
                        . '<td>' . $row['firstname'] . '</td>'
                        . '<td>' . $row['lastname'] . '</td>'
                        . '<td>' . $row['email'] . '</td>'
                        . '<td>' . $row['position'] . '</td>'
                        . '<td>' . '<a href="?action=delete&id='  . $row['id'] . '"><button class="btn btn-danger" style="margin-right: 8px">DELETE</button></a>' .
                        '<a href="edit.php?id='  . $row['id'] . '"><button class="btn btn-warning">EDIT</button></a>'
                        . '</td>'
                        . '</tr>');
                }
            } else {
                echo '0 results';
            }
            mysqli_close($conn); ?>
                </tbody>
            </table>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>