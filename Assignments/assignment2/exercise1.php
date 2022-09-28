<?php
function orderedListIncrementer() {
    echo "<ul>";
    for ($i = 1; $i < 5; $i++) { 
        echo "<li>".$i;
        echo "<ul>";
        for ($j = 1; $j <= 5; $j++) {
            echo "<li>".$j."</li>";
        } 
        echo "</ul>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div><?php echo orderedListIncrementer(); ?></div>
</body>

</html>