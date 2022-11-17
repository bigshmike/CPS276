<?php
$output = "";
if (count($_POST) > 0) {
    require 'classes/DateAndTime.php';
    $listNotes = new DateAndTime();
    $output = $listNotes->getNotes();
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

<body>
    <div class="container">
        <form method="post" action="#">
            <h1>Display Notes</h1>
            <p><a href="/~mbrown99/CPS276/Assignments/assignment9/index.php">Add Note</a></p>
            <div class="mb-3">
                <label for="begDate" class="form-label">Beginning Date</label>
                <input type="date" class="form-control" id="begDate" name="begDate">
                <label for="endDate" class="form-label">Ending Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate">
            </div>
            <div class="mb-3">
                <?php echo $output; ?>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Get Notes">
    </div>
    </form>
    </div>
</body>

</html>