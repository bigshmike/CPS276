<?php
$output = "";
if (count($_POST) > 0) {
    session_start();
    require 'classes/DateAndTime.php';
    $dateAndTime = new DateAndTime();
    $output = $dateAndTime->createNote();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<div class="container">
    <form method="post" action="#">
        <h1>Add Note</h1>
        <p><a href="/~mbrown99/CPS276/Assignments/assignment9/displayNotes.php">Show Notes</a></p>
        <p>
            <?php echo $output; ?>
        </p>
        <div class="mb-3">
            <label for="fileNameField" class="form-label">Date and Time</label>
            <input type="datetime-local" class="form-control" id="dateAndTime" name="dateAndTime">
        </div>
        <div class="mb-3">
            <textarea class="form-control" id="note" name="note" placeholder="Type the contents of your note here..." rows="10"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="Save Note">
</div>
</form>
</div>

</html>