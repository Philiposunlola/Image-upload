<?php
 
    include('includes/connect.php');

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Images</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container mt-3">
            <h2>All Images</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    $sql = "SELECT * FROM media";
                    $result = mysqli_query($conn, $sql);

                    while($data=mysqli_fetch_array($result))

                ?>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                    </tr>
                </tbody>
            </table>  
        </div>
    </body>
</html>
