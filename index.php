<?php
    
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
            <h2>Image Uplaod</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="file">upload file:</label>
                    <input type="file" class="form-control" name="doc">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
