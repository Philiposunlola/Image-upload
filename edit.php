<?php
include('includes/connect.php');

if (isset($_GET['editid'])) {
    $editdoc = $_GET['editid'];
    $sql = "SELECT * FROM MEDIA WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $editdoc);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $editdata = mysqli_fetch_array($result);
}

if (isset($_POST['submit'])) {
    if ($_FILES['doc']['name'] !== "") {
        $filename = $_FILES['doc']['name'];
        $tempname = $_FILES['doc']['tmp_name'];
        $filetype = $_FILES['doc']['type'];
        $filesize = $_FILES['doc']['size'];
        
        // Perform file type and size validation here (e.g., using JavaScript)
        
        $uploadDir = 'uploads/';
        $targetFile = $uploadDir . basename($filename);
        
        if (move_uploaded_file($tempname, $targetFile)) {
            // Update the database with the new filename
            $sql = "UPDATE MEDIA SET doc = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $filename, $editdoc);
            
            if (mysqli_stmt_execute($stmt)) {
                echo 'Data updated';
                header('location: index.php');
            } else {
                echo 'Error updating data';
            }
        } else {
            echo 'Error uploading file';
        }
    } else {
        $filename = $_POST['oldimage'];
        // Update the database with the old filename (no file change)
        $sql = "UPDATE MEDIA SET doc = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $filename, $editdoc);
        
        if (mysqli_stmt_execute($stmt)) {
            echo 'Data updated';
            header('location: index.php');
        } else {
            echo 'Error updating data';
        }
    }
}
?>
<!-- HTML Form Here -->



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Image Upload</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container mt-3">
            <h2>Edit Image Uplaod</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="file">Old image:</label>
                    <img src="uploads/<?php echo $editdata['doc'];?>" style = "height: 100px";>

                    <input type="" name="oldimage" value="<?php echo $editdata['doc'];?>">
                    
                    <label for="email">Upload file:</label>
                    <input type="file" class="form-control" name="doc">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
