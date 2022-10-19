<?php

class AddNames {
    function addName() {
        $nameField = $_POST['nameField']; 
        if (isset($_POST['addName'])) {
            $nameFieldArray = explode(" ", $nameField);
            $firstName = $nameFieldArray[0];
            $lastName = $nameFieldArray[1];
            $name = "$lastName, $firstName";
            $textArea = $_POST['listOfNames'];
            $masterArrayOfNames = explode("\n", $textArea);
            array_push($masterArrayOfNames, $name);
            sort($masterArrayOfNames);
            $listOfNames = implode("\n", $masterArrayOfNames);
        }
        if (isset($_POST['clearNames'])) {
            $nameField = "";
            return $textArea = "";
        }
        return "$listOfNames";
    }
}
?>