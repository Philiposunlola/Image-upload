<?php
 
    include('includes/connect.php');

    if(isset($_POST['submit'])) {
        $filename = $_FILES['doc'] ['name'];
        $tempname = $_FILES['doc'] ['tmp_name'];
        move_uploaded_file($tempname, 'uploads/' .$filename);

        $sql = "insert into media (doc) value ('". $filename."')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo 'data inserted';
        }else {
            echo 'error';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Image Uplaod</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container mt-3">
            <h2>All Images</h2>
           
        </div>
    </body>
</html>
