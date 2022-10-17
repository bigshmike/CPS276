<?php

class AddNames {
    function addName() {
        $nameField = $_POST['nameField'];
        $listOfNames = "";
        if (isset($_POST['addName'])) {
            $arr = explode(" ", $nameField);
            array_push($arr);
            sort($arr);
            $str = implode(", ", $arr);
            $listOfNames .= $str;
        }
        if (isset($_POST['clearNames'])) {
            $nameField = "";
            $listOfNames = "";
            return $str = "";
        }
        return "$listOfNames\n";
    }
}
?>