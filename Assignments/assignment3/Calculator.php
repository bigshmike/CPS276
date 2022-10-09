<?php 
class Calculator {
    private $_numb1 = 0;
    private $_numb2 = 0;
    private $_result = "";
    private $_operator = "";

    function calc($_operator = null, $_numb1 = null, $_numb2 = null) {
        if($_numb2 === 0) {
            return "You cannot divide by 0";
        }
        else if($_operator == null || $_numb1 == null || $_numb2 == null) {
            return "You must enter a string and two numbers";
        }
        switch($_operator) {
            case "+": 
                $_result = "The sum of these two numbers is ";
                $_result .= $_numb1 + $_numb2;
                break;
            case "-":
                $_result = "The difference between these two numbers is ";
                $_result .= $_numb1 - $_numb2;
                break;
            case "*":
                $_result = "The product of these two numbers is ";
                $_result .= $_numb1 * $_numb2;
                break;
            case "/":
                $_result = "The quotient of these two numbers is ";
                $_result .= $_numb1 / $_numb2;
                break;
            default:
                $_result = "Invalid or missing string operator/integer";
                break;
        }
        echo $_result;    
    }  
}
?>