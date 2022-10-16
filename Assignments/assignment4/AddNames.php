<?php

class AddNames {
    function addName() {
        $output = <<<HTML
                {$_POST['namefield']}
            HTML;
        //$arr = explode(",", $output, 1);
        //$str = implode($arr);
            return $output;
    }
}