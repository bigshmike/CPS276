<?php 
// Variables
$hello = "Hello World!";
$name = "Michael";
$int = 15;
$float = 15.123;
$bool = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics</title>
</head>
<body>
    <p><?php echo $hello; ?></p>
    <p><?php echo $name; ?></p>
    <p><?php echo $int; ?></p>
    <p><?php echo $float; ?></p>
    <p><?php echo $bool; ?></p>
    <p><?php 
        if($int == $float) {
            echo "They are the same";
        }
        else {
            echo "They are not the same";
        }
        ?>
    </p>
</body>
</html>