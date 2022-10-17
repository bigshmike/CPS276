<?php
    $output = "";
    if(count($_POST) > 0) {
        require_once 'AddNames.php';
        $addName = new AddNames();
        $output = $addName->addName();
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post" action="#">
            <h1>Add Names</h1>
            <input class="btn btn-primary" type="submit" name="addName" value="Add Name">
            <input class="btn btn-primary" type="submit" name="clearNames" value="Clear Names">
            <div class="mb-3">
                <label for="nameField" class="form-label">Enter Name</label>
                <input type="text" class="form-control" id="nameField" name="nameField" placeholder="First & Last Name">
            </div>
            <label for="listOfNames">List of Names</label>
            <div class="form-floating">
                <textarea class="form-control" id="listOfNames" name="listOfNames" style="height: 500px">
                    <?php echo $output; ?>
                </textarea>
            </div>
        </form>
    </div>
</body>

</html>