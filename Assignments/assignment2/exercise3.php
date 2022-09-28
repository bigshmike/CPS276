<?php
function createTable() {
    $tableBorder = 1;
    $numOfRows = 15;
    $numOfColumns = 5;
    echo "<table border=$tableBorder>";
    for($i = 1; $i <= $numOfRows; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $numOfColumns; $j++) {
            echo "<td> Row " . $i . " Column " . $j . "</td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3</title>
</head>
<body>
    <div><?php createTable(); ?></div>
</body>
</html>