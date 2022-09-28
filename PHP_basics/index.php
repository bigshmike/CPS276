<?php 
// Variables
$hello = "Hello World!";
$name = "Michael";
$int = 15;
$float = 15.123;
$bool = true;

//heredoc
$string = <<<STR
This is a heredoc multi-line string with "quotes", the double quotes render because we are using the heredoc, where both 'single' and "double" quotes render.
STR;

$favoriteAnimal = "cat";

$string .= " You can also ";
$string .= "add to strings using the dot-equals (.=) operator.";

// Function
function myFunction() {
    $str = "this is my function";
    return $str;
}
echo "<pre>"; // gives the array a nice float-like appearance instead of one-line
$arr = [1, 2, 3, 4 ];
print_r($arr);
echo "</pre>";
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
            echo "They are not the same.";
        }
        ?>
    </p>
    <p><?php echo $string ?></p>
    <p><?php echo "My favorite animals are {$favoriteAnimal}s"; ?></p>
    <p><?php echo myFunction(); ?></p>
</body>
</html>