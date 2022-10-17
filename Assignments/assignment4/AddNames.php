<?php

class AddNames {
    function addName() {
        $nameField = $_POST['nameField'];
        if (isset($_POST['addName'])) {
            $listOfNames = array();
            $capturedName = explode(" ", $nameField);
            array_push($listOfNames, $capturedName);
            sort($listOfNames);
            $outputOfNames = implode(", ", $listOfNames);
        }
        if (isset($_POST['clearNames'])) {
            $nameField = "";
            $listOfNames = "";
            return $outputOfNames = "";
        }
        return "$outputOfNames\n";
    }
}
?>