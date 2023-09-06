<?php
 
    include('includes/connect.php');

    if (isset($_GET['editid'])) {

        $editdoc = $_GET['editid'];

        $sql = "SELECT * FROM MEDIA WHERE id = '".$editdoc."'";
        $result = mysqli_query($conn, $sql);
        $editdata= mysqli_fetch_array($result);
    }

    if (isset($_POST['submit'])) {
       
       if ($_FILES['doc'] ['name'] !="") {
            $filename = $_FILES['doc'] ['name'];
            $tempname = $_FILES['doc'] ['tmp_name'];
            move_uploaded_file($tempname, 'uploads/'.$filename);
        
       } else {
            $filename = $_POST['oldimage'];
       }

       
       $sql = "UPDATE MEDIA SET doc='" .$filename. "' where id='".$editdoc."'";
       $result = mysqli_query($conn, $sql);

       if ($result) {
            echo 'data updated';
            header('location:index.php');
       }else {
            echo 'error';
       }
    }
 
?>


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

                    <input type="hidden" name="oldimage" value="<?php echo $editdata['doc'];?>">
                    
                    <label for="email">Upload file:</label>
                    <input type="file" class="form-control" name="doc">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
