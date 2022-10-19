<?php
if (count($_POST) > 0) {
    require_once 'CreateDirectory.php';
    $createDirectory = new CreateDirectory();
    $createDirectory->createDirectory();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 5</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post" action="#">
            <h1>File and Directory Assignment</h1>
            <p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</p>
            <?php
                if (isset($_POST['submit'])) {
                    $folderName = $_POST['folderName'];
                    if (file_exists($folderName)) {
                        echo "There is already a folder with that name on the server.";
                    }
                    else if (!file_exists($folderName)) {
                        $link = new CreateDirectory();
                        echo $link->getLinkToFile();
                    }
                }
            ?>
            <div class="mb-3">
                <label for="folderName" class="form-label">Folder Name</label>
                <input type="text" class="form-control" id="folderName" name="folderName" placeholder="Folder Name">
            </div>
            <div class="mb-3">
                <label for="fileContent" class="form-label">File Content</label>
                <textarea class="form-control" id="fileContent" name="fileContent" placeholder="Type the contents of your file here..." rows="6"></textarea>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>