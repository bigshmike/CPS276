<?php
require_once "Calculator.php";
$Calculator = new Calculator();
echo $Calculator->calc("/", 10, 0) . "<br>"; //will output Cannot divide by zero
echo $Calculator->calc("*", 10, 2) . "<br>"; //will output The product of the numbers is 20
echo $Calculator->calc("/", 10, 2) . "<br>"; //will output The division of the numbers is 5
echo $Calculator->calc("-", 10, 2) . "<br>"; //will output The difference of the numbers is 8 
echo $Calculator->calc("+", 10, 2) . "<br>"; //will output The sum of the numbers is 12
echo $Calculator->calc("*", 10) . "<br>"; //will output You must enter a string and two numbers 
echo $Calculator->calc(10); //will output You must enter a string and two numbers
?>