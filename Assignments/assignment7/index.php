<?php
$output = "";
if (count($_POST) > 0) {
    require 'classes/FileUploadProc.php';
    $uploadFile = new FileUploadProc();
    $output = $uploadFile->fileUploadProc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post" action="#" enctype="multipart/form-data">
            <h1>File Upload</h1>
            <p><a href="/~mbrown99/CPS276/Assignments/assignment7/listOfFiles.php">Show File List</a></p>
            <p>
                <?php echo $output; ?>
            </p>
            <div class="mb-3">
                <label for="fileNameField" class="form-label">File Name</label>
                <input type="text" class="form-control" id="fileNameField" name="fileNameField">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="fileUpload" name="fileUpload">
            </div>
            <input class="btn btn-primary" type="submit" name="uploadFile" value="Upload File">
    </div>
    </form>
    </div>
</body>

</html>