<?php
require_once "Calculator.php";
$Calculator = new Calculator();
echo $Calculator->calc("/", 10, 0) . "<br>"; 
echo $Calculator->calc("*", 10, 2) . "<br>"; 
echo $Calculator->calc("/", 10, 2) . "<br>"; 
echo $Calculator->calc("-", 10, 2) . "<br>"; 
echo $Calculator->calc("+", 10, 2) . "<br>"; 
echo $Calculator->calc("*", 10) . "<br>"; 
echo $Calculator->calc(10); 
?>