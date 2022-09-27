<?php
require 'deletejobs.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Delete jobs </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .container {
            min-height: 95vh;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <?php
                $sql = "SELECT jobs.j_id, jobs.position, GROUP_CONCAT(CONCAT_WS(' ', employees.firstname, employees.lastname) SEPARATOR ', ' ) AS People_group FROM jobs
    LEFT JOIN employees 
    ON jobs.j_id = employees.jobId
    GROUP BY position
	ORDER BY jobs.j_id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) { ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%">#</th>
                                <th scope="col">Position</th>
                                <th scope="col">People working</th>
                                <th scope="col" style="text-align: center;">Delete action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                            // print_r($row);
                            print('<tr>'
                                . '<td>' . $row['j_id'] . '</td>'
                                . '<td>' . $row['position'] . '</td>'
                                . '<td>' . $row['People_group'] . '</td>'
                                . '<td style="text-align: center">' . '<a href="deletejobs.php?id='  . $row['j_id'] . '"><button class="btn btn-danger" style="margin-right: 8px">DELETE</button></a>'
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
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>